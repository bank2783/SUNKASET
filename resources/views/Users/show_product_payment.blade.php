@extends('layouts.app')
@section('content')

@include('layouts.header_menu')



<div class="container fluid">
    <div class="row mt-2 d-flex justify-content-center">
      <div class="col-sm-2">
          <div class="container fluid">
              <div class="row ">
                  <div class="col" width="30">
                      <!-- รูป -->
                      <img src="{{asset('storage/images/profiles/'.$user_data->image)}}" style="width: 50px;" class="rounded-circle" alt="Cinque Terre">
                  </div>
                  <div class="col mt-3  ">
                      <p class="fw-bold text-break">{{$user_data -> first_name}}</p>
                  </div>
              </div>
              <div class="row ">
                  <div class="col mt-3">
                    <profile-menu-list></profile-menu-list>
                  </div>

              </div>

          </div>
      </div>

      <div class="col-10" >
        <div class="row bg-white d-flex justify-content-center align-items-center">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-4">
                    <img src="{{asset('storage/images/products/'.$cart_one_data->product_img)}}" class="img-fluid" alt="..." style="width: 400px;height:400px;">
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-6 mt-1">
                    <label for="exampleInputEmail1" class="form-label">ชื่อสินค้า</label>
                    <input class="form-control rounded-0 border border-secondary bg-white" value="{{$cart_one_data->product_front_descript}}" disabled>
                </div>
                <div class="col-md-6 mt-1">

                    <label for="exampleInputEmail1" class="form-label">ราคา</label>
                    <input class="form-control bg-white rounded-0 border border-secondary bg-white" value="{{number_format($cart_one_data->total_price)}}" disabled>
                </div>
                <div class="col-md-6 mt-1">
                    <label for="exampleInputEmail1" class="form-label">จำนวน</label>
                    <input class="form-control bg-white rounded-0 border border-secondary bg-white" value="{{$cart_one_data->product_amount}}" disabled>
                </div>
                <div class="col-md-6 mt-1">
                    <label for="exampleInputEmail1" class="form-label">รหัสผู้ใช้</label>
                    <input class="form-control bg-white rounded-0 border border-secondary bg-white" value="{{$cart_one_data->user_id}}" disabled>
                </div>

                @php
                 $id_encrypt = Crypt::encrypt($cart_one_data -> id)
                @endphp


                <form action="{{route('insert.slip.product',$id_encrypt)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mt-2 d-flex justify-content-center align-items-center">
                    <div class="col-md-4 ">
                        <input type="file" name="product_slip" class="form-control border border-success rounded-0">
                    </div>

                </div>

                <div class="row mt-2 d-flex justify-content-center align-items-center">
                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success border border-success rounded-0" style="width: 100%;">แนบสลีปชำระเงิน</button>
                    </div>
                </div>
                </form>

                <div class="row g-3 mt-2">
                    <div class="col-12php arti d-flex justify-content-center">
                        <img src="{{asset('storage/images/asset/add-line-with-upload-qr-code-photo-04.jpg')}}">
                    </div>
                    <div class="col d-flex justify-content-center">

                        <div id="emailHelp" class="form-text">สแกน QR code หรือ แอดไลน์ A1234 เพื่อติดต่อกับแอดมิน โดยการแจ้งรหัสผู้ใช้และชื่อกับแอดมิน</div>
                    </div>
                  </div>

                  @if(session()->has('message_success'))
                <div class="container">
                    <div class="alert d-flex justify-content-center alert-success mt-5">
                        {{ session()->get('message_success') }}
                    </div>
                </div>
                @endif


            </div>
        </div>


      </div>


            </div>
      </div>



  </div>
  </div>

@include('layouts.footer');

@endsection
