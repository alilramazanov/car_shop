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
        $carName = $this->carModel->brand->name . ' ' . $this->carModel->name;
        return [
            'id' => $this->id,
            'description' => $this->description,
            'preview' => $this->preview,
            'detailImages' => $this->detail_images,
            'purchasedIn' => $this->purchased_in,
            'price' => $this->price,
            'city' => $this->city->name,
            'model' => $carName

        ];


    }
}
