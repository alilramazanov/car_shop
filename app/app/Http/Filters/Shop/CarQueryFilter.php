<?php

namespace App\Http\Filters\Shop;

use App\Http\Filters\QueryFilter;
use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;

class CarQueryFilter extends QueryFilter
{

    public function makeQueryModel(): Builder
    {
        $columns = [
            'cars.id as id',
            'preview',
            'price',
            'cm.name as model_name',
            'br.name as brand',
            'cars.city_id',
        ];

        return Car::query()
            ->select($columns)
            ->leftJoin('car_models as cm','cars.car_model_id','=','cm.id')
            ->leftJoin('brands as br','cm.brand_id','=','br.id')
            ->distinct('cars.id');
    }

    public function city_id(int $value){
        $this->builder
            ->where('city_id',$value);
    }

    public function type_drive(string $value){
        $this->builder
            ->where('cm.type_drive','=',$value);
    }

    public function type_engine(string $value){
        $this->builder
            ->where('cm.type_engine','=',$value);
    }

    public function car_model_id(int $value){
        $this->builder
            ->where('cm.id','=',$value);
    }

    public function price($value){
        $data = json_decode($value);
        $this->builder
            ->whereBetween('price',$data);
    }
}