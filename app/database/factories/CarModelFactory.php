<?php

namespace Database\Factories;

use App\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarModelFactory extends Factory
{

    protected $model = CarModel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $brandId = rand(1,2);
        $model = $brandId == 1 ?
            (rand(1,2) == 1? 'ES' : 'GX') :
            (rand(1,2) == 1? 'Camry' : 'Corolla');
        $model .= ' ' . $this->faker->year(now());

        $driveTypes = [
            CarModel::FRONT_DRIVE,
            CarModel::FULL_DRIVE,
            CarModel::REAR_DRIVE
        ];

        $engineTypes = [
            CarModel::HYBRID_ENGINE,
            CarModel::PETROL_ENGINE,
            CarModel::DIESEL_ENGINE
        ];

        return [
            'name' => $model,
            'type_drive' => $driveTypes[rand(0,2)],
            'type_engine' => $engineTypes[rand(0,2)],
            'brand_id' => $brandId

        ];
    }
}
