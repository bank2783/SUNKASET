<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductRSController;
use App\Http\Controllers\market_controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\HomeRsController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\UserApiController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// -------------------user----------------------------
Route::get('user/account/profile',[userController::class,'UserProfile'])->name('profile');
Route::get('/user/account/profile/edit',[userController::class,'editform'])->name('editprofile.form');




//  Route::get('editprofile/form',[userController::class, 'editform'])->name('edit.form');

 Route::post('/editprofile/edit/{id}',[userController::class,'update'])->name('editprofile.update');


Route::get('addproduct/form/{id}',[ProductsController::class, 'form']);

Route::post('addproduct/form/added/{id}',[ProductsController::class, 'store']);


Route::get('product_request/show',[ProductsController::class, 'ShowProductRequest'])->name('product.request')->middleware('CheckAdmin');

Route::post('market/register/insert',[market_controller::class,'market_register'])->name('market.register.insert');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('market/register/form',[market_controller::class,'show_market_register'])->name('market.register.form');



// ------------------- Admin Route -----------------------//
Route::get('admin/approve/market',[AdminController::class,'ApproveMarketView'])->name('admin.approve.maket');
Route::get('admin/markets/approved/{id}',[AdminController::class,'market_approve'])->name('admin.market.approved');
Route::get('admin/markets/no_approved/{id}',[AdminController::class,'market_no_approve'])->name('admin.market.no_approved');
Route::get('admin/home',[AdminController::class,'show_home'])->name('admin.home');
Route::get('admin/approve/products',[AdminController::class,'ApproveProductsView'])->name('admin.approve.products');
Route::get('admin/product/approved/{id}',[AdminController::class,'ProductApproved'])->name('admin.product.approved');
Route::get('admin/product/no_approved/{id}',[AdminController::class,'ProductNoApproved'])->name('admin.product.no_approved');
Route::get('admin/wearhouse/view',[AdminController::class,'ShowWearhouse'])->name('admin.wearhouse.view');

//-------------------Warehouse Route ---------------------//

Route::put('admin/warehouse/edit/products/form',[WarehouseController::class,'EditProducts'])->name('admin.warehouse.edit.product.form');
Route::put('admin/warehouse/edit/products/update',[WarehouseController::class,'ProductUpdate'])->name('admin.warehouse.edit.products.update');
Route::put('admin/warehouse/products/delete',[WarehouseController::class,'DeleteProduct'])->name('admin.warehouse.delete.product');
Route::put('admin/warehouse/products/sell',[WarehouseController::class,'SellProduct'])->name('admin.product.sell');
// ------------------- Market Route ----------------- //
Route::get('user/market',[market_controller::class,'user_market'])->name('user.market');

//----------------Sale Route----------------//
Route::get('admin/warehouse/product/sell/list',[WarehouseController::class,'SellProductListView'])->name('admin.warehouse.product.sell.list');
Route::put('admin/warehouse/product/sell/add-front-description/from',[WarehouseController::class,'AddProductDescriptionFrom'])->name('admin.warehouse.product.sell.add-front-description.from');
Route::put('admin/warehouse/product/sell/add-front-description/insert',[WarehouseController::class,'AddProductDescriptionInsert'])->name('admin.warehouse.product.sell.add-front-description.insert');
Route::put('admin/warehouse/product/sell/add-front-description/cancel',[WarehouseController::class,'CancelProductSelling'])->name('admin.warehouse.product.cancel');


//-------------------- Products Route----------------//
Route::get('product/view/{id}',[ProductsController::class,'ProductView'])->name('product.view');

//-------------------- Cart Route ------------------//
Route::get('cart',[ProductsController::class,'ShowCartView'])->name('Show.Cart.View');
// Route::post('cart/insert',[ProductsController::class,'CartInsert'])->name('Cart.insert');


// ------------------------Resource-----------------------------//
Route::resource('resource/product/view','App\Http\Controllers\ProductRSController');


// -----------------Home Showproduct---------------------//
Route::resource('home', HomeRsController::class);
Route::get('product/view/{id}', [ProductRsController::class,'index']);


// --------------- Cart API----------------------//
Route::get('api/cart',[ProductAPIcontroller::class,'ShowCartData']);


// ----------------User API--------------------//
Route::get('api/user/account/profile',[UserApiController::class,'UserData']);

Route::post('api/user/account/profile/update/{id}',[UserApiController::class,'update']);
