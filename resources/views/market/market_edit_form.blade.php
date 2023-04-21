@extends('layouts.app')
@section('content')
@include('layouts.header_menu')

<div class="container mt-3 " >
    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >
                  <div class="col" width="30">
                  <img src="{{asset('storage/images/marketprofile/'.$market->market_image)}}"  class="rounded-circle border shadow-sm" width="60" height="60" alt="...">
                  </div>
                  <div class="col mt-3 ">
                      <h7>{{$market->market_name}}</h7>
                  </div>
              </div>
              <div class="row ">
                  <div class="col mt-3 mt-5 ">
                      @include('layouts.market_menu')
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10 mt-3 bg-white " >
            <div class="container text-center ">
              <div class="row ">
                  <div class="col-sm-12 mt-3 bg-white">
                    <h1>แก้ไขข้อมูลร้านค้า</h1>
                  </div>
              </div>
            </div>

            <div class="container">

                <form action="{{route('market.edit.update',$market -> id)}}" method="POST" enctype="multipart/form-data" class="row g-3 bg-white mt-2">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="col-md-6">
                      <label for="inputEmail4" class="form-label">ชื่อ</label>
                      <input type="text" name="first_name" value="{{$market -> user -> first_name}}" class="form-control rounded-0" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                      <label for="inputPassword4" class="form-label">นามสกุล</label>
                      <input type="text" name="last_name" value="{{$market-> user -> last_name}}" class="form-control rounded-0" id="inputPassword4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">ชื่อร้าน</label>
                        <input type="text" name="market_name" value="{{$market -> market_name}}" class="form-control rounded-0" id="inputPassword4">
                      </div>
                    <div class="col-6">
                      <label for="inputAddress" class="form-label">Email</label>
                      <input type="text" name="email" value="{{$market -> user ->email}}" class="form-control rounded-0" id="inputAddress" placeholder="">
                    </div>
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">เบอร์โทร</label>
                        <input type="text" name="tel" value="{{$market -> user -> tel}}" class="form-control rounded-0" id="inputAddress" placeholder="">
                      </div>
                    <div class="col-6">
                      <label for="inputAddress2" class="form-label">เลขบัตรประชาชน</label>
                      <input type="text" name="identity_card_number" value="{{$market -> user -> identity_card_number}}" class="form-control rounded-0" id="inputAddress2" placeholder="">
                    </div>
                    <div class="col-6">
                      <label for="inputAddress2" class="form-label">แผนที่ร้านค้า</label>
                      <input type="text" name="google_map" value="{{$market->google_map}}" class="form-control rounded-0" id="inputAddress2" placeholder="">
                    </div>

                    <div class="col-md-3">
                        <label for="inputCity" class="form-label">Line ID</label>
                        <input type="text" name="line_id" value="{{$market -> user -> line_id}}" class="form-control rounded-0" id="inputCity">
                    </div>
                    <div class="col-md-3">
                        <label for="inputCity" class="form-label">รูปโปรไฟล์</label>
                        <input type="file" name="market_image"  class="form-control rounded-0" id="inputCity">
                    </div>

                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">ที่อยู่</label>
                        <textarea type="text" name="address" value="{{$market -> user -> address}}" class="form-control rounded-0" id="inputCity"></textarea>
                    </div>

                    <div class="col-md-12 d-flex justify-content-center">
                        <button class="btn btn-success rounded-0 my-3">
                            บันทึก
                        </button>
                    </div>

                </form>

                    <div class="row d-flex justify-content-center">
                        @if(session()->has('message_success'))
                        <div class=" col-3 alert alert-success text-center rounded-0 mt-5">
                         {{ session()->get('message_success') }}
                        </div>
                         @endif
                    </div>


            </div>

        </div>
      </div>
  </div>
</div>
@include('layouts.footer')
@endsection


