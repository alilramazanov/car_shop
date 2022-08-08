<?php

namespace App\Http\DtoObjects\Shop;

use App\Http\DtoObjects\DtoCore;


/**
 * @OA\Schema (
 *     title="FilterCarDtoObject",
 *     description="filter-car-dto object",
 *     type="object",
 *     required={""},
 *
 * )
 */
class FilterCarDtoObject extends DtoCore
{
    /**
     * @OA\Property(
     *     title="city_id",
     *     type="integer",
     *     description="city id",
     *     example=1
     * )
     * @var $city_id integer
     */
    protected $city_id;


    /**
     * @OA\Property(
     *     title="type_drive",
     *     type="string",
     *     description="type drive of car",
     *     example="full_drive"
     * )
     * @var $type_drive integer
     */
    protected $type_drive;


    /**
     * @OA\Property(
     *     title="type_engine",
     *     type="string",
     *     description="type engine of car",
     *     example="petrol_engine"
     * )
     * @var $type_engine integer
     */
    protected $type_engine;


    /**
     * @OA\Property(
     *     title="car_model_id",
     *     type="integer",
     *     description="model's id of car",
     *     example=1
     * )
     * @var $car_model_id integer
     */
    protected $car_model_id;


    /**
     * @OA\Property(
     *     title="price",
     *     type="json",
     *     description="price of car. Between min and max price",
     *     example="[1000000,100000000]"
     * )
     * @var $price integer
     */
    protected $price;



    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param  mixed  $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCar_Model_Id()
    {
        return $this->car_model_id;
    }

    /**
     * @param  mixed  $car_model_id
     */
    public function setCar_Model_Id($car_model_id): void
    {
        $this->car_model_id = $car_model_id;
    }

    /**
     * @return mixed
     */
    public function getType_Engine()
    {
        return $this->type_engine;
    }

    /**
     * @param  mixed  $type_engine
     */
    public function setType_Engine($type_engine): void
    {
        $this->type_engine = $type_engine;
    }


    /**
     * @return mixed
     */
    public function getType_Drive()
    {
        return $this->type_drive;
    }

    /**
     * @param  mixed  $type_drive
     */
    public function setType_Drive($type_drive): void
    {
        $this->type_drive = $type_drive;
    }

    /**
     * @return mixed
     */
    public function getCity_Id()
    {
        return $this->city_id;
    }

    /**
     * @param  mixed  $city_id
     */
    public function setCity_Id($city_id): void
    {
        $this->city_id = $city_id;
    }



}