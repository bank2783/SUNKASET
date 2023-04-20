@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

<div class="row p-1 mt-4 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">รายละเอียดร้านค้าขอลงทะเบียน</p>
    </div>
</div>

    <div class="row">
      <div class="col-sm-2 ">
          <div class="container" >

              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10 mt-3 " style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
            <div class="container">
                <div class="col">
                    <form action="" method="POST" enctype="multipart/form-data" class="row g-3 bg-white mt-2" style="height: 500px;">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label">ชื่อร้านค้า</label>
                          <input type="text" name="first_name" value="{{$market_data -> market_name }}" class="form-control rounded-0" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                          <label for="inputPassword4" class="form-label">ชื่อเจ้าของร้าน</label>
                          <input type="text" name="last_name" value="{{$market_data -> user -> first_name }} {{$market_data -> user -> last_name}}" class="form-control rounded-0" id="inputPassword4">
                        </div>
                        <div class="col-6">
                          <label for="inputAddress" class="form-label">Email</label>
                          <input type="text" name="email" value="{{$market_data -> user -> email}}" class="form-control rounded-0" id="inputAddress" placeholder="">
                        </div>
                        <div class="col-6">
                            <label for="inputAddress" class="form-label">เบอร์โทร</label>
                            <input type="text" name="email" value="{{$market_data -> user -> tel}}" class="form-control rounded-0" id="inputAddress" placeholder="">
                          </div>
                        <div class="col-6">
                          <label for="inputAddress2" class="form-label">เลขบัตรประชาชน</label>
                          <input type="text" name="identity_card_number" value="{{$market_data -> user -> identity_card_number}}" class="form-control rounded-0" id="inputAddress2" placeholder="">
                        </div>
                        <div class="col-md-3">
                          <label for="inputCity" class="form-label">รหัสสมาชิกสำหรับคนที่เป็นสมาชิกกับสรรเกษตร</label>
                          <input type="text" name="tel" value="" class="form-control rounded-0" id="inputCity">
                        </div>
                        <div class="col-md-3">
                            <label for="inputCity" class="form-label">Line ID</label>
                            <input type="text" name="tel" value="{{$market_data -> user -> line_id}}" class="form-control rounded-0" id="inputCity">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">พิกัดละติจูด</label>
                            <input type="text" name="tel" value="" class="form-control rounded-0" id="inputCity">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">พิกัดลองติจูด</label>
                            <input type="text" name="tel" value="" class="form-control rounded-0" id="inputCity">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">ที่อยู่</label>
                            <textarea type="text" name="tel" value="{{$market_data -> user -> address}}" class="form-control rounded-0" id="inputCity"></textarea>
                        </div>



                      </form>
                </div>
            </div>

              {{-- {!!$products->links()!!} --}}
        </div>
      </div>
  </div>



@endsection
