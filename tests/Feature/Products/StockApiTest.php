<?php

namespace Tests\Feature\Products;

use App\Http\Models\Products\Stock;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Tests\TestCase;

class StockApiTest extends TestCase
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
        Stock::truncate();
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
        $stock = [
            'name' => 'Sadhan From - testStore',
            'price' => 200,
        ];

        $response = $this->json('POST', 'api/products/stock', $stock);
        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
    }

    public function testShow()
    {
        $stock = [
            'price' => 200,
        ];
        $response = $this->json('GET', 'api/products/stock', $stock);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }


    public function testEdit()
    {
        $stock = [
            'id' => 1,
            'name' => 'New-Banana',
            'price' => 200,
        ];
        $response = $this->json('GET', "api/products/stock/1/edit", $stock);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }
}
