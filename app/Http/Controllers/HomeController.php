<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Warehouse;
use App\models\Preorder;
use App\models\Preorder_images;
use App\models\PreorderList;
use App\models\Sold_history;
use App\models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Warehouse::where('product_status','=','selling')->paginate(10);
        return view('home',compact('products'))
        ->with('i',(request()->input('page',1)-1)*10);
    }

    public function Rice_type(){
        $products = Warehouse::where('product_status','=','selling')->where('product_type_id','=','2')->paginate(10);
        return view('Type.rice',compact('products'))
        ->with('i',(request()->input('page',1)-1)*10);
    }




// -----------------------Pre order---------------------------//
    public function ShowPreorderPage(){
        return view('Admin.Preorder.PreOrDer');
    }
    public function ShowPreorderManage(){
        $pre_data = Preorder::where('pre_status','!=','delete')->paginate();
        return view('Admin.Preorder.preorder_manage',compact('pre_data'))
        ->with('i',(request()->input('page',1)-1)*12);
    }
    public function ShowPreorderView(){
       $products =  preorder::where('pre_status','=','on')->paginate(12);
        return view('preorder_page',compact('products')) ->with('i',(request()->input('page',1)-1)*12);
    }

    public function ShowPreorderPoructView(){

        return view('preorder_view_product');
    }

    public function PreorderListView(){

        $pre_list = PreorderList::where('status','=','wait_pay')->paginate(10);
        return view('Admin.Preorder.preorder_list_view',compact('pre_list'))
        ->with('i',(request()->input('page',1)-1)*10);
    }

    public function PreorderListUpdateForm($id){
        $pre_list = PreorderList::find($id)->first();
        return view('Admin.Preorder.preorder_list_edit',compact('pre_list'));
    }
    public function PreoerderListViewDetail($id){
        $pre_one_data = PreorderList::where('id','=',$id)->first();
        return view('Admin.Preorder.preorder_view_detail',compact('pre_one_data'));
    }
    public function PreoerderListDeleteStatus($id){
        PreorderList::find($id)->update([
            'status' => 'delete'
        ]);
        return redirect()->back();
    }


    public function PreorderListUpdate(Request $request){
        $pre_list_id = $request -> pre_list_id;

        $request -> validate(
            [
                'pre_list_price' => 'required|numeric|min:1',
                'pre_list_amount' => 'required|numeric|min:1',

            ]
            );
            PreorderList::find($pre_list_id)->update([
                'pre_list_price' => $request->pre_list_price,
                'pre_list_amount' => $request->pre_list_amount,

            ]);
            return redirect()->back();


    }

    public function InsertPreorder(Request $request){
        $request -> validate(
            [
                'pre_name' => 'required|string|max:100',
                'pre_price' => 'required|numeric|min:1',
                'pre_amount' => 'required|numeric|min:1',
                'pre_description' => 'required|string|max:256',
            ]
            );
            if($request->hasFile('pre_image')){
                $destination_path = 'public/images/Preorders';
                $image = $request->file('pre_image');
                $image_name = $image->getClientOriginalName();
                $path = $request ->file('pre_image')->storeAs($destination_path, $image_name);
            }
            $pre = new Preorder;
            $pre -> pre_name = $request-> pre_name;
            $pre -> pre_price = $request-> pre_price;
            $pre -> pre_amount = $request-> pre_amount;
            $pre -> pre_image = $image_name;
            $pre -> pre_description = $request-> pre_description;
            $pre -> pre_status = 'off';
            $pre -> save();
            return redirect()->back();
    }

    // ----------------Preorder Crud---------------------------//

    public function PreorderUpdateOn($id){
        $pre = Preorder::find($id);
        $pre -> pre_status = 'on';
        $pre->update();
        return redirect()->back();
    }
    public function PreorderUpdateOff($id){
        $pre = Preorder::find($id);
        $pre -> pre_status = 'off';
        $pre->update();
        return redirect()->back();
    }
    public function PreorderUpdateDelete($id){
        $pre = Preorder::find($id);
        $pre -> pre_status = 'delete';
        $pre->update();
        return redirect()->back();
    }
    public function PreorderUpdateForm($id){
        $pre_data = Preorder::find($id);
        $preorder_images = Preorder_images::where('pre_product_id','=',$id)->where('status','=','on')->get();
        return view('Admin.Preorder.preorder_edit_form',compact('pre_data','preorder_images'));
    }
    public function PreorderEditeUpdate(Request $request){
        $pre_id = $request -> pre_id;

        if($request->hasFile('pre_image')){
            $destination_path = 'public/images/Preorders';
            $image = $request->file('pre_image');
            $image_name = $image->getClientOriginalName();
            $path = $request ->file('pre_image')->storeAs($destination_path, $image_name);
        }else{
            $image_name = $request->old_image_name;
        }


        Preorder::find($pre_id)->update([
            'pre_name' => $request->pre_name,
            'pre_price' => $request->pre_price,
            'pre_amount' => $request->pre_amount,
            'pre_description' => $request->pre_description,
            'pre_image' => $image_name,
            ]);
        return redirect()->back();
    }

    // --------ยืนยันคำสั่งซื้อ และ ตัดสต๊อกสินค้าพรีออเดอร์---------- //
    public function PreorderListSoldFinish($id){




        $pre_list_data = PreorderList::where('id','=',$id)->first();
        $bye_amount = $pre_list_data -> pre_list_amount;

        $pre_product_id = $pre_list_data -> pre_product_id;

        $old_pre_data = Preorder::where('id','=',$pre_product_id)->first();
        $old_pre_amount = $old_pre_data -> pre_amount;

        $pre_amount_remaining = $old_pre_amount - $bye_amount;


        Preorder::where('id','=',$pre_list_data->pre_product_id)->update([
            'pre_amount' => $pre_amount_remaining
        ]);


        PreorderList::where('id','=',$id)->update([
            'status' => 'sold_finished'
        ]);

        $sold = new Sold_history;
        $sold -> product_name = $pre_list_data -> pre_list_name;
        $sold -> product_price = $pre_list_data -> pre_list_price ;
        $sold -> product_mount = $pre_list_data -> pre_list_amount;
        $sold -> product_image = $pre_list_data -> pre_list_image;
        $sold -> user_id = $pre_list_data -> user_id;
        $sold -> status = 'sold_finished';
        $sold -> save();

        return redirect()->back();

    }




}
