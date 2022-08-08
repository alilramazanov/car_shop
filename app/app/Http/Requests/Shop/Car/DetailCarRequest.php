<?php

namespace App\Http\Requests\Shop\Car;

use App\Http\Requests\ApiRequest;

/**
 * @OA\Schema (
 *     title="DetailCarRequest",
 *     description="car-dto object",
 *     type="object",
 *     required={""},
 *
 * )
 */

class DetailCarRequest extends ApiRequest
{

    /**
     * @OA\Property(
     *     title="id",
     *     type="integer",
     *     description="id of car",
     *     example=1
     * )
     * @var $id integer
     */
    protected $id;

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
