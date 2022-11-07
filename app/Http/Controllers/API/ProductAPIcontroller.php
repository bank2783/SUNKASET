<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
class ProductAPIcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product_data = Warehouse::where('id','=',$id)->first();
        return response()->json($product_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = new cart;
        $cart->user_id = $request -> get('user_id');
        $cart->product_id = $request -> get('product_id');
        $cart->product_front_descript = $request -> get('product_front_descrip');
        $cart->total_price = $request -> get('total_price');
        $cart->product_amount = $request -> get('product_amount');
        $cart->product_img = $request -> get('product_img');
        $cart->save();
        return response()->json($cart);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_data = Warehouse::find($id)->first();
        return response()->json($product_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ShowCartData(){
        $user_id = Auth::user()->id;
        $cart_data = cart::where('user_id','=',$user_id)->get();
        return response()->json($cart_data);

    }

    public function UpdateUserProfile(Request $request,$id){

        $user = User::find($id);
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->identity_card_number = $request->get('identity_card_number');
        $user->tel = $request->get('tel');
        $user->line_id = $request->get('address');
        $user->image = $request->get('image');
        $user->update();

    }



}
