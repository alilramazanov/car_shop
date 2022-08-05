<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 *   @OA\Info(
 *     version="1.0.0",
 *     title="shop_car",
 *     description="shop car documentation")
 *
 *   @OA\Server (
 *     url="http://localhost:8081/api/shop/v1/",
 *     description="test",
 *     )
 *
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
