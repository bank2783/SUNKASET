<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\market;
use App\Models\Products;
use App\Models\User;
use App\Models\Warehouse;
use App\Models\Sold_history;
use App\Models\Products_images;
use App\Models\Preorder_images;
use Illuminate\Support\Facades\Auth;
use Phattarachai\LineNotify\Facade\Line;
use Illuminate\Support\Facades\Crypt;

class market_controller extends Controller
{
    public function show_market_register(){
        $market_data = market::where('user_id','=',Auth::user()->id)->first();
        $user_data = User::where('id','=',Auth::user()->id)->first();
        return view('market.market_register',compact('market_data','user_data'));
    }

    public function market_register(Request $request){
    $user_id = Auth::user()->id;
    $request -> validate(
        [
            'market_name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'tel' => 'required|numeric|min:1',
            'identity_card_number' => 'required|numeric|min:1',
            'latitude' => 'required|string|max:255',
            'longtitude' => 'required|string|max:255',


        ]
        );
        if($request->hasFile('market_image')){
            $destination_path = 'public/images/marketprofile';
            $image = $request->file('market_image');
            $image_name = $image->getClientOriginalName();
            $path = $request ->file('market_image')->storeAs($destination_path, $image_name);
        }

        $market = new market;
        $market -> market_name = $request->market_name;
        $market -> market_address = $request->address;
        $market -> latitude = $request->latitude;
        $market -> longtitude = $request->longtitude;
        $market -> user_group_key = $request->user_group_key;
        $market -> market_image = $image_name;
        $market -> market_status = 'wait';
        $market -> user_id = Auth::user()->id;
        $market->save();

        $result = user::where('id','=',Auth::user()->id)->update([
            'first_name' => $request -> first_name,
            'last_name' => $request -> last_name,
            'email' => $request -> email,
            'tel' => $request -> tel,
            'identity_card_number' => $request -> identity_card_number,
            'address' => $request -> address,
        ]);
        if($result and $market){
            Line::send('ผู้ใช้รหัส: '.Auth::user()->id.'ชื่อ'.$request -> first_name. $request ->last_name.'ได้ทำการลงทะเบียนร้านค้า');
        }
        return redirect()->back();
    }

    public function user_market(){

        $market = market::where('user_id',Auth::id())->first();


        if(empty($market))
        $market_id = 0;
        else{
        $market_id = $market->id;
        }
        $products = Warehouse::where('market_id','=',$market_id)->where('product_status','=','wait_approve')->get();

        return view('market.my_market',compact('market','products'));
    }

    public function ShowProductSelling(){
       $user_id =  Auth::user()->id;
       $market = market::where('user_id','=',$user_id)->first();
       $product_data = Warehouse::where('market_id','=',$market -> id)->where('product_status','=','selling')->get();


       return view('market.view_order_selling',compact('product_data','market'));

    }

    public function MarketUpdateProductForm($id){
        $user_id =  Auth::user()->id;
        $market = market::where('user_id','=',$user_id)->first();
        $product_data = Warehouse::find($id)->first();

       return view('market.update_product_form',compact('market','product_data'));
    }
    public function MarketUpdateProduct(Request $request,$id){
        $request -> validate([
            'product_amount' => 'required|numeric|min:1',
            'product_detail' => 'required',
        ]);
        Warehouse::find($id)->update([
            'product_amount' => $request -> product_amount,
            'product_detail' => $request -> product_detail
        ]);
        return redirect()->back()->with('message_success','แก้ไขข้อมูลสำเร็จ');
    }

    public function MarketAddProductForm(){
        $user_id = Auth::user()->id;
        $market = market::where('user_id','=',$user_id)->first();
        return view('products.addproduct',compact('market'));
    }

    public function ShowMarketAgreement(){

        return view('market.agreement_market');
    }

    public function ShowMarketSoldHistory(){

        $market_data = market::where('user_id','=',Auth::user()->id)->first();
        $market_id = $market_data -> id;

        $market_sold_his = Sold_history::where('market_id','=',$market_id)->paginate(10);



        return view('market.sold_history',compact('market_sold_his','market_data'))
        ->with('i',(request()->input('page',1)-1)*10);
    }

    public function SwithOnProductInmarket($id){

        Warehouse::where('id','=',$id)->update([
            'product_status' => 'selling'
        ]);
        return redirect()->back();
    }
    public function SwithOffProductInmarket($id){

        Warehouse::where('id','=',$id)->update([
            'product_status' => 'stop_selling'
        ]);
        return redirect()->back();
    }


    public function MarketeditDataForm(){
        $market = market::where('user_id','=',Auth::user()->id)->first();
        return view('market.market_edit_form',compact('market'));
    }


    public function MarketeditUpdate(Request $request,$id){

        $market = market::where('id','=',$id)->first();

        if($request->hasFile('market_image')){
            $destination_path = 'public/images/marketprofile';
            $image = $request->file('market_image');
            $image_name = $image->getClientOriginalName();
            $path = $request ->file('market_image')->storeAs($destination_path, $image_name);
        }else{
            $image_name = $market -> market_image;
        }

        market::where('id','=',$id)->update([
            'market_name' => $request -> market_name,
            'market_address' => $request -> address,
            'google_map' => $request -> google_map,
            'market_image' => $image_name,
        ]);
        return redirect()->back()->with('message_success','แก้ไขข้อมูลสำเร็จ!');
    }

    public function AddProductImagesForm($id){



       $market = market::where('user_id','=',Auth::user()->id)->first();

        $product = Warehouse::where('id','=',$id)->first();

        $product_main_image = Products_images::where('product_id','=',$id)
        ->where('status','=','on')->whereNotNull('main_image')->select('main_image','id')->first();

        $product_images = Products_images::where('product_id','=',$id)
        ->where('status','=','on')->whereNotNull('image_name')->select('image_name','id')->get();

        return view('market.add_product_img',compact('market','product','product_images','product_main_image'));
    }

    public function AddProductImagesFormInsert(Request $request){


        // $request -> validate([
        //     'images' => 'max:4|mimes:jpeg,png,jpg,gif,svg',


        // ]);
            foreach ($request ->images as $file){
                $destination_path = 'public/images/products';
                $file_name = time()."_".$file->getClientOriginalName();
                $file->storeAs($destination_path, $file_name);

                $product_imges = new Products_images;
                $product_imges -> image_name = $file_name;
                $product_imges -> status = 'on';
                $product_imges -> product_id = $request -> product_id;
                $product_imges -> save();
            }
            return redirect()->back()->with('message_success','แก้ไขข้อมูลสำเร็จ!');

    }

    public function AddProductMainImage(Request $request){

        if($request->hasFile('main_image')){
            $destination_path = 'public/images/products';
            $image = $request->file('main_image');
            $image_name = $image->getClientOriginalName();
            $path = $request ->file('main_image')->storeAs($destination_path, $image_name);
        }

        Warehouse::where('id','=',$request -> product_id)->update([
            'product_img' => $image_name
        ]);


        return redirect()->back()->with('message_success','เพิ่มรูปภาพหลักสำเร็จ!');


    }

    public function DeleteSecondImages($id){
        $id_decryp = Crypt::decrypt($id);

        Products_images::where('id','=',$id_decryp)->update([
            'status' => 'off'
        ]);
        dd($id_decryp);
    }








}
