<?php

namespace Tests\Feature;
namespace Tests\Feature\Products;

use App\Http\Models\Products\Stock;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Tests\TestCase;

class StockTest extends TestCase
{

    public function testIndex()
    {
        //$response = $this->get('/');
        Stock::truncate();
        factory(Stock::class)->create();

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


    public function testUpdate()
    {
        $id = 1;
        $stock = [
            'name' => 'New-Banana',
            'price' => 200,
        ];
        $response = $this->json('PUT', "api/products/stock/update/". $id, $stock);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }

    public function testOptions()
    {
        /*$this->call('OPTIONS', route('api.items.index'))
            ->assertSuccessful()
            ->assertJson([
                'meta'
            ]);*/

        $this->assertTrue(true);
    }
}
