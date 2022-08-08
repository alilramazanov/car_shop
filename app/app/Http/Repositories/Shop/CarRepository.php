<?php

namespace App\Http\Repositories\Shop;

use App\Http\DtoObjects\Shop\CarDtoObject;
use App\Http\DtoObjects\Shop\FilterCarDtoObject;
use App\Http\Filters\Shop\CarQueryFilter;
use App\Http\Repositories\BaseRepository;
use App\Http\Services\FileUploadAction;
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

        $columns = [
            'cars.id as id',
            'description',
            'preview',
            'price',
            'cm.type_drive',
            'cm.type_engine',
            'cm.name as model_name',
            'br.name as brand',
            'cars.city_id'

        ];

        $car = $this->modelBuilder
            ->select($columns)
            ->leftJoin('car_models as cm','cars.car_model_id','=','cm.id')
            ->leftJoin('brands as br','cm.brand_id','=','br.id')
            ->find($carDtoObject->getId());

        return $car;
    }

    public function getFilteredCarList(FilterCarDtoObject $carDtoObject, $paginate = null){
        return $this->carQueryFilter
            ->apply($carDtoObject)
            ->paginate($paginate);

    }


    public function createCarForSale(CarDtoObject $carDtoObject){
        $data = $carDtoObject->toArray();

        if (is_file($carDtoObject->getPreview())){
            $filePath = FileUploadAction::handle($carDtoObject->getPreview(),$carDtoObject->getCreator_Id());
            $data['preview'] = $filePath;
        }

        $newCar = $this->modelBuilder->create($data);

        return $newCar;
    }

    public function deleteCarForSale(CarDtoObject $carDtoObject){
        return $this->modelBuilder
            ->find($carDtoObject->getId())
            ->delete();
    }
}