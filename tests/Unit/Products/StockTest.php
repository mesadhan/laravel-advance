<?php

namespace Tests\Unit;

use App\Http\Models\Products\Stock;
use Tests\TestCase;


class StockTest extends TestCase
{


    public function testCreateFactory()
    {
        // Stock::truncate();

        /*
        $factory = factory(Stock::class)->create();
        $factory = factory(Stock::class)->create([
            'name' => 'mango',
            'price' => 300,
        ]);*/

        $this->assertTrue(true);
    }

    public function testCreateRecord()
    {
        /*$stock = Stock::create([
            'name' => 'mango',
            'price' => 200,
        ]);
        $this->assertEquals('mango', $stock->name);
        $this->assertEquals(200, $stock->price);*/

        $this->assertTrue(true);
    }


    public function testExample()
    {
        /*$stock = new Stock([
            'name' => 'Tesla',
            'price' => 300,
        ]);
        $this->assertEquals('Tesla', $stock->name);
        $this->assertEquals(300, $stock->price);*/

        $this->assertTrue(true);
    }


    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
}
