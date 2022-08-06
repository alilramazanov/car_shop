<?php

namespace App\Http\Requests\Shop\Car;

use App\Http\Requests\ApiRequest;
class ListModelRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand_id' => 'required|integer|exists:brands,id'
            //
        ];
    }
}
