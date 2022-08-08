<?php

namespace App\Http\Resources\Shop\Car;

use Illuminate\Http\Resources\Json\JsonResource;

class ListCarResource extends JsonResource
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
            'preview' => $this->preview,
            'price' => $this->price,
            'city' => $this->city->name,
            'name' => $carName,
        ];
    }
}
