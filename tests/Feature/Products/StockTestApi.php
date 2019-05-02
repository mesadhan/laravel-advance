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

        //$result = $response->getContent();
        //Log::info( json_decode($result)->data[0]->price );
        //$this->assertEquals(200 , 23);

        $this->assertNotNull($response->getContent());
        $this->assertNotEmpty($response->getContent());
    }
}
