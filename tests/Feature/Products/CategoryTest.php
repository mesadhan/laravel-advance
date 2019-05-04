<?php

namespace Tests\Feature;

use App\Http\Models\Products\Category;
use Faker\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        Category::truncate();
        factory(Category::class)->create();

        $response = $this->json('GET', '/api/products/category');
        $response->assertJson([
            'status' => 'success',
        ]);
        $response->assertStatus($response->getStatusCode());
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }


    /**
     * @test
     */
    public function store()
    {
        $faker = Factory::create();
        $imagePath = public_path(Config::get('assets.images'));
        $image_name = $faker->image($imagePath, 200, 200, false);

        $category = [
            'name' => $faker->name,
            'title' => $faker->sentence,
            'photo' => $image_name,
            'status' => $faker->numberBetween(1, 3),
        ];

        $response = $this->json('POST', 'api/products/category', $category);
        $response->assertJson([
            'status' => 'success'
        ]);
        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
    }


    /**
     * @test
     */
    public function show()
    {
        $categoryId = 1;
        $response = $this->json('GET', 'api/products/category/' . $categoryId);

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }


    /**
     * @test
     */
    public function update()
    {
        $faker = Factory::create();
        $imagePath = public_path(Config::get('assets.images'));
        $image_name = $faker->image($imagePath, 200, 200, false);

        $category = [
            'name' => $faker->name,
            'title' => $faker->sentence,
            'price' => $faker->numberBetween(200, 1000),
            'photo' => $image_name,
            'category_id' => factory(Category::class)->create()->id,
            'description' => $faker->text(),
            'status' => $faker->numberBetween(1, 3),
        ];

        $categoryId = 1;

        $response = $this->json('PUT', "api/products/category/" . $categoryId, $category);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }




    /**
     * @test
     */
    public function categoryWiseProducts()
    {
        $response = $this->json('get', 'api/products/category/categoryWiseProducts');
        $response->assertJson([
            'status' => 'success'
        ]);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }


    /**
     * @test
     */
    public function categoryByProducts()
    {
        $productId = 1;
        $response = $this->json('get', 'api/products/category/categoryByProducts/' . $productId);
        $response->assertJson([
            'status' => 'success'
        ]);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }


    /**
     * @test
     */
    public function categoryByCategoryIdAndProductId()
    {
        $categoryId = 1;
        $productId = 1;
        $response = $this->json('get', 'api/products/category/categoryByCategoryIdAndProductId/' . $categoryId . '/' . $productId);
        $response->assertJson([
            'status' => 'success'
        ]);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }


    public function testDelete()
    {
        $categoryId = 1;
        $response = $this->json('DELETE', 'api/products/category/' . $categoryId);
        $response->assertJson([
            'status' => 'success'
        ]);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }


}
