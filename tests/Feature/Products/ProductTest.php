<?php

namespace Tests\Feature;

use App\Http\Models\Products\Category;
use App\Http\Models\Products\Product;
use App\User;
use Faker\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProductTest extends TestCase
{

    public function testIndex()
    {
        Product::truncate();
        factory(Product::class)->create();

        $response = $this->json('GET', '/api/products/product');
        $response->assertJson([
            'status' => 'success',
            'message' => 'Successfully Data Fetch',
        ]);
        $response->assertStatus($response->getStatusCode());
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }

    public function testStore()
    {
        $faker = Factory::create();
        $imagePath = public_path(Config::get('assets.images'));
        $image_name = $faker->image($imagePath, 200, 200, false);

        $product = [
            'name' => $faker->name,
            'title' => $faker->sentence,
            'price' => $faker->numberBetween(200, 1000),
            'photo' => $image_name,
            'category_id' =>  factory(Category::class)->create()->id,
            'description' => $faker->text(),
            'status' => $faker->numberBetween(1, 3),
        ];

        $response = $this->json('POST', 'api/products/product', $product);
        $response->assertJson([
            'status' => 'success'
        ]);
        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
    }

    public function testShow()
    {
        $productId = 1;
        $response = $this->json('GET', 'api/products/product/'. $productId);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }

    public function testUpdate()
    {
        $faker = Factory::create();
        $imagePath = public_path(Config::get('assets.images'));
        $image_name = $faker->image($imagePath, 200, 200, false);

        $product = [
            'name' => $faker->name,
            'title' => $faker->sentence,
            'price' => $faker->numberBetween(200, 1000),
            'photo' => $image_name,
            'category_id' =>  factory(Category::class)->create()->id,
            'description' => $faker->text(),
            'status' => $faker->numberBetween(1, 3),
        ];

        $productId = 1;

        $response = $this->json('PUT', "api/products/product/". $productId, $product);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }

    public function testDelete()
    {
        $productId = 1;
        $response = $this->json('DELETE', 'api/products/product/'. $productId);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }
}
