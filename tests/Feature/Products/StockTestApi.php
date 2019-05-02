<?php

namespace Tests\Feature\Products;

use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class StockTestApi extends TestCase
{

    public function testIndex()
    {
        //$response = $this->get('/');

        $response = $this->json('GET', '/api/products/stock');

        $response->assertStatus($response->getStatusCode());
        $response->assertJson([
            'status' => 'success',
            'message' => 'Successfully Data Fetch',
        ]);

        $response->assertJsonStructure([
            'status',
            'message',
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'price'
                ]
            ]
            // error if server not match any attributes
        ]);

        //$result = json_decode($response->getContent());
        //Log::info( $result->data[0]->price );
        //$this->assertEquals(200 , 23);

        //$this->assertNull($response->getContent());
        $this->assertNotEmpty($response->getContent());
    }
}
