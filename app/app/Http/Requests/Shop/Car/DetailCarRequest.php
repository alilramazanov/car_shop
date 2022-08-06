<?php

namespace App\Http\Requests\Shop\Car;

use App\Http\Requests\ApiRequest;

class DetailCarRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer|exists:cars,id'
        ];
    }
}
