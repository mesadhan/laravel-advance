<?php

use App\Http\Models\Person;
use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::truncate();

        for ($i = 0; $i < 15000; $i++) {
            error_log('Created Item.....| '. $i);
            factory(Person::class)->create();
        }
    }
}
