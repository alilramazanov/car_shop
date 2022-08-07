<?php

namespace App\Http\DtoObjects\Shop;

use App\Http\Strategies\DtoStrategies\MakeDto\MakeDtoFromRequest;
use App\Http\Strategies\DtoStrategies\MakeDtoStrategyInterface;

class FactoryDtoObject
{
    protected MakeDtoStrategyInterface $makeDtoStrategy;

    public function __construct(){
        $this->makeDtoStrategy = new MakeDtoFromRequest();

    }

    /**
     * @param  MakeDtoStrategyInterface  $makeDtoStrategy
     */
    public function setMakeDtoStrategy(MakeDtoStrategyInterface $makeDtoStrategy){
        $this->makeDtoStrategy = $makeDtoStrategy;

    }


    /**
     * @param  string  $type
     * @param $request
     * @param  MakeDtoStrategyInterface|null  $makeDtoStrategy
     * @return CarDtoObject|FilterCarDtoObject
     * @throws \Exception
     */
    public function create(string $type, $request, MakeDtoStrategyInterface $makeDtoStrategy = null ){
        switch ($type){
            case 'CarDto': return new CarDtoObject($request, $makeDtoStrategy ?? $this->makeDtoStrategy);
            case 'FilterCarDtoObject': return new FilterCarDtoObject($request,$makeDtoStrategy ?? $this->makeDtoStrategy);

        }

        throw new \Exception(sprintf('dto object %s not found', $type));
    }

}