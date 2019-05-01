<?php

namespace Tests\Feature;

use App\Http\Models\Stock;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockTest extends TestCase
{

    public function testExample()
    {
        $stock = new Stock([
            'name'=>'Tesla',
            'price'=> 300,
        ]);

        $this->assertEquals('Tesla', $stock->name);
        $this->assertEquals(300, $stock->price);
    }


    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
}
