<?php

namespace App\Http\Strategies\DtoStrategies;

interface MakeDtoStrategyInterface
{

    /**
     * Это интерфейс для разных стратегий создания dto из Model, из FormRequest, и т.д
     * @param $request
     * @param  object  $object
     * @return mixed
     */
    public function makeDto($request, object $object);

}