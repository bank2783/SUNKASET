<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductRSController;
use App\Http\Controllers\market_controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\HomeRsController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleMapController;
use App\Http\Controllers\TypeMapController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\UserApiController;
use App\Models\User;
use App\Models\Warehouse;
use App\Models\Preorder;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Crypt;


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
   $products =  Warehouse::where('product_status','=','selling')->paginate(12);
    return view('home',compact('products'))
    ->with('i',(request()->input('page',1)-1)*12);
});

Route::get('product/type-rice', function (){
    $products = Warehouse::where('product_status','=','selling')->where('product_type_id','=','2')->paginate(10);
    return view('Type.rice',compact('products'))
    ->with('i',(request()->input('page',1)-1)*10);
});

Route::get('product/processed-products', function (){
    $products = Warehouse::where('product_status','=','selling')->where('product_type_id','=','3')->paginate(10);
    return view('Type.processed_products',compact('products'))
    ->with('i',(request()->input('page',1)-1)*10);
});

Route::get('product/souvenir', function (){
    $products = Warehouse::where('product_status','=','selling')->where('product_type_id','=','4')->paginate(10);
    return view('Type.souvenir',compact('products'))
    ->with('i',(request()->input('page',1)-1)*10);
});
Route::get('product/agricultural_products', function (){
    $products = Warehouse::where('product_status','=','selling')->where('product_type_id','=','4')->paginate(10);
    return view('Type.souvenir',compact('products'))
    ->with('i',(request()->input('page',1)-1)*10);
});

Route::get('preorder/view', function (){
    $products =  preorder::where('pre_status','=','on')->paginate(12);
    return view('preorder_page',compact('products')) ->with('i',(request()->input('page',1)-1)*12);
});






// Route::get('preorder/view',[HomeController::class,'ShowPreorderView']);

// Route::get('google-map', [GoogleMapController::class, 'ShowMap']);

// Route::get('product-type/rice',[TypeController::class,'Rice_type'])->name('product.type.rice');





// -------------------user preorder----------------------------
Route::get('user/account/profile',[userController::class,'UserProfile'])->name('profile')->middleware('Checklogin');
Route::get('user/account/profile/edit',[userController::class,'editform'])->name('editprofile.form')->middleware('Checklogin');
Route::get('user/acount/preorder',[userController::class,'ShowPreorderList'])->name('Show.preorder.list')->middleware('Checklogin');
Route::put('user/account/profile/update',[UserController::class,'UserUpdateProfile'])->name('user.update.profile')->middleware('Checklogin');
Route::get('user/acount/preorder/add/address/form',[userController::class,'AddAddressForm'])->name('add.address.form')->middleware('Checklogin');
Route::put('user/acount/preorder/add/address/form/insert',[userController::class,'InsertAddress'])->name('add.transport.data')->middleware('Checklogin');
// Route::get('user/acount/preorder/select/address',[userController::class,'ShowSelectAddress'])->name('show.select.address')->middleware('Checklogin');
Route::get('user/acount/preorder/edit/address/form',[userController::class,'ShowEditAdressForm'])->name('show.edit.address.form')->middleware('Checklogin');
Route::put('user/acount/preorder/edit/address/update',[userController::class,'UpdateTransportAddress'])->name('show.edit.address.update')->middleware('Checklogin');
Route::get('user/acount/preorder/payment-method/{id}',[userController::class,'ShowPayMentMethod'])->name('show.payment.method')->middleware('Checklogin');
Route::get('user/acount/bought-histories',[userController::class,'ShowUserBoughtHistories'])->name('Show.user.bought.histories')->middleware('Checklogin');
Route::get('user/acount/delete/preorder-list/{id}',[userController::class,'UserDeletePreorderList'])->name('user.delete.preorder.list')->middleware('Checklogin');
Route::get('user/acount/view-order-must-get',[userController::class,'viewOrdeMustGet'])->name('view.order.must.get')->middleware('Checklogin');
Route::get('user/acount/by-product-confirm-list',[userController::class,'showProductConFirm'])->name('show.products.cofirm.list')->middleware('Checklogin');
Route::get('user-acount/product-order-payment/{id}',[userController::class,'ShowProductInsertPayment'])->name('show.product.insert.payment')->middleware('Checklogin');
Route::post('user-acount/product-order-payment/insert-slip-product/{id}',[userController::class,'insertSlipProduct'])->name('insert.slip.product')->middleware('Checklogin');
Route::post('user/acount/preorder-payment-upload/{id}',[userController::class,'UploadPreorderPayment'])->name('upload.preorder.payment')->middleware('Checklogin');

