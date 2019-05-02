<?php

namespace Tests\Feature\Products;

use App\Http\Models\Products\Stock;
use Illuminate\Http\Response;
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

    public function testCreate()
    {
        $response = $this->json('GET', '/api/products/stock/create');
        $response->assertStatus($response->getStatusCode());

        $response->assertJson([
            'status' => 'success',
            'message' => 'Successfully Created',
        ]);

        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());

    }

    public function testStore()
    {


        $data = [
            'name' => 'Korim',
            'price' => 200
        ];
        $stock = factory(Stock::class)->create();
        $response = $this->actingAs($stock, 'api')->json('POST', '/api/products/stock/store', $data);


        /* $response = $this->json('POST', '/api/products/stock/store', [
             'name' => 'Korim',
             'price' => 200,
         ]);

         $response->assertStatus($response->getStatusCode());*/


        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());

    }
}
