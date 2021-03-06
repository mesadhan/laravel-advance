# What I Learned

- Learn How accutally test driven development work.
- Imporve Confident with TDD Culture.
- Learn how Karma, Protractor and Jesmine Work in Angular.
- Learn how third-party library and dependency work in Laravel.
- Learn Basic, Auth, Caching, PHPUnit, HTTP TEST, ORM, Controller, Model, Route, Mocking, Reflection etc
- Learn Reactive Programming.
- Learn Mocking concept.

# PhpStorm Test Environment Setup

- [X] Setting -> Search `Test Frameworks`
- [X] PHP -> CLI Interpreter, `Add New Using Plus +` with set php path `C:\xampp\php\php.exe` 
- [X] Test Frameworks ->
    
        - Use Composer autoloader:- absolute_path\laravel-advance\vendor\autoload.php
        - Default configuration file:- absolute_path/laravel-advance/phpunit.xml
        
- [X] Select `phpunit.xml` and `pop-up options menu` and `run phpunit.xml`



# Create Local Database and connect it to PhpStorm

- create a normal text file with extension `.sqlite` like `database/database.sqlite`
- then, connect it to select `Add New or Plus Sign` then choose `Data source from path` in PhpStorm Database Section through `database.sqlite` absolute path.



# Create Controller, Model, Schema and Factory

> create controller, model, schema and factory base on need

    php artisan make:model Http/Models/Products -a
    php artisan make:model Http/Models/Products -cmf
    php artisan make:model Http/Models/Products -m
    php artisan make:model Stock -m
    php artisan make:controller ProductController --api
    php artisan make:migration create_users_table


> Make migration on default or all sub-folders 

    php artisan migrate
    php artisan migrate:rollback
    php artisan migrate --path=/database/migrations/*
    php artisan migrate:refresh --path=/database/migrations/*
    php artisan migrate:rollback --path=/database/migrations/*


> Make migration on default or specific sub-folder 

    php artisan migrate
    php artisan migrate:rollback
    php artisan migrate --path=/database/migrations/products
    php artisan migrate:refresh --path=/database/migrations/products
    php artisan migrate:rollback --path=/database/migrations/products



> Make Test and Factory for test

    php artisan make:test StockTest
    php artisan make:test PersonTest --unit
    php artisan make:factory PersonFactory


> User DB Seed with mock data, seeder file must create using command

    php artisan make:seeder products/StockTableSeeder
    php artisan db:seed



## RUN phpunit Test using command lines
    
    $ vendor\bin\phpunit
    $ vendor\bin\phpunit --configuration phpunit.xml
    $ vendor\bin\phpunit --filter testBasicTest ./tests/Unit/ExampleTest
    $ vendor\bin\phpunit --filter ExampleTest



# Learn Laravel Reflection API



```php

class StockController extends Controller
{

    public function reflectionTest() {
    
        $reflectionClass = new ReflectionClass('App\Http\Controllers\Products\StockController');        // Pass NameSpace
        $function = $reflectionClass->getMethods();
        $function = $reflectionClass->getName();
        $function = $reflectionClass->getShortName();
        $function = $reflectionClass->getProperties();
        $function = $reflectionClass->getNamespaceName();
        $function = $reflectionClass->getTraitNames();
        
        
        $methodName = 'testMethod';
        $value = $this->$methodName();      // call dynamiclly testMethod() function
        return $value;
    }
    
    public function testMethod(){
        return 'Hello! From Test Method';
    }
}
```


# References:

https://laravel.com/docs/5.8/migrations
https://laravel.com/docs/5.8/testing
https://laravel.com/docs/5.8/responses

https://www.youtube.com/watch?v=EPL9sM3nH6w


<a href="{{ route('actBook', $room->id, serialize($array)) }}" class="btn btn-default">About</a>

