@extends('layouts.app')
@section('content')
@include('layouts.header_menu')

<div class="container mt-3 " >
    <div class="row ">
        @if($market === null)
        <div class="col-12 d-flex justify-content-center">
            <p class="fs-5">คุณยังไม่มีร้านค้า</p>

          </div>
          <div class="col-12 d-flex justify-content-center">

            <a href="{{url('/')}}" class="btn btn-success rounded-0">กลับไปที่หน้าแรก</a>
          </div>
    @elseif($market->market_status == 'wait')
    <div class="col-12 d-flex justify-content-center">
        <p class="fs-5">ร้านค้าของคุณยังไม่ถูกอนุมัติ</p>

      </div>
      <div class="col-12 d-flex justify-content-center">

        <a href="{{url('/')}}" class="btn btn-success rounded-0">กลับไปที่หน้าแรก</a>
      </div>

      @else
      <div class="col-sm-2 ">

        <div class="container " >
            <div class="row " >
                <div class="col" width="30">
                <img src="{{asset('storage/images/marketprofile/'.$market->market_image)}}"  class="rounded-circle border shadow-sm" width="60" height="60" alt="...">
                </div>
                <div class="col mt-3 ">
                    <h6>{{$market->market_name}}</h6>
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
                <div class="col-sm-12 mt-3 bg-success text-white ">
                  <h1>รายการสินค้ารออนุมัติ</h1>
                </div>
            </div>
          </div>
          <table class="table bg-white mt-3 ">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">ชื่อสินค้า</th>
                  <th scope="col">จำนวน</th>
                  <th scope="col">ราคา</th>
                  <th scope="col">แก้ไข</th>
                  <th scope="col">สถานะ</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($products as $row )
                  <tr>
                      <th scope="row">{{$row->id}}</th>
                      <td>{{$row->product_name}}</td>
                      <td>{{$row->product_amount}}</td>
                      <td>{{$row->product_price}}</td>

                      <td><a class="btn btn-warning" href="{{url('user/marget/add-product-images-form/'.$row->id)}}">แก้ไข</a></td>
                      <td><button type="button" @if ($row->product_status == 'approved')
                          class="btn btn-success"
                        @elseif($row->product_status == 'no_approved')
                        class="btn btn-danger"
                        @elseif($row->product_status == 'wait_approve')
                        class="btn btn-secondary"
                        @endif
                      >
                          @if($row->product_status == 'approved')
                           อนุมัติแล้ว
                          @elseif($row->product_status == 'no_approved')
                          ไม่อนุมัติ
                          @elseif($row->product_status == 'wait_approve')
                          รออนุมัติ
                          @endif
                      </button>
                  </td>
                    </tr>
                  @endforeach

              </tbody>
            </table>
      </div>
    </div>

      @endif
  </div>
</div>


@include('layouts.footer')
@endsection


