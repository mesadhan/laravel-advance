<?php

namespace Tests\Feature;

use App\Http\Models\Stock;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class UserTest extends TestCase
{


    public function testBasicTest()
    {
        User::truncate();
        $factory = factory(User::class)->create();
        $factory = factory('App\User')->create([
            'name' => 'test',
            'password' => Hash::make('1'),
        ]);
        $this->assertTrue(true);
    }
}
