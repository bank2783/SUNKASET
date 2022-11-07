<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Products;
use App\models\Warehouse;
use Illuminate\Support\Facades\Auth;



class ProductsController extends Controller
{
    public function ShowProductRequest(){
        $product_req = Products::where('porduct_status', '=', 'wait' )->first();
        return view('Confirme.product_req',compact('product_req'));
    }




    public function form(){

        return view('products.addproduct');
    }

    public function store(Request $request,$id){

         $request -> validate(
            [
                'product_name' => 'required|string|max:80',
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

            $products = new Products;
            $products -> product_name = $request->product_name;
            $products -> product_detail = $request->product_detail;
            $products -> product_price = $request->product_price;
            $products -> product_amount = $request->product_amount;
            $products -> product_img = $image_name;
            $products -> product_status = 'wait';
            $products -> market_id = $id;
            $products -> product_type_id = $request->product_type_id;

            $products->save();
            return redirect()->back();
        }

        public function ProductView(){

            return view('products.product_view');
        }


        public function ShowCartView(){
            $user_id = Auth::user()->id;

            return view('products.cart',compact('user_id'));
        }

        public function CartInsert(Request $request){
            dd($request->product_amount);
        }


}


