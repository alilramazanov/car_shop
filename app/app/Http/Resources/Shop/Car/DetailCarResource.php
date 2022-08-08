<?php

namespace App\Http\Resources\Shop\Car;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $carName = $this->brand . ' ' . $this->model_name;

        return [
            'id' => $this->id,
            'description' => $this->description,
            'preview' => $this->preview,
            'price' => $this->price,
            'city' => $this->city->name,
            'name' => $carName,
            'model' => [
                'brand' => $this->brand,
                'modelName' => $this->model_name,
                'typeDrive' => $this->type_drive,
                'typeEngine' => $this->type_engine,
            ]

        ];


    }
}
