<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Products;
use App\models\Warehouse;
use App\models\cart;
use App\models\market;
use App\models\Feedback;
use App\models\TransportData;
use Illuminate\Support\Facades\Crypt;
// use App\models\Products_images;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Phattarachai\LineNotify\Facade\Line;



class ProductsController extends Controller
{
    public function ShowProductRequest(){
        $product_req = Products::where('product_status', '=', 'wait' )->first();
        return view('Confirme.product_req',compact('product_req'));
    }

    public function store(Request $request){


         $request -> validate(
            [
                'product_name' => 'required|string',
                'product_price' => 'required|numeric|min:1',
                'product_amount' => 'required|numeric|min:1',
                'product_detail' => 'required|string|max:255',


            ]
            );

             $input = $request->all();
            if($request->hasFile('product_img')){

                $destination_path = 'public/images/products';
                $image = $request->file('product_img');
                $image_name = $image->getClientOriginalName();
                $path = $request ->file('product_img')->storeAs($destination_path, $image_name);
            }

            $products = new Warehouse;
            $products -> product_name = $request->product_name;
            $products -> product_detail = $request->product_detail;
            $products -> product_price = $request->product_price;
            $products -> product_amount = $request->product_amount;
            $products -> product_front_descrip =  $request->product_front_descrip;
            $products -> product_status = 'wait_approve';
            $products -> market_id = $request -> market_id;
            $products -> product_type_id = $request->product_type_id;
            $products->save();
            return redirect()->back()->with('message_success','ลงทะเบียนสินค้าสำเร็จ');
        }

        public function ProductView($id){
            // $product_data = Warehouse::where('id','=',$id)->where('product_status','=','selling')->first();
            // dd($product_data);
            return view('products.product_view');
        }


        public function ShowCartView(){
            $user_id = Auth::user()->id;

            $user_cart_data = cart::where('user_id','=',$user_id)->where('status','=','order_request')->get();

            $sum_total_price = $user_cart_data -> sum('total_price');
            $transport_data = TransportData::where('user_id','=',$user_id)->first();
            // dd($user_cart_data);

            return view('products.cart',compact('user_id','user_cart_data','sum_total_price','transport_data'));
        }

        public function CartInsert(Request $request){
            dd($request->product_amount);
        }

        public function CartUpdateProductsConfirm(){



            $user_id = Auth::user()->id;
            $user_name = Auth::user()->first_name;


            cart::where('user_id','=',$user_id)->where('status','=','order_request')->update([
                'status' => 'confirm_order'
            ]);
            Line::send("ผู้ใช้รหัส:".$user_id."ชื่อ:".$user_name."ได้ทำการสั่งซื้อสินค้าในระบบแล้ว!");


            return redirect()->back()->with('message_success','ยืนยันคำสั่งซื้อสำเร็จ!');
        }

        public function InsertFeedBack(Request $request){

            $request -> validate([
                'feedback_text' => 'required|max:255',
            ]);

            $feed = new Feedback;
            $feed -> feed_back_text = $request -> feedback_text;
            $feed -> user_id = Auth::user()->id;
            $feed -> product_id = $request -> product_id;
            $feed -> user_name = Auth::user()->first_name ." ". Auth::user()->last_name;
            $feed -> user_image = Auth::user()->image;
            $feed -> status = 'on';
            $feed -> save();
            return redirect()->back()->with('message_success','รีวิวสำเร็จ');
        }

        public function CartCancleProduct(Request $request,$id){
            $cart_id_decrypt = Crypt::decrypt($id);

            cart::where('id','=',$cart_id_decrypt)->update([
                'status' => 'cancle'
            ]);
        return redirect()->back();
        }

        public function PreorderIndex($id){

        return view('preorder_view_product');
        }

 }
