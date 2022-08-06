<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'Lexus',
            'Toyota',
        ];

        foreach ($brands as $brand){
            Brand::query()
                ->create(['name' => $brand]);
        }
    }
}
