<?php

namespace Tests\Feature;


use App\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class UserTest extends TestCase
{


    public function testBasicTest()
    {

        //User::truncate();

        // fake user inserted when test run
        //$factory = factory(User::class)->create();

        // pre-define & modified attributes store using factory
        /*$factory = factory('App\User')->create([
            'name' => 'test',
            'password' => Hash::make('1'),
        ]);*/

        $this->assertTrue(true);
    }
}
