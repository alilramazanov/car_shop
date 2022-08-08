<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\DtoObjects\Shop\FactoryDtoObject;
use App\Http\Repositories\Shop\CarRepository;
use App\Http\Requests\Shop\Car\CreateCarRequest;
use App\Http\Requests\Shop\Car\DetailCarRequest;
use App\Http\Requests\Shop\Car\ListCarRequest;
use App\Http\Requests\Shop\Car\ListModelRequest;
use App\Http\Resources\ListCategoryResource;
use App\Http\Resources\Shop\Car\DetailCarResource;
use App\Http\Resources\Shop\Car\ListCarResource;
use App\Http\Strategies\DtoStrategies\MakeDto\MakeDtoFromRequest;
use App\Models\Brand;
use App\Models\CarModel;



/**
*
* @OA\Get(
 *     path="/cars/list",
 *     tags={"Cars"},
 *     summary="Get filtered list of cars",
 *     description="return list of cars",
 *
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *     ),
 *     @OA\Parameter (
 *          name="city_id",
 *          description="city's id of car",
 *          in="query",
 *          @OA\Schema (
 *              type="integer",
 *              example="1"
 *          )
 *     ),
 *
 *     @OA\Parameter (
 *          name="car_model_id",
 *          description="model's id of car",
 *          in="query",
 *          @OA\Schema (
 *              type="integer",
 *              example=1
 *          )
 *     ),
 *
 *     @OA\Parameter (
 *          name="price",
 *          description="price of car. Between min and max price",
 *          in="query",
 *          @OA\Schema (
 *              type="json",
 *              example="[1000000,100000000]"
 *          )
 *     ),
 *
 *     @OA\Parameter (
 *          name="type_drive",
 *          description="type drive of car",
 *          in="query",
 *          @OA\Schema (
 *              type="string",
 *              example="full_drive"
 *          )
 *     ),
 *
 *     @OA\Parameter (
 *          name="type_engine",
 *          description="type engine of car",
 *          in="query",
 *          @OA\Schema (
 *              type="string",
 *              example="petrol_engine"
 *          )
 *     ),
 * )
 *
 * @OA\Get(
 *     path="/cars/detail",
 *     tags={"Cars"},
 *     summary="Get detail info of car",
 *     description="return detail info car",
 *
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *     ),
 *     @OA\Parameter (
 *          name="id",
 *          description="id of car",
 *          required=true,
 *          in="query",
 *          @OA\Schema (
 *              type="integer",
 *              example="2"
    *          )
 *     ),
 *)
 *
 * @OA\Get(
 *     path="/cars/brands/list",
 *     tags={"Brands"},
 *     summary="Get list brands",
 *     description="return list brands",
 *
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *     )
 *)
 *
 * @OA\Get(
 *     path="/cars/models/list",
 *     tags={"Models"},
 *     summary="Get filtred list models",
 *     description="return list brands",
 *
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *     ),
 *     @OA\Parameter (
 *          name="brand_id",
 *          description="id of brand",
 *          required=true,
 *          in="query",
 *          @OA\Schema (
 *              type="integer",
 *              example="2"
 *          )
 *     ),
 * )
 *
 * @OA\Post(
 *     path="/cars/create",
 *     tags={"Cars"},
 *     summary="create new car",
 *     @OA\Response (
 *          response=201,
 *          description="created",
 *     ),
 *
 *     @OA\RequestBody (
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/CarDtoObject")
 *      )
 * ),
 *
 * @OA\Post(
 *     path="/cars/delete",
 *     tags={"Cars"},
 *     summary="delete car",
 *     @OA\Response (
 *          response=200,
 *          description="deleted",
 *     ),
 *     @OA\RequestBody (
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/DetailCarRequest")
 *      )
 * )
 */

class CarController extends Controller
{
    protected $carRepository;
    protected $factoryDtoObject;
    protected $makeDto;


    /**
    * @param  CarRepository  $repository
    * @param  FactoryDtoObject  $factoryDtoObject
    * @param  MakeDtoFromRequest  $makeDtoFromRequest
    */
    public function __construct(CarRepository $repository, FactoryDtoObject $factoryDtoObject, MakeDtoFromRequest $makeDtoFromRequest){
        $this->carRepository = $repository;
        $this->makeDto = $makeDtoFromRequest;
        $this->factoryDtoObject = $factoryDtoObject;
        $this->factoryDtoObject->setMakeDtoStrategy($makeDtoFromRequest);
    }

    public function list(ListCarRequest $request){
        $filterCarDto = $this->factoryDtoObject->create('FilterCarDtoObject', $request);
        $cars = $this->carRepository->getFilteredCarList($filterCarDto);
        return ListCarResource::collection($cars);
    }

    public function detail(DetailCarRequest $request){
        $carDto = $this->factoryDtoObject->create('CarDto', $request);
        $car = $this->carRepository->getCarById($carDto);
        return new DetailCarResource($car);
    }

    public function create(CreateCarRequest $createCarRequest){
        $carDto = $this->factoryDtoObject->create('CarDto', $createCarRequest);
        $car = $this->carRepository->createCarForSale($carDto);
        if ($car){
            return response('created',201);
        }
    }

    public function delete(DetailCarRequest $request){
        $carDto = $this->factoryDtoObject->create('CarDto', $request);
        $isDeleteCar = $this->carRepository->deleteCarForSale($carDto);
        if ($isDeleteCar){
            return response('deleted', 200);
        }
    }

    public function listBrand(){
        $brands = Brand::query()
            ->get(['id','name']);

        return ListCategoryResource::collection($brands);
    }

    public function listModel(ListModelRequest $request){
        $carDto = $models = CarModel::query()
            ->where('brand_id',$request->get('brand_id'))
            ->get();

        return ListCategoryResource::collection($models);
    }
}