<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(
    ['prefix' => 'shop'],
    function (){
        Route::group(
            ['prefix' => 'v1'],
            function (){
                Route::group(
                    ['prefix' => 'cars'],
                    function (){
                        Route::get('list', 'Shop\CarController@list');
                        Route::get('detail', 'Shop\CarController@detail');

                        Route::post('create','Shop\CarController@create');
                        Route::post('delete', 'Shop\CarController@delete');

                        Route::get('brands/list', 'Shop\CarController@listBrand');
                        Route::get('models/list', 'Shop\CarController@listModel');

                    }
                );
            }
        );
    }
);