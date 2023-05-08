@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')


    <div class="row " style="background-color:#343a40">
      <div class="col-sm-2 border-end border-secondary ">
          <div class="container" >
              <div class="row " >
                  <div class="col" width="30">

                  </div>

              </div>
              <div class="row ">
                  <div class="col">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10" style=" height:auto;">


            <div class="container bg-white border border-secondary rounded-2 mt-3">
                <div class="row my-4">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">ชื่อ</label>
                        <input type="text" name="first_name" value="{{$market_data -> user -> first_name}}" class="form-control rounded-0" id="inputEmail4" disabled>
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">นามสกุล</label>
                        <input type="text" name="last_name" value="{{$market_data -> user -> last_name}}" class="form-control rounded-0" id="inputPassword4" disabled>
                      </div>
                      <div class="col-md-6">
                          <label for="inputPassword4" class="form-label">ชื่อร้าน</label>
                          <input type="text" name="market_name" value="{{$market_data -> market_name}}" class="form-control rounded-0" id="inputPassword4" disabled>
                        </div>
                      <div class="col-6">
                        <label for="inputAddress" class="form-label">Email</label>
                        <input type="text" name="email" value="{{$market_data -> user ->email}}" class="form-control rounded-0" id="inputAddress" placeholder="" disabled>
                      </div>
                      <div class="col-6">
                          <label for="inputAddress" class="form-label">เบอร์โทร</label>
                          <input type="text" name="tel" value="{{$market_data -> user -> tel}}" class="form-control rounded-0" id="inputAddress" placeholder="" disabled>
                        </div>
                      <div class="col-6">
                        <label for="inputAddress2" class="form-label">เลขบัตรประชาชน</label>
                        <input type="text" name="identity_card_number" value="{{$market_data -> user -> identity_card_number}}" class="form-control rounded-0" id="inputAddress2" placeholder=""disabled>
                      </div>
                      <div class="col-md-6">
                          <label for="inputCity" class="form-label">พิกัดละติจูด</label>
                          <input type="text" name="latitude" value="{{$market_data -> latitude}}" class="form-control rounded-0" id="inputCity" disabled>
                      </div>
                      <div class="col-md-6">
                          <label for="inputCity" class="form-label">พิกัดลองติจูด</label>
                          <input type="text" name="longtitude" value="{{$market_data -> longtitude}}" class="form-control rounded-0" id="inputCity"disabled>
                      </div>
                      <div class="col-md-3">
                        <label for="inputCity" class="form-label">รหัสสมาชิกสำหรับคนที่เป็นสมาชิกกับสรรเกษตร</label>
                        <input type="text" name="user_group_key" value="{{$market_data -> user_group_key}}" class="form-control rounded-0" id="inputCity"disabled>
                      </div>
                      <div class="col-md-3">
                          <label for="inputCity" class="form-label">Line ID</label>
                          <input type="text" name="line_id" value="{{$market_data -> user -> line_id}}" class="form-control rounded-0" id="inputCity" disabled>
                      </div>

                      <div class="col-md-6">
                          <label for="inputCity" class="form-label">ที่อยู่</label>
                          <textarea type="text" name="address" value="{{$market_data -> user -> address}}" class="form-control rounded-0" id="inputCity" disabled></textarea>
                      </div>
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



@endsection
