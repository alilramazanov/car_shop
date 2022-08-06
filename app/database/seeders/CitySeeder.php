<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            'Москва',
            'Питер',
            'Екатеринбург'
        ];

        foreach ($cities as $city){
            City::query()
                ->create(['name' => $city]);
        }
    }
}
