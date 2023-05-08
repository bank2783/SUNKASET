@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')



    <div class="row " style="background-color:#343a40">
      <div class="col-sm-2 border-end border-secondary">
          <div class="container" >
              <div class="row " >

                  <div class="col">

                  </div>
              </div>
              <div class="row ">
                  <div class="col ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10  " style=" height:auto;">

            <div class="container bg-white mt-3">
                <div class="row">

                </div>
                <div class="row">
                    <form class="row mt-4" action="{{route('Show.Order.List')}}" method="get">


                    <div class="col-3">

                        <input name="id" class="rounded-1 form form-control" type="text">


                    </div>

                    <div  class="col-2 text-white">
                        <button style="height:auto;width:auto"  type="submit" aria-placeholder="" class="btn btn-primary">ค้นหา</button>
                    </div>


                    </form>
                    <div class="row">
                        <div class="col-2">
                            <div id="emailHelp" class="form-text">ใส่รหัสผู้ใช้แล้วกดค้นหา</div>
                        </div>
                    </div>

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
                        <th scope="col">รายละเอียด</th>

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
                            <td><a href="{{route('show.product.order.detail',$row->id)}}">ดูรายละเอียด</a></td>
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
