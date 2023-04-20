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
        <div class="col-sm-10  " style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3 ">
                    <h1>ร้านขายสินค้า</h1>
                  </div>
              </div>
            </div>

            <table class="table bg-white">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">รูป</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">ราคา/ชิ้น</th>
                    <th scope="col">จำนวนคงเหลือ</th>
                    <th scope="col">เปิด/ปิด การขาย</th>
                    <th scope="col">แก้ไข</th>
                    <th scope="col">ลบ</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($product_data as $row )
                  <tr>
                    <th scope="row">{{$row->id}}</th>
                    <td><img style="height: 70px;width:70px;" class="rounded-1" src="{{asset('storage/images/products/'.$row->product_img)}}"></td>
                    <td>{{$row->product_name}}</td>
                    <td>{{$row->product_price}}</td>
                    <td>{{$row->product_amount}}</td>
                    <td>
                        <button @if($row->product_status == 'selling')
                                @disabled(true)
                                @endif
                                class="btn btn-success">
                                <a href="{{route('swith.on.product.inmarket',$row->id)}}" class="nav-link">เปิด</a>
                        </button>


                                <button @if($row->product_status == 'stop_selling' )
                                        @disabled(true)
                                        @endif

                                    class="btn btn-secondary mx-1"><a href="{{route('swith.off.product.inmarket',$row->id)}}" class="nav-link">ปิด</a>
                                </button></td>
                    <td>
                        <form>
                        <a href="{{route('market.product.selling.edit.form',$row->id)}}"  class="btn btn-success">แก้ไข</a>
                        </form>
                    </td>
                    <td><a class="btn btn-danger">ลบ</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

        </div>
      </div>
  </div>
</div>
@include('layouts.footer')
@endsection


