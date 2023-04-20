<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\API\UserApiController;
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
Route::get('product/view/{id}',[ProductAPIcontroller::class,'index']);

Route::post('order/cart',[ProductAPIcontroller::class,'store']);

Route::post('user/account/profile/update',[UserApiController::class,'update']);






//-------------------Preorder add order-----------------------------//
Route::post('preorder/add',[ProductAPIcontroller::class,'AddPreorder']);

//-------------------Preorder Data----------------------------//
// Route::get('preorder/view',[ProductAPIcontroller::class,'PreorderData']);


