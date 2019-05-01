<?php

namespace Tests\Feature;

use App\Http\Models\Stock;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


use Faker\Generator as Faker;

class StockTest extends TestCase
{


    public function testCreateRecord()
    {
        //case 1
       /* $factory = factory('App\User')->create([
            'name' => 'test',
            'email' => 'test@laravel.com',
            'password' => Hash::make('1'),
        ]);

        //case 2
        $factory = factory('App\Http\Models\Stock')->create([
            'name' => 'mango',
            'price' => 300,
        ]);*/

        $stock = Stock::create([
            'name' => 'mango',
            'price' => 200,
        ]);


        $this->assertEquals('mango', $stock->name);
        $this->assertEquals(200, $stock->price);
    }



    public function testExample()
    {
        $stock = new Stock([
            'name' => 'Tesla',
            'price' => 300,
        ]);

        $this->assertEquals('Tesla', $stock->name);
        $this->assertEquals(300, $stock->price);
    }


    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
}
