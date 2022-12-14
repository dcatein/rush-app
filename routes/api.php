<?php

use App\Http\Controllers\Offers\GetPsnOffersController;
use App\Http\Controllers\Products\CreateProductsController;
use App\Http\Controllers\Products\GetProductsController;
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

Route::group(['prefix' => '/product'], function (){
    Route::post('', CreateProductsController::class);
    Route::get('', GetProductsController::class);
});

Route::group(['prefix' => '/offer'], function (){
    Route::get('', GetPsnOffersController::class);
});