Route::get('product-type/rice',[HomeController::class,'Rice_type'])->name('product.type.rice');

//  Route::get('editprofile/form',[userController::class, 'editform'])->name('edit.form');

Route::post('/editprofile/edit/{id}',[userController::class,'update'])->name('editprofile.update')->middleware('Checklogin');


Route::get('addproduct/form',[market_controller::class, 'MarketAddProductForm'])->name('market.add.product')->middleware('CheckMarketApprove');

Route::put('addproduct/form/added',[ProductsController::class, 'store'])->name('market.insert.product')->middleware('CheckMarketApprove');


// Route::get('product_request/show',[ProductsController::class, 'ShowProductRequest'])->name('product.request');

Route::put('market/register/insert',[market_controller::class,'market_register'])->name('market.register.insert');



Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('market/register/form',[market_controller::class,'show_market_register'])->name('market.register.form');

Route::get('want/selling/product/agreement',[market_controller::class, 'ShowMarketAgreement'])->name('Show.market.agreement');



// ------------------- Admin Route -----------------------//
Route::get('admin/approve/market',[AdminController::class,'ApproveMarketView'])->name('admin.approve.maket')->middleware('CheckAdmin');
Route::get('admin/markets/approved/{id}',[AdminController::class,'market_approve'])->name('admin.market.approved')->middleware('CheckAdmin');
Route::get('admin/markets/no_approved/{id}',[AdminController::class,'market_no_approve'])->name('admin.market.no_approved')->middleware('CheckAdmin');
Route::get('admin/home',[AdminController::class,'show_home'])->name('admin.home')->middleware('CheckAdmin');
Route::get('admin/approve/products',[AdminController::class,'ApproveProductsView'])->name('admin.approve.products')->middleware('CheckAdmin');
Route::get('admin/product/approved/{id}',[AdminController::class,'ProductApproved'])->name('admin.product.approved')->middleware('CheckAdmin');
Route::get('admin/product/no_approved/{id}',[AdminController::class,'ProductNoApproved'])->name('admin.product.no_approved')->middleware('CheckAdmin');
Route::get('admin/wearhouse/view',[AdminController::class,'ShowWearhouse'])->name('admin.wearhouse.view')->middleware('CheckAdmin');
Route::get('admin/order-list/view',[AdminController::class,'ShowOrderList'])->name('Show.Order.List')->middleware('CheckAdmin');
Route::get('admin/view/user/in-site',[AdminController::class,'AdminViewUser'])->name('admin.view.user.in-site')->middleware('CheckAdmin');
Route::put('admin/order-list/view-by-id',[AdminController::class,'ShowOrderListById'])->name('Show.Order.List.by.id')->middleware('CheckAdmin');
Route::get('admin/edit/user/form/{id}',[AdminController::class,'AdminEditUser'])->name('Admin.show.form.edit.user')->middleware('CheckAdmin');
Route::put('admin/edit/user/updated/{id}',[AdminController::class,'AdminUpdateUserData'])->name('admin.update.user.data')->middleware('CheckAdmin');
Route::get('admin/edit/user/deleded/{id}',[AdminController::class,'AdminDeletedUser'])->name('admin.delete.user')->middleware('CheckAdmin');
Route::get('admin/view/user/detail/{id}',[AdminController::class,'AdminViewUserDetail'])->name('admin.view.user.detail')->middleware('CheckAdmin');
Route::get('admin/view/market/list',[AdminController::class,'AdminViewMarketList'])->name('admin.view.market.list')->middleware('CheckAdmin');
Route::get('admin/view/market/edit/form/{id}',[AdminController::class,'AdminMarketEditForm'])->name('admin.market.edit.form')->middleware('CheckAdmin');
Route::put('admin/view/market/updated/update/{id}',[AdminController::class,'AdminMarketUpdated'])->name('admin.market.updated')->middleware('CheckAdmin');
Route::get('admin/view/market/detail/{id}',[AdminController::class,'AdminViewMarketDetail'])->name('admin.view.market.Detail')->middleware('CheckAdmin');
Route::get('admin/delete/market/{id}',[AdminController::class,'AdminDeleteMarket'])->name('admin.delete.market')->middleware('CheckAdmin');
Route::get('admin/sales-history',[AdminController::class,'ShowHistory'])->name('admin.sale.history')->middleware('CheckAdmin');
Route::get('admin/view/google-map-list',[AdminController::class,'ShowGoogleMapList'])->name('Admin.view.googleMap')->middleware('CheckAdmin');
Route::get('admin/view/order-product-detail/{id}',[AdminController::class,'ShowProductOrderDetail'])->name('show.product.order.detail')->middleware('CheckAdmin');


