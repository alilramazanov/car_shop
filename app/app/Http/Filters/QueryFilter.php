<?php

namespace App\Http\Filters;

use App\Http\DtoObjects\DtoObjectInterface;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected $builder;

    public function __construct(){
        $this->builder = $this->makeQueryModel();
    }

    /**
     * @param $request
     * @return Builder
     */
    public function apply($request): Builder {
        foreach ($this->getParameters($request) as $parameter => $value){
            $this->$parameter($value);
        }
        return $this->builder;
    }

    public function getParameters(DtoObjectInterface $filterDto): array{
        return $filterDto->toArray();
    }

    public abstract function makeQueryModel(): Builder;

}