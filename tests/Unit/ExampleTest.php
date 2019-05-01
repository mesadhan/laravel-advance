<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    // to use memory database when run test, jus uncomment `phpunit.xml` configuration
    use DatabaseMigrations;


    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
}
