<?php


use App\Http\Models\Products\Stock;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Stock::truncate();

        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Stock::create([
                'name' => $faker->name,
                'price' => $faker->numberBetween(200, 1000),
            ]);
        }
    }

}
