@extends('layouts.app')
@section('content')

@include('layouts.header_menu');

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
        <p class="fw-bold text-center">ชำระเงิน</p>

        <div class="container">
            <div class="row ">
                <div style="height: 300px;" class="col d-flex justify-content-center">
                    <img class="rounded-1 shadow-sm" src="{{asset('storage/images/preorders/'.$preorder_data -> pre_list_image)}}">
                </div>
            </div>
            <div class="row">
                <div class="row mt-5 bg-white p-3 rounded-1 g-3">
                    <div class="col-6">
                    <label for="formGroupExampleInput" class="form-label">ชื่อสินค้า</label>
                      <input type="text" value="{{$preorder_data -> pre_list_name}}" class="rounded-0 form-control" disabled  aria-label="First name">
                    </div>
                    <div class="col-6">
                        <label for="formGroupExampleInput" class="form-label">ราคาทั้งหมด</label>
                      <input type="text" value="{{number_format($preorder_data -> pre_list_price)}}" class="rounded-0 form-control" disabled  aria-label="Last name">
                    </div>
                    <div class="col-6">
                        <label for="formGroupExampleInput" class="form-label">จำนวน</label>
                      <input type="text" value="{{number_format($preorder_data -> pre_list_amount)}}" class="rounded-0 form-control" disabled  aria-label="Last name">
                    </div>
                    <div class="col-3">
                        <label for="formGroupExampleInput" class="form-label">รหัสผู้ใช้</label>
                      <input type="text" value="{{number_format($preorder_data -> user_id)}}" class="rounded-0 form-control" disabled  aria-label="Last name">
                    </div>
                    <div class="col-3">
                        <label for="formGroupExampleInput" class="form-label">ชื่อผู้ใช้</label>
                      <input type="text" value="{{$preorder_data -> User -> first_name}} {{$preorder_data -> User -> last_name}}" class="rounded-0 form-control" disabled  aria-label="Last name">
                    </div>

                  </div>
                  <div class="row g-3">
                    <div class="col-12php arti d-flex justify-content-center">
                        <img src="{{asset('storage/images/asset/add-line-with-upload-qr-code-photo-04.jpg')}}">
                    </div>
                    <div class="col d-flex justify-content-center">
                        <p>สแกน QR code หรือ แอดไลน์ A1234 เพื่อติดต่อกับแอดมิน โดยการแจ้งรหัสผู้ใช้และชื่อกับแอดมิน</p>
                    </div>
                  </div>
            </div>
        </div>


      </div>
  </div>
  </div>

@include('layouts.footer');

@endsection
