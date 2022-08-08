<?php

namespace App\Http\DtoObjects\Shop;

use App\Http\DtoObjects\DtoCore;


/**
 * @OA\Schema (
 *     title="CarDtoObject",
 *     description="car-dto object",
 *     type="object",
 *     required={""},
 *
 * )
 */

class CarDtoObject extends DtoCore
{

    /**
     * @OA\Property(
     *     title="id",
     *     type="integer",
     *     description="id of car",
     *     example=1
     * )
     * @var $id integer
     */
    protected $id;


    /**
     * @OA\Property(
     *     title="description",
     *     type="string",
     *     description="description of car",
     *     example="The best car in the world"
     * )
     * @var $description string
     */
    protected $description;

    /**
     * @OA\Property(
     *     title="preview",
     *     type="file",
     *     description="preview of car"
     * )
     * @var $preview object
     */
    protected $preview;

    /**
     * @OA\Property(
     *     title="price",
     *     type="integer",
     *     description="price of car",
     *     example=4000000
     * )
     * @var $price integer
     */
    protected $price;

    /**
     * @OA\Property(
     *     title="creator_id",
     *     type="integer",
     *     description="creator's id of car",
     *     example=1
     * )
     * @var $creator_id integer
     */
    protected $creator_id;

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
     *     title="city_id",
     *     type="integer",
     *     description="city's id of car",
     *     example=1
     * )
     * @var $city_id integer
     */
    protected $city_id;

    /**
     * @return int
     */
    public function getCity_Id(): int
    {
        return $this->city_id;
    }

    /**
     * @param  int  $city_id
     */
    public function setCity_Id(int $city_id): void
    {
        $this->city_id = $city_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  mixed  $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  mixed  $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * @param  mixed  $preview
     */
    public function setPreview($preview): void
    {
        $this->preview = $preview;
    }

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
    public function getCreator_Id()
    {
        return $this->creator_id;
    }

    /**
     * @param  mixed  $creator_id
     */
    public function setCreator_Id($creator_id): void
    {
        $this->creator_id = $creator_id;
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
    

}