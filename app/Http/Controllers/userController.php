<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\PreorderList;
use App\Models\TransportData;
use App\Models\Sold_history;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use RealRashid\SweetAlert\Facades\Alert;


class userController extends Controller
{
    public function form(){
        $user_id = Auth::user()->id;

        return view('Users.editprofile',compact('user_id'));

    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        dd($request->first_name,$user_id);

    }

    public function UserUpdateProfile(Request $request){



        $user_id = Auth::user()->id;
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
        return redirect()->back()->with('message_success','บันทึกข้อมูลสำเร็จ!');
    }

    public function update(Request $request,$id){
        $request -> validate(
            [
                'first_name'=>'string|max:255',
                'last_name'=>'string|max:255',
                'identity_card_number'=>'string|max:13',
                'tel'=>'string|max:10',
                'line_id' => 'string|max:255',
                'address' => 'string|max:255',

            ]


            );

                $user_profile = $request->file('profile_img');
                $image_name = $user_profile->getClientOriginalName();
                $upload_location = 'storage/images/profiles/';
                $user_profile->move($upload_location,$image_name);

                $path_query = $upload_location.$image_name;


            User::find($id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'identity_card_number' =>$request->identity_card_number,
                'tel' => $request->tel,
                'image' => $path_query,
                'line_id' => $request->line_id,
                'address' => $request->address,
            ]);
            $user_id = Auth::user()->id;
            $user_info = User::all()->where('id',$user_id);
            return view('Users.editprofile',compact('user_id','user_info'))->with('success','ลงทะเบียนเรียบร้อย');
        }

        public function UserProfile(){
            $user_id = Auth::user()->id;
            $user_data = User::where('id',$user_id)->first();
            return view('Users.profile',compact('user_data'));

        }

        public function editform(){
            $user_id = Auth::user()->id;
            $user_data = User::where('id',$user_id)->first();
            return view('Users.editprofile',compact('user_data'));
        }

        public function ShowPreorderList(){
            $user_id = Auth::user()->id;
            $user_data = User::where('id','=',$user_id)->first();
            $pre_list_data = PreorderList::where('user_id','=',$user_id)->where('status','=','wait_pay')->paginate(5);
            $transport_data = TransportData::where('user_id','=',$user_id)->first();

            return view('Users.preorder_list',compact('pre_list_data','user_data','transport_data'))
            ->with('i',(request()->input('page',1)-1)*5);
        }
        public function AddAddressForm(){
            $user_id = Auth::user()->id;
            $user_data = User::find($user_id)->first();

            return view('Admin.Preorder.add_address_form',compact('user_data'));
        }
        public function ShowSelectAddress(){
            $user_id = Auth::user()->id;
            $user_transport_data = TransportData::where('user_id','=',$user_id)->get();
            $user_data = User::find($user_id)->first();
            return view('Admin.Preorder.select_transport_address',compact('user_transport_data','user_data'));
        }
        public function ShowEditAdressForm(){
            $user_id = Auth::user()->id;
            $user_transport_data = TransportData::where('user_id','=',$user_id)->first();
            $user_data = User::find($user_id)->first();
            return view('Admin.Preorder.edit_transport_address',compact('user_transport_data','user_data'));
        }
        public function ShowPayMentMethod($id){
            $user_id = Auth::user()->id;
            $user_data = User::where('id','=',$user_id)->first();
            $preorder_data = PreorderList::where('user_id','=',$user_id)->where('id','=',$id)->where('status','=','wait_pay')->first();
            return view('Admin.payment_method',compact('user_data','preorder_data'));
        }




        public function InsertAddress(Request $request){
            $user_id = Auth::user()->id;
            $request ->validate([
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'phone_number' => 'required|numeric|min:10',
                'postal_number' => 'required|numeric|min:5',
                'address' => 'required|string|max:256',
            ],
            [
                'first_name.required' => "กรุณากรอกข้อมูลให้ครบถ้วน",
                'last_name.required' => "กรุณากรอกข้อมูลให้ครบถ้วน",
                'phone_number.required' => "กรุณากรอกข้อมูลให้ครบถ้วน",
                'postal_number.required' => "กรุณากรอกข้อมูลให้ครบถ้วน",
                'address.required' => "กรุณากรอกข้อมูลให้ครบถ้วน",

                'first_name.string' => "กรุณากรอกข้อมูลให้ถูกต้อง",
                'last_name.string' => "กรุณากรอกข้อมูลให้ถูกต้อง",
                'address.string' => "กรุณากรอกข้อมูลให้ถูกต้อง",
                'phone_number.numeric' => "กรุณากรอกข้อมูลให้ถูกต้อง",
                'postal_number.numeric' => "กรุณากรอกข้อมูลให้ถูกต้อง",

                'phone_number.min' => "กรุณากรอกข้อมูลให้ถูกต้อง",
                'postal_number.min' => "กรุณากรอกข้อมูลให้ถูกต้อง",




            ]);
            $transport = new TransportData;
            $transport -> first_name = $request->first_name;
            $transport -> last_name = $request->last_name;
            $transport -> phone_number = $request->phone_number;
            $transport -> postal_code = $request->postal_number;
            $transport -> address = $request->address;
            $transport -> user_id = Auth::user()->id;
            $transport -> save();
            return redirect()->back()->with('message_success','กรอกข้อมูลสำเร็จ!');
        }


        public function UpdateTransportAddress(Request $request){

                $user_id = Auth::user()->id;
                $request ->validate([
                    'first_name' => 'required|string|max:100',
                    'last_name' => 'required|string|max:100',
                    'phone_number' => 'required|numeric|min:10',
                    'postal_number' => 'required|numeric|min:5',
                    'address' => 'required|string|max:256',
                ],
                [
                    'first_name.required' => "กรุณากรอกข้อมูลให้ครบถ้วน",
                    'last_name.required' => "กรุณากรอกข้อมูลให้ครบถ้วน",
                    'phone_number.required' => "กรุณากรอกข้อมูลให้ครบถ้วน",
                    'postal_number.required' => "กรุณากรอกข้อมูลให้ครบถ้วน",
                    'address.required' => "กรุณากรอกข้อมูลให้ครบถ้วน",

                    'first_name.string' => "กรุณากรอกข้อมูลให้ถูกต้อง",
                    'last_name.string' => "กรุณากรอกข้อมูลให้ถูกต้อง",
                    'address.string' => "กรุณากรอกข้อมูลให้ถูกต้อง",
                    'phone_number.numeric' => "กรุณากรอกข้อมูลให้ถูกต้อง",
                    'postal_number.numeric' => "กรุณากรอกข้อมูลให้ถูกต้อง",

                    'phone_number.min' => "กรุณากรอกข้อมูลให้ถูกต้อง",
                    'postal_number.min' => "กรุณากรอกข้อมูลให้ถูกต้อง",
                ]);

                TransportData::Where('user_id','=',$user_id)->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'phone_number' => $request->phone_number,
                    'postal_code' => $request -> postal_number,
                    'address' => $request -> address
                ]);
                return redirect()->back()->with('message_success','แก้ไขข้อมูลสำเร็จ!');
            }

    public function ShowUserBoughtHistories(){

        $sold_histories = Sold_history::where('user_id','=', Auth::user()->id)->paginate(5);

        $user_data = User::where('id','=',Auth::user()->id)->first();
        return view('Users.bought_history',compact('user_data','sold_histories'))
        ->with('i',(request()->input('page',1)-1)*5);
    }
     public function UserDeletePreorderList($id){
        PreorderList::where('id','=',$id)->update([
            'status' => 'delete'
        ]);
        return redirect()->back();
     }
     public function viewOrdeMustGet(){
        $user_id = Auth::user()->id;
        $user_data = User::where('id','=',$user_id)->first();

        $preorder_list_data = PreorderList::where('user_id','=',$user_id)->where('status','=','sold_finished')->paginate(5);

        return view('Users.view_order_must_get',compact('user_data','preorder_list_data'))
        ->with('i',(request()->input('page',1)-1)*5);
     }

     public function showProductConFirm(){
        $user_id = Auth::user()->id;
        $user_data = User::where('id','=',$user_id)->first();

        $order_confirm = Cart::where('user_id','=',$user_id)->where('status','=','confirm_order')->paginate(5);
        return view('Users.show_product_confirm_order',compact('order_confirm','user_data'))
        ->with('i',(request()->input('page',1)-1)*5);
     }
     public function ShowProductInsertPayment($id){

        $id_decrypt = Crypt::decrypt($id);

        $user_id = Auth::user()->id;
        $user_data = User::where('id','=',$user_id)->first();

        $cart_one_data = Cart::where('id','=',$id_decrypt)->first();
        
        return view('Users.show_product_payment',compact('user_data','cart_one_data'));
     }

     public function insertSlipProduct(Request $request,$id){
        $id_decrypt = Crypt::decrypt($id);

        if($request->hasFile('product_slip')){
            $destination_path = 'public/storage/images/payment';
            $image = $request->file('product_slip');
            $image_name = $image->getClientOriginalName();
            $path = $request ->file('product_slip')->storePubliclyAs($destination_path, $image_name);
        }

        Cart::where('id','=',$id_decrypt)->update([
            'pay_image' => $image_name
        ]);

        return redirect()->back()->with('message_success','แก้ไขข้อมูลสำเร็จ!');
     }
}
