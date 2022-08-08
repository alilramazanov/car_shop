<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{

    protected $model = Car::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $description = $this->faker->sentence(rand(10,30));
        $price = rand(6000000, 10000000);
        $creatorId = User::query()->get()->random()->id;
        $carModelId = CarModel::query()->get()->random()->id;
        $cityId = City::query()->get()->random()->id;

        return [
            'description' => $description,
            'price' => $price,
            'creator_id' => $creatorId,
            'car_model_id' => $carModelId,
            'city_id' => $cityId
        ];
    }
}
