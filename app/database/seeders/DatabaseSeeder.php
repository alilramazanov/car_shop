<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarModel;
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
         \App\Models\User::factory(1)->create();
        $this->call(CitySeeder::class);
        $this->call(BrandSeeder::class);


        CarModel::factory(4)->create();
        Car::factory(25)->create();
    }
}
