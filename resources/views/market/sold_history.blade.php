@extends('layouts.app')
@section('content')
@include('layouts.header_menu')

<div class="container mt-3 " >
    <div class="row ">
        @if($market_data === null)
        <div class="col-12 d-flex justify-content-center">
            <p class="fs-5">คุณยังไม่มีร้านค้า</p>

          </div>
          <div class="col-12 d-flex justify-content-center">

            <a href="{{url('/')}}" class="btn btn-success rounded-0">กลับไปที่หน้าแรก</a>
          </div>
    @elseif($market_data->market_status == 'wait')
    <div class="col-12 d-flex justify-content-center">
        <p class="fs-5">ร้านค้าของคุณยังไม่ถูกอนุมัติ</p>

      </div>
      <div class="col-12 d-flex justify-content-center">

        <a href="{{url('/')}}" class="btn btn-success rounded-0">กลับไปที่หน้าแรก</a>
      </div>

      @else
      <div class="col-sm-2 ">

        <div class="container border" >
            <div class="row " >
                <div class="col" width="30">
                <img src="{{asset('storage/images/marketprofile/'.$market_data->market_image)}}"  class="rounded-circle border shadow-sm" width="60" height="60" alt="...">
                </div>
                <div class="col mt-3 ">
                    <h6>{{$market_data->market_name}}</h6>
                </div>
            </div>
            <div class="row ">
                <div class="col mt-3 mt-5 ">
                    @include('layouts.market_menu')
                </div>
            </div>
        </div>
    </div>
      <div class="col-sm-10  " style=" height:550px;">
          <div class="container text-center " style="background-color: #F0F0F0">
            <div class="row " style="background-color: #F0F0F0">
                <div class="col-sm-12 mt-3 bg-success text-white border">
                  <h1>รายการสินค้ารออนุมัติ</h1>
                </div>
            </div>
          </div>
          <table class="table bg-white mt-3 ">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col"></th>
                  <th scope="col">ชื่อสินค้า</th>
                  <th scope="col">จำนวน</th>
                  <th scope="col">ราคา</th>
                  <th scope="col">วัน/เดือน/ปี</th>

                </tr>
              </thead>
              <tbody>
                  @foreach($market_sold_his as $row )
                  <tr>
                      <th scope="row">{{$row -> id}}</th>
                      <td class="">
                        <img src="{{asset('storage/images/products/'.$row->product_image)}}" class="img-thumbnail" alt="..." style="height: 70px;">
                      </td>
                      <td>{{$row->product_name}}</td>
                      <td>{{$row->product_mount}}</td>
                      <td>{{$row->product_price}}</td>
                      <td>{{$row->created_at}}</td>

                    </tr>
                  @endforeach

              </tbody>
            </table>
            {!!$market_sold_his -> links()!!}
      </div>
    </div>

      @endif
  </div>
</div>


@include('layouts.footer')
@endsection


