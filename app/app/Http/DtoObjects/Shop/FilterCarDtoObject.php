<?php

namespace App\Http\DtoObjects\Shop;

use App\Http\DtoObjects\DtoCore;

class FilterCarDtoObject extends DtoCore
{
    protected $city_id;

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