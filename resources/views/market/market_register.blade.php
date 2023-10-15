@extends('layouts.app')
@section('content')
@include('layouts.header_baner')
@include('layouts.header_menu')

<div class="container-fluid container ">
    @if($market_data == null)
    <div class="container-fluid">
    <form action="{{route('market.register.insert')}}" method="POST" enctype="multipart/form-data" class="row g-3 bg-white mt-2">
    {{ csrf_field() }}
    {{ method_field('put') }}

    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">ชื่อ</label>
      <input type="text" name="first_name" value="{{$user_data -> first_name}}" class="form-control rounded-0" id="inputEmail4">
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">นามสกุล</label>
      <input type="text" name="last_name" value="{{$user_data -> last_name}}" class="form-control rounded-0" id="inputPassword4">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">ชื่อร้าน</label>
        <input type="text" name="market_name" class="form-control rounded-0" id="inputPassword4">
      </div>
    <div class="col-6">
      <label for="inputAddress" class="form-label">Email</label>
      <input type="text" name="email" value="{{$user_data -> email}}" class="form-control rounded-0" id="inputAddress" placeholder="">
    </div>
    <div class="col-6">
        <label for="inputAddress" class="form-label">เบอร์โทร</label>
        <input type="text" name="tel" value="{{$user_data -> tel}}" class="form-control rounded-0" id="inputAddress" placeholder="">
      </div>
    <div class="col-6">
      <label for="inputAddress2" class="form-label">เลขบัตรประชาชน</label>
      <input type="text" name="identity_card_number" value="{{$user_data -> identity_card_number}}" class="form-control rounded-0" id="inputAddress2" placeholder="">
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">Google map</label>
        <input type="google_map" name="google_map"  class="form-control rounded-0" id="inputCity">
    </div>

    <div class="col-md-3">
        <label for="inputCity" class="form-label">Line ID</label>
        <input type="text" name="line_id" value="{{$user_data -> line_id}}" class="form-control rounded-0" id="inputCity">
    </div>

    <div class="col-md-6">
        <label for="inputCity" class="form-label">ที่อยู่</label>
        <textarea type="text" name="address" value="{{$user_data -> address}}" class="form-control rounded-0" id="inputCity"></textarea>
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">รูปโปรไฟล์ร้านค้า</label>
        <input type="file" name="market_image"  class="form-control rounded-0" id="inputCity">
    </div>
    <div class="col-md-12 d-flex justify-content-center">
        <button class="btn btn-success rounded-0 my-3">
            ลงทะเบียน
        </button>
    </div>

</form>
    </div>
@else
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        <p class="fs-5">คุณมีร้านค้าแล้ว</p>

    </div>
<div class="col-12 d-flex d-flex justify-content-center">
    <a href="{{route('user.market')}}" class="btn btn-success rounded-0">ไปที่ร้านของฉัน</a>
</div>
</div>
@endif
</div>


@include('layouts.footer');
@endsection
