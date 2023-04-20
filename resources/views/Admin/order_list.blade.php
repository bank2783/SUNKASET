@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

<div class="row mt-4 p-1 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">ค้นหารายการสั่งซื้อ</p>
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
                <div class="row">
                    <div class="col">
                        <label>กรอกรหัสผู้ใช้เพื่อค้นหารายการสั่งซื้อ</label>
                    </div>
                </div>
                <div class="row">
                    <form class="row" action="{{route('Show.Order.List')}}" method="get">


                    <div class="col-3">

                        <input name="id" class="rounded-0 form form-control" type="text">
                    </div>

                    <div  class="col-1  d-flex justify-content-center align-items-center">

                            <button type="submit" style="background-color: #5cbd6c;color:#F0F0F0; width:100px;height:36px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-search " viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                            </button>


                    </div>
                </form>

                </div>
                <table class="table mt-2 bg-white">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">รหัสสินค้า</th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ราคารวม</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">รหัสผู้ใช้</th>
                        <th scope="col">ชื่อผู้ซื้อ</th>
                        <th scope="col">ชื่อร้านค้า</th>

                        <th scope="col">สถานะ</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_list as $row)
                        <tr>
                            <th scope="row">{{$row->id}}</th>
                            <th scope="row">{{$row->Warehouse->id}}</th>
                            <td>{{$row->product_front_descript}}</td>
                            <td>{{$row->total_price}}</td>
                            <td>{{$row->product_amount}}</td>
                            <td>{{$row->user->id}}</td>
                            <td>{{$row->user->first_name}}</td>
                            <td>{{$row->market->market_name}}</td>
                            <td>
                                <a href="{{route('finished.order',$row->id)}}" class="btn btn-primary">ยืนยันคำสั่งซื้อ</a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                  </table>
                  {!!$order_list -> links()!!}
            </div>
        </div>
      </div>
  </div>



@endsection
