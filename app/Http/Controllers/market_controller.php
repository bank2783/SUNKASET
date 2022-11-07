<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\market;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class market_controller extends Controller
{
    public function show_market_register(){
        return view('market.market_register');
    }

    public function market_register(Request $request){
    $user_id = Auth::user()->id;
    $request -> validate(
        [
            'market_name' => 'required|string|max:100',
            'market_address' => 'required|string|max:255',

        ]
        );

        $market = new market;
        $market -> market_name = $request->market_name;
        $market -> market_address = $request->market_address;
        $market -> market_status = 'wait';
        $market -> user_id = Auth::user()->id;
        $market->save();
        return redirect()->back();
    }

    public function user_market(){

        $market = market::where('user_id',Auth::id())->first();
        $market_id = $market->id;

        $products = Products::where('market_id','=',$market_id)->get();


        return view('market.my_market',compact('market','products'));
    }





}
