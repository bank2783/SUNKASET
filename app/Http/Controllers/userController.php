<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;



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
    public function update(Request $request,$id){
        $request -> validate(
            [
                'first_name'=>'required|string|max:255',
                'last_name'=>'required|string|max:255',
                'identity_card_number'=>'required|string|max:13',
                'tel'=>'required|string|max:10',
                'line_id' => 'required|string|max:255',
                'address' => 'required|string|max:255',

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
            $info_user = User::all()->where('id',$user_id);
            return view('Users.profile',compact('info_user'));

        }

        public function editform(){
            $user_id = Auth::user()->id;
            $user_info = User::all()->where('id',$user_id);
            return view('Users.editprofile',compact('user_id','user_info'));
        }
}
