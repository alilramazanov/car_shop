<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



/**
 *
 * @OA\Get(
 *     path="/cars/list",
 *     tags={"Cars"},
 *     summary="Get filtered list of cars",
 *     description="return list of cars",
 *
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *     ),
 *     @OA\Parameter (
 *          name="name",
 *          description="name of car. Сase insensitive",
 *          in="query",
 *          @OA\Schema (
 *              type="string",
 *              example="A"
 *          )
 *     ),
 *
 * )
 */
class CarController extends Controller
{

    public function list(){
        return 1;
    }
}