Route::get('admin/order-list/finish_order/update/{id}',[AdminController::class,'FinishOrder'])->name('finished.order')->middleware('CheckAdmin');

Route::get('admin/view/product/detail/{id}',[AdminController::class,'AdminViewProductDetail'])->name('admin.view.product.detail')->middleware('CheckAdmin');
Route::get('admin/view/market/wait-approv/{id}',[AdminController::class,'ViewMarketWaitDetail'])->name('view.market.wait.detail')->middleware('CheckAdmin');

//-------------------Warehouse Route ---------------------//

Route::put('admin/warehouse/edit/products/form',[WarehouseController::class,'EditProducts'])->name('admin.warehouse.edit.product.form')->middleware('CheckAdmin');
Route::put('admin/warehouse/edit/products/update',[WarehouseController::class,'ProductUpdate'])->name('admin.warehouse.edit.products.update')->middleware('CheckAdmin');
Route::put('admin/warehouse/products/delete',[WarehouseController::class,'DeleteProduct'])->name('admin.warehouse.delete.product')->middleware('CheckAdmin');
Route::put('admin/warehouse/products/sell',[WarehouseController::class,'SellProduct'])->name('admin.product.sell')->middleware('CheckAdmin');




// ------------------- Market Route ----------------- //
Route::get('user/market',[market_controller::class,'user_market'])->name('user.market')->middleware('Checklogin');
Route::get('user/market/view/order-selling',[market_controller::class,'ShowProductSelling'])->name('show.product.salling')->middleware('Checklogin');
Route::get('user/market/view/order-selling/edit/form/{id}',[market_controller::class,'MarketUpdateProductForm'])->name('market.product.selling.edit.form')->middleware('Checklogin');
Route::get('user/market/view/order-selling/update/{id}',[market_controller::class,'MarketUpdateProduct'])->name('market.product.update')->middleware('Checklogin');
Route::get('user/market/view/sold-history',[market_controller::class,'ShowMarketSoldHistory'])->name('Show.market.sold_history')->middleware('Checklogin');
Route::get('user/market/edit/form',[market_controller::class, 'MarketeditDataForm'])->name('market.edit.data')->middleware('Checklogin');
Route::put('user/market/edit/update/{id}',[market_controller::class, 'MarketeditUpdate'])->name('market.edit.update')->middleware('Checklogin');

Route::get('user/marget/add-product-images-form/{id}',[market_controller::class,'AddProductImagesForm'])->middleware('CheckMerchantEditProducts');
Route::post('user/marget/add-product-images-form/insert',[market_controller::class,'AddProductImagesFormInsert'])->middleware('Checklogin');

Route::post('user/market/add-product-main-image-form/insert',[market_controller::class,'AddProductMainImage']);

Route::get('user/market/delete/second-image/{id}',[market_controller::class,'DeleteSecondImages']);

Route::get('user/market/swith-on/prouct/{id}',[market_controller::class,'SwithOnProductInmarket'])->name('swith.on.product.inmarket')->middleware('CheckMerchant');
Route::get('user/market/swith-off/prouct/{id}',[market_controller::class,'SwithOffProductInmarket'])->name('swith.off.product.inmarket')->middleware('CheckMerchant');

Route::get('product/insert/feedback',[ProductsController::class,'InsertFeedBack'])->name('insert.feedback')->middleware('Checklogin');


//----------------Sale Route----------------//
Route::get('admin/warehouse/product/sell/list',[WarehouseController::class,'SellProductListView'])->name('admin.warehouse.product.sell.list')->middleware('CheckAdmin');
Route::put('admin/warehouse/product/sell/add-front-description/from',[WarehouseController::class,'AddProductDescriptionFrom'])->name('admin.warehouse.product.sell.add-front-description.from')->middleware('CheckAdmin');
Route::put('admin/warehouse/product/sell/add-front-description/insert',[WarehouseController::class,'AddProductDescriptionInsert'])->name('admin.warehouse.product.sell.add-front-description.insert')->middleware('CheckAdmin');
Route::put('admin/warehouse/product/sell/add-front-description/cancel',[WarehouseController::class,'CancelProductSelling'])->name('admin.warehouse.product.cancel')->middleware('CheckAdmin');


