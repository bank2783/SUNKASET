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
            <div class="row bg-white pt-3 py-3">
                <div style="height: 300px;" class="col d-flex justify-content-center">
                    <img class="rounded-1 shadow-sm img-fluid" src="{{asset('storage/images/preorders/'.$preorder_data -> pre_list_image)}}">
                </div>
            </div>

                <div class="row mt-4 bg-white p-3 g-3">
                    <div class="col-12 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label">ชื่อสินค้า</label>
                      <input type="text" value="{{$preorder_data -> pre_list_name}}" class="rounded-0 form-control" disabled  aria-label="First name">
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="formGroupExampleInput" class="form-label">ราคาทั้งหมด</label>
                      <input type="text" value="{{number_format($preorder_data -> pre_list_price)}}" class="rounded-0 form-control" disabled  aria-label="Last name">
                    </div>
                    <div class="col-12 col-sm-6">
                        <label for="formGroupExampleInput" class="form-label">จำนวน</label>
                      <input type="text" value="{{number_format($preorder_data -> pre_list_amount)}}" class="rounded-0 form-control" disabled  aria-label="Last name">
                    </div>
                    <div class="col-12 col-sm-3">
                        <label for="formGroupExampleInput" class="form-label">รหัสผู้ใช้</label>
                      <input type="text" value="{{number_format($preorder_data -> user_id)}}" class="rounded-0 form-control" disabled  aria-label="Last name">
                    </div>
                    <div class="col-12 col-sm-3">
                        <label for="formGroupExampleInput" class="form-label">ชื่อผู้ใช้</label>
                      <input type="text" value="{{$preorder_data -> User -> first_name}} {{$preorder_data -> User -> last_name}}" class="rounded-0 form-control" disabled  aria-label="Last name">
                    </div>
                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <label for="formGroupExampleInput" class="form-label">ที่อยู่สำหรับการจัดส่ง</label>
                      <textarea value="{{$preorder_data -> TransportData -> address}}" class="rounded-0 form-control" disabled ></textarea>
                    </div>
                    </div>

                    @if ($preorder_data -> pay_image === null)
                    @php
                            $id_encrypt = Crypt::encrypt($preorder_data -> id)
                        @endphp

                        <form action="{{route('upload.preorder.payment',$id_encrypt)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row d-flex justify-content-center align-items-center mt-3">
                                <div class="col-12 col-sm-4">
                                    <label for="formGroupExampleInput" class="form-label">แนบสลีปการโอนเงิน</label>
                                    <input name="preorder_pay_image" class="form-control border border-success" type="file">
                                    <div id="emailHelp" class="form-text">แนบสลีปการโอนเงินเพื่อนเป็นหลักฐานการโอนเงิน</div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center align-items-center mt-3">
                                <div class="col-12 col-sm-3">
                                    <button type="submit" class="btn btn-success" style="width:100%">แนบสลีป</button>
                                </div>
                            </div>
                        </form>
                    @else
                    <div class="row g-3 mt-2">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="{{asset('storage/images/payment/'.$preorder_data -> pay_image)}}" style="height: 400px;">
                        </div>

                      </div>
                    @endif





                        @if(session()->has('message_success'))
            <div class="container">
                <div class="alert d-flex justify-content-center alert-success mt-5">
                    {{ session()->get('message_success') }}
                </div>
            </div>
            @endif

                  <div class="row g-3 mt-2">
                    <div class="col-12php arti d-flex justify-content-center">
                        <img src="{{asset('storage/images/asset/add-line-with-upload-qr-code-photo-04.jpg')}}">
                    </div>
                    <div class="col d-flex justify-content-center">

                        <div id="emailHelp" class="form-text">สแกน QR code หรือ แอดไลน์ A1234 เพื่อติดต่อกับแอดมิน โดยการแจ้งรหัสผู้ใช้และชื่อกับแอดมิน</div>
                    </div>
                  </div>

        </div>


      </div>
  </div>
  </div>

@include('layouts.footer');

@endsection
