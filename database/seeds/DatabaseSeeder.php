<?php


use App\Http\Models\Products\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CategoriesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(StockTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        //$this->call(CategoriesTableSeeder::class);


    }
}
