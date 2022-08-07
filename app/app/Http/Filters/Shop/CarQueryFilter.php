<?php

namespace App\Http\Filters\Shop;

use App\Http\Filters\QueryFilter;
use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;

class CarQueryFilter extends QueryFilter
{

    public function makeQueryModel(): Builder
    {
        return Car::query();
    }

    public function city_id(int $value){
        $this->builder
            ->where('city_id',$value);
    }
}