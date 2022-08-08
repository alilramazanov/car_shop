<?php

namespace App\Http\Requests\Shop\Car;

use App\Http\Requests\ApiRequest;

class CreateCarRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'string|nullable',
            'city_id' => 'required|integer|exists:cities,id',
            'car_model_id' => 'required|integer|exists:car_models,id',
            'creator_id' =>'required|integer|exists:users,id',
            'preview' => 'image|nullable|max:1999'
        ];
    }
}
