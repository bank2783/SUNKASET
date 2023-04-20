@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >
                  <div class="col" width="30">

                  </div>

              </div>
              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10 mt-4" style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
            <form action="{{route('admin.update.user.data',$user_data->id)}}" method="POST" enctype="multipart/form-data" class="row g-3 bg-white mt-2">
                {{ csrf_field() }}
                {{ method_field('put') }}

                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">ชื่อจริง</label>
                  <input type="text" name="first_name" value="{{$user_data->first_name}}" class="form-control rounded-0" id="inputEmail4">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">นามสกุล</label>
                  <input type="text" name="last_name" value="{{$user_data->last_name}}" class="form-control rounded-0" id="inputPassword4">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Email</label>
                  <input type="email" name="email" value="{{$user_data->email}}" class="form-control rounded-0" id="inputAddress" placeholder="">
                </div>
                <div class="col-6">
                  <label for="inputAddress2" class="form-label">เลขบัตรประชาชน</label>
                  <input type="text" name="identity_card_number" value="{{$user_data->identity_card_number}}" class="form-control rounded-0" id="inputAddress2" placeholder="">
                </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">เบอร์โทร</label>
                  <input type="text" name="tel" value="{{$user_data -> tel}}" class="form-control rounded-0" id="inputCity">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">ที่อยู่</label>
                    <input type="text" name="address" value="{{$user_data -> address}}" class="form-control rounded-0" id="inputCity">
                  </div>
                <div class="col-md-2">
                  <label for="inputState" class="form-label">Line id</label>
                  <input type="text" name="line_id" value="{{$user_data->line_id}}" class="form-control rounded-0" id="inputCity">
                </div>
                <div class="col-md-4">
                  <label for="inputZip" class="form-label">รูปโปรไฟล์</label>
                  <input type="file" name="user_img" class="form-control rounded-0" id="inputZip">
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary rounded-0 my-3">บันทึก</button>
                </div>
              </form>
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
