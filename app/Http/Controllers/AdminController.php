<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\market;
use App\Models\User;
use App\Models\Products;
use App\Models\Warehouse;
use App\Models\cart;
use App\Models\Sold_history;
use App\Models\Products_images;
use App\Models\Preorder_images;

use Illuminate\Support\Facades\Auth;
use Phattarachai\LineNotify\Facade\Line;

use Carbon\Carbon;


class AdminController extends Controller
{
    public function ApproveMarketView(){
        $market_register = market::where('market_status','=','wait')->paginate();
        return view('Admin.approve',compact('market_register'))
        ->with('i',(request()->input('page',1)-1)*10);
    }


    public function ApproveProductsView(){
        $products = Warehouse::where('product_status','=','wait_approve')->paginate(10);
        return view('Admin.products_approve',compact('products'))
        ->with('i',(request()->input('page',1)-1)*10);
    }

    public function ProductApproved(Request $request,$id){
        $products_approved = Warehouse::find($id)->update([
            'product_status' => 'selling',
        ]
        );

        return redirect()->back();
    }

    public function ProductNoApproved(Request $request,$id){
        $products_approved = Warehouse::find($id)->update([
            'product_status' => 'on_approve',
        ]);
        return redirect()->back();
    }




    public function market_approve(Request $request,$id){
        $market = market::find($id)->update([
            'market_status'=>$request->approved_bt,
        ]);
        return redirect()->back();


    }

    public function market_no_approve(Request $request,$id){
        $market = market::find($id)->update([
            'market_status'=>$request->no_approved_bt,
        ]);
        return redirect()->back();
    }

