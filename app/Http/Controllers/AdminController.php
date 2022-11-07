<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\market;
use App\Models\User;
use App\Models\Products;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function ApproveMarketView(){
        $market_register = market::where('market_status','=','wait')->get();
        return view('Admin.approve',compact('market_register'));
    }


    public function ApproveProductsView(){
        $products = Products::where('product_status','=','wait')->get();
        return view('Admin.products_approve',compact('products'));
    }

    public function ProductApproved(Request $request,$id){
        $products_approved = Products::find($id)->update([
            'product_status' => $request->approved_bt,
        ]
        );
        $warehouse = new Warehouse;
        $warehouse -> product_name = $request -> product_name;
        $warehouse -> product_amount = $request -> product_amount;
        $warehouse -> product_price = $request -> product_price;
        $warehouse -> product_detail = $request -> product_detail;
        $warehouse -> market_id = $request -> market_id;
        $warehouse -> product_img = $request -> product_img;
        $warehouse -> product_type_id = $request -> product_type_id;
        $warehouse -> product_status = 'wait';
        $warehouse -> save();
        return redirect()->back();
    }

    public function ProductNoApproved(Request $request,$id){
        $products_approved = Products::find($id)->update([
            'product_status' => $request->no_approved_bt,
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
        $user = User::where('id',Auth::id())->first();
        return view('Admin.admin_home',compact('user'));
    }

    public function ShowWearhouse(){
        $products = Warehouse::where('product_status','=','wait')->orWhere('product_status','=','selling')->get();
        return view('Admin.warehouse',compact('products'));
    }


}