//-------------------- Products Route----------------//
// Route::get('product/view/{id}',[ProductsController::class,'ProductView'])->name('product.view');

//-------------------- Cart Route ------------------//
Route::get('cart',[ProductsController::class,'ShowCartView'])->name('Show.Cart.View')->middleware('Checklogin');
Route::get('cart/update-order-status-to-confirm',[ProductsController::class,'CartUpdateProductsConfirm'])->name('cart.update.products.confirme')->middleware('Checklogin');
Route::get('cart/cancle-product-in-cart/{id}',[ProductsController::class,'CartCancleProduct'])->middleware('Checklogin');
// Route::post('cart/insert',[ProductsController::class,'CartInsert'])->name('Cart.insert');


// ------------------------Resource-----------------------------//
// Route::resource('resource/product/view','App\Http\Controllers\ProductRSController');


// -----------------Home Showproduct---------------------//
// Route::resource('home', HomeRsController::class);
Route::get('product/view/{id}', [ProductRsController::class,'index'])->name('product.view');
// Route::get('preorder/view',[HomeController::class,'ShowPreorderView'])->name('Show.Preorder.view');
// Route::get('preorders/product/view/{id}',[HomeController::class,'ShowPreorderPoructView']);
Route::get('preorders/product/view/{id}',[ProductsController::class,'PreorderIndex']);






//------------------Pre one api -------------------------------//
// Route::get('api/preorder/product/view/{id}',[ProductAPIcontroller::class,'PreorderOneData']);


// --------------- Cart API----------------------//


// --------------------------Pre Order backend-----------------------------------//
Route::get('admin/preorder/make/form',[HomeController::class,'ShowPreorderPage'])->name('show.preorder.page')->middleware('CheckAdmin');
Route::post('admin/preorder/make/form/insert',[HomeController::class,'InsertPreorder'])->name('preorder.insert')->middleware('CheckAdmin');
Route::get('admin/preorder/manage',[HomeController::class,'ShowPreorderManage'])->name('Show.preorder.manage')->middleware('CheckAdmin');
Route::get('admin/preorder/manage/on/{id}',[HomeController::class,'PreorderUpdateOn'])->name('Preorder.update.on')->middleware('CheckAdmin');
Route::get('admin/preorder/manage/off/{id}',[HomeController::class,'PreorderUpdateOff'])->name('Preorder.update.off')->middleware('CheckAdmin');
Route::get('admin/preorder/manage/delete/{id}',[HomeController::class,'PreorderUpdateDelete'])->name('Preorder.update.delete')->middleware('CheckAdmin');
Route::get('admin/preorder/manage/form/{id}',[HomeController::class,'PreorderUpdateForm'])->name('Preorder.update.form')->middleware('CheckAdmin');
Route::put('admin/preorder/manage/edit/update',[HomeController::class,'PreorderEditeUpdate'])->name('Preorder.edite.update')->middleware('CheckAdmin');

Route::get('admin/preorder/list/view',[HomeController::class,'PreorderListView'])->name('Preorder.list.view')->middleware('CheckAdmin');
Route::post('admin/preorder/edit-preorder-product-data/{id}',[AdminController::class,'addImagesPreorderData'])->middleware('CheckAdmin');


//-----------------------Pre order list----------------------------------------//
Route::get('admin/preorder/list/view/edit/form/{id}',[HomeController::class,'PreorderListUpdateForm'])->name('Preoeder.List.Update.form')->middleware('CheckAdmin');
Route::put('admin/preorder/list/view/edit/update',[HomeController::class,'PreorderListUpdate'])->name('Preoeder.List.Update')->middleware('CheckAdmin');
Route::get('admin/preorder/list/view/delete/{id}',[HomeController::class,'PreoerderListDeleteStatus'])->name('Preorder.List.Delete')->middleware('CheckAdmin');
Route::get('admin/preorder/list/view/detail/{id}',[HomeController::class,'PreoerderListViewDetail'])->name('Preorder.List.View.Detail')->middleware('CheckAdmin');
Route::get('admin/preorder/comfirm/sold-finshed/{id}',[HomeController::class,'PreorderListSoldFinish'])->name('Preorder.List.Sold.Finished')->middleware('CheckAdmin');


// ----------------User API--------------------//


//preorder API Data
Route::get('api/preorders/product/view/{id}',[ProductAPIcontroller::class,'PreorderOneData']);

Auth::routes();
