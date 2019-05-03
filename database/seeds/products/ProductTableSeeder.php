<?php


use App\Http\Models\Products\Category;
use App\Http\Models\Products\Product;
use App\Http\Models\Products\Stock;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Config;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::truncate();
        Category::truncate();

        for ($i = 0; $i < 5; $i++) {
            factory(Product::class)->create();

        }

    }

}
