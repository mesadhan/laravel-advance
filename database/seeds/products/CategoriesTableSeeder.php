<?php

use App\Http\Models\Products\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        for ($i = 0; $i < 5; $i++) {
            factory(Category::class)->create();
        }
    }
}