    public function show_home(){
        $sold_today = Sold_history::whereDate('created_at',Carbon::today())->get();
        $total_sold_today = $sold_today -> sum('product_price');

        $sold_month = Sold_history::whereMonth('created_at',Carbon::now()->month);
        $total_sold_month = $sold_month -> sum('product_price');

        $sold_year = Sold_history::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ]);
        $total_sold_year = $sold_year -> sum('product_price');

        $sold_his = Sold_history::all();
        $total_sold_his = $sold_his -> sum('product_price');
        $total_money_in_site = ($total_sold_his * 1)/100;

        $user = User::where('id',Auth::id())->first();
        return view('Admin.admin_home',compact('user','total_sold_today','total_sold_month','total_sold_year','total_money_in_site'));
    }



    public function ShowWearhouse(){
        $products = Warehouse::where('product_status','=','wait')->orWhere('product_status','=','selling')->paginate(10);
        return view('Admin.warehouse',compact('products'))
        ->with('i',(request()->input('page',1)-1)*10);
    }



    public function ShoworderList(Request $request){
        $user_id = $request -> id;

        $order_list = cart::where('user_id','=',$user_id)->where('status','=','confirm_order')->paginate(10);
        return view('Admin.order_list',compact('order_list'))
        ->with('i',(request()->input('page',1)-1)*10);
    }
    public function ShowOrderListById(Request $request){
        $user_id = $request -> id;

        $order_list = cart::where('user_id','=',$user_id)->where('status','=','confirm_order')->get();

        return view('Admin.order_list_view_by_id',compact('order_list'));
    }


    public function FinishOrder($id){

       $cart_data =  cart::where('id','=',$id)->first();

       $product_id = $cart_data -> product_id;

       $product_data =  Warehouse::where('id','=',$product_id)->first();
       $old_product_amount = $product_data -> product_amount;
       $new_product_amount = $old_product_amount - $cart_data -> product_amount;


       $sold = new Sold_history;

       $sold -> product_name = $cart_data -> product_front_descript;
       $sold -> product_price = $cart_data -> total_price;
       $sold -> product_mount = $cart_data -> product_amount;
       $sold -> product_id = $cart_data -> product_id;
       $sold -> user_id = $cart_data -> user_id;
       $sold -> market_id = $cart_data -> market_id;
       $sold -> status = 'sold_finshed';
       $sold -> product_image = $cart_data -> product_img;
       $sold -> save();


       cart::where('id','=',$id)->update([
        'status' => 'sold_finished'
       ]);
        if($new_product_amount <= 12){
            Line::send("แจ้งเตือน สินค้าไกล้หมด สินค้ารหัส: ".$product_data->id."ชื่อสินค้า:".$product_data->product_name."ชื่อร้านค้า:".$product_data->market->market_name."คงเหลือ".$new_product_amount );
        }
       //------------------อัพเดท สต๊อกสินค้า ------------//
       Warehouse::where('id','=',$product_id)->update([
        'product_amount' => $new_product_amount
       ]);

       return redirect()->back();

    }

    public function AdminViewProductDetail($id){

        $product_data = Warehouse::where('id','=',$id)->first();

        $product_main_image = Products_images::where('product_id','=',$id)
        ->where('status','=','on')->whereNotNull('main_image')->select('main_image')->first();

        $prouct_images = Products_images::where('product_id','=',$id)->where('status','=','on')
        ->whereNotNull('image_name')->select('image_name')->get();

        return view('Admin.view_product_detail',compact('product_data','product_main_image','prouct_images'));
    }

    public function ViewMarketWaitDetail($id){
        $market_data = market::find($id)->first();
        return view('Admin.view_market_wait',compact('market_data'));
    }

    public function AdminViewUser(){
        $user_data = User::where('status','=','1')->paginate(10);
        return view('Admin.Users.view_user_in_site',compact('user_data'))
        ->with('i',(request()->input('page',1)-1)*10);
    }
    public function AdminEditUser($id){
        $user_data = User::find($id)->first();
        return view('Admin.Users.admin_edit_user',compact('user_data'));
    }
    public function AdminUpdateUserData(Request $request,$id){
        $user_id = $id;
        $user_data = user::where('id','=',$user_id)->first();



        if($request->hasFile('user_img')){
            $destination_path = 'public/images/profiles';
            $image = $request->file('user_img');
            $image_name = $image->getClientOriginalName();
            $path = $request ->file('user_img')->storeAs($destination_path, $image_name);
        }
        if($request -> user_img == null){
            $image_name = $user_data -> image;
        }
        user::where('id','=',$user_id)->update([
            'first_name' => $request -> first_name,
            'last_name' => $request -> last_name,
            'identity_card_number' => $request -> identity_card_number,
            'tel' => $request -> tel,
            'line_id' => $request -> line_id,
            'address' => $request -> address,
            'email' => $request -> email,
            'image' => $image_name,
        ]);
            return redirect()->back()->with('message_success','แก้ไขข้อมูลสำเร็จ');
    }
    public function AdminDeletedUser($id){
        User::where('id','=',$id)->update([
            'status' => '0',
        ]);
        return redirect()->back()->with('message_success','ลบสมาชิกสำเร็จ');
    }

    public function AdminViewUserDetail($id){
        $user_data = User::where('id','=',$id)->first();
        return view('Admin.Users.admin_view_user_detail',compact('user_data'));
    }

    public function AdminViewMarketList(){
        $market_data = market::where('market_status','=','approved')->paginate(10);


        return view('Admin.Markets.admin_view_market_list',compact('market_data'))
        ->with('i',(request()->input('page',1)-1)*10);
    }


    public function AdminMarketEditForm($id){
        $market_data = market::where('id','=',$id)->first();
        return view('Admin.Markets.admin_edit_market_form',compact('market_data'));
    }

    public function AdminMarketUpdated(Request $request,$id){
        market::where('id','=',$id)->update([
            'market_name' => $request -> market_name,
            'latitude' => $request -> latitude,
            'longtitude' => $request -> longtitude,
            'user_group_key' => $request -> longtitude,
        ]);

        $market_data = market::where('id','=',$id)->first();

        $user_id = $market_data -> user_id;

        User::where('id','=',$user_id)->update([
            'first_name' => $request -> first_name,
            'last_name' => $request -> last_name,
            'identity_card_number' => $request -> identity_card_number,
            'tel' => $request -> tel,
            'line_id' => $request -> line_id,
            'address' => $request -> address,
            'email' => $request -> email,

        ]);

        return redirect()->back()->with('message_success','แก้ไขข้อมูลสำเร็จ');
    }

    public function AdminViewMarketDetail($id){
        $market_data = market::where('id','=',$id)->first();

        return view('Admin.Markets.admin_view_market_detail',compact('market_data'));
    }

    public function AdminDeleteMarket($id){
        $market_data =  market::where('id','=',$id)->first();
        market::where('id','=',$id)->update([
            'market_status' => 'delete',
        ]);
        $market_id = $market_data -> id;
        Products::where('market_id','=',$market_id)->update([
            'product_status' => 'delete',
        ]);
        return redirect()->back();
    }


    ////////////// ประวัติการขาย Admin ////////////
    public function ShowHistory(){

        $sold_his = Sold_history::where('status','=','sold_finshed')->paginate(10);



        return view('Admin.sale_history',compact('sold_his'))
        ->with('i',(request()->input('page',1)-1)*10);
    }

    public function addImagesPreorderData(Request $request,$id){

        // $request -> validate([
        //     'images' => 'max:4|mimes:jpeg,png,jpg,gif,svg',


        // ]);
        // dd($request->images);


        if($request->hasFile('images')){
            foreach ($request ->images as $file){
                $destination_path = 'public/images/preorders';
                $file_name = time()."_".$file->getClientOriginalName();
                $file->storeAs($destination_path, $file_name);

                $preorder_imges = new Preorder_images;
                $preorder_imges -> image_name = $file_name;
                $preorder_imges -> pre_product_id = $id;
                $preorder_imges -> status = 'on';
                $preorder_imges -> save();
            }
        }


        return redirect()->back()->with('message_success','เพิ่มรูปภาพสำเร็จ!');

    }

    public function ShowGoogleMapList(){
        $market_google_map = market::where('market_status','=','approved')->paginate();


        return view('Admin.Markets.view_google_map_list',compact('market_google_map'))
        ->with('i',(request()->input('page',1)-1)*10);
    }




}
