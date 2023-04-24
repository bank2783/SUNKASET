@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

<div class="row mt-4 p-1 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">รายละเอียดรายการสั่งซื้อสินค้า</p>
    </div>
</div>

    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >

                  <div class="col mt-3 ">
                      <h7></h7>
                  </div>
              </div>
              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10  " style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-5">

                  </div>
              </div>
            </div>
           <div class="container">
            <div class="row bg-white">
                <div class="row d-felx justify-content-center align-items-center">
                    <div class="col-4 px-2 py-2">
                        <img src="{{asset('storage/images/products/'.$cart_one_data -> product_img)}}" class="img-fluid" alt="..." style="height:400px;width:400px;">
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label">ชื่อสินค้า</label>
                        <input class="form-control" value="{{$cart_one_data -> product_front_descript}}">
                    </div> 
                    <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label">ราคารวม</label>
                        <input class="form-control" value="{{$cart_one_data -> total_price}}">
                    </div> 

                    <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label">จำนวนที่ซื้อ</label>
                        <input class="form-control" value="{{$cart_one_data -> product_amount}}">
                    </div> 

                    <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label">ชื่อผู้ซื้อ</label>
                        <input class="form-control" value="{{$cart_one_data -> user -> first_name}} {{$cart_one_data -> user -> last_name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label">ที่อยู่สำหรับการจัดส่ง</label>
                        <textarea class="form-control" value="{{$address->address}} {{$address -> postal_code}} {{$address -> phone_number}}"></textarea>
                    </div> 
                </div>
                <div class="row mt-5 d-flex justify-content-center align-items-center my-5">
                    <div class="col-md-6 d-flex d-flex justify-content-center align-items-center">
                        <img src="{{asset('storage/images/payment/'.$cart_one_data -> pay_image)}}" class="img-fluid rounded-1" alt="..." style="height:400px;width:400px;">
                    </div>
                </div>


            </div>
           </div>
        </div>
      </div>
  </div>



@endsection
