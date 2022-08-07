<?php

namespace App\Http\Repositories\Shop;

use App\Http\DtoObjects\Shop\CarDtoObject;
use App\Http\DtoObjects\Shop\FilterCarDtoObject;
use App\Http\Filters\Shop\CarQueryFilter;
use App\Http\Repositories\BaseRepository;
use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;

class CarRepository extends BaseRepository
{
    protected $carQueryFilter;
    public function __construct()
    {
        parent::__construct();
        $this->carQueryFilter = new CarQueryFilter();
    }

    protected function makeQueryModel(): Builder
    {
        return Car::query();
    }

    /**
     * @param  CarDtoObject  $carDtoObject
     * @return Builder|Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getCarById(CarDtoObject $carDtoObject){
        return $this->modelBuilder
            ->find($carDtoObject->getId());
    }

    public function getFilteredCarList(FilterCarDtoObject $carDtoObject, $paginate = null){
        return $this->carQueryFilter
            ->apply($carDtoObject)
            ->paginate($paginate);

    }
}