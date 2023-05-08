@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')



    <div class="row" style="background-color:#343a40">
      <div class="col-sm-2 border-end border-secondary ">
          <div class="container" >



                    @include('layouts.admin_list');


          </div>
      </div>
        <div class="col-sm-10 mt-3" style=" height:auto;">
            <div class="container text-center " >
              <div class="row">
                  <div class="col-sm-12">

                  </div>
              </div>
            </div>
            <table class="table bg-white rounded-2">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">รายละเอียด</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">ชื่อร้านค้า</th>
                    <th scope="col">รายละเอียด</th>
                    <th scope="col">อนุมัติ</th>
                    <th scope="col">ไม่อนุมัติ</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach($products as $row)
                  <tr>
                    <th scope="row">{{$row->id}}</th>
                    <td>{{$row->product_name}}</td>
                    <td>{{$row->product_detail}}</td>
                    <td>{{number_format($row->product_price)}}</td>
                    <td>{{number_format($row->product_amount)}}</td>
                    <td>{{$row->market->market_name}}</td>
                    <td><a href="{{route('admin.view.product.detail',$row->id)}}">ดูรายละเอียด</a></td>

                    <td>
                        <form action="{{route('admin.product.approved',$row->id)}}">
                            <input type="hidden" name="product_name" value="{{$row->product_name}}">
                            <input type="hidden" name="product_amount" value="{{$row->product_amount}}">
                            <input type="hidden" name="product_price" value="{{$row->product_price}}">
                            <input type="hidden" name="product_detail" value="{{$row->product_detail}}">
                            <input type="hidden" name="product_img" value="{{$row->product_img}}">
                            <input type="hidden" name="market_id" value="{{$row->market->id}}">
                            <input type="hidden" name="product_type_id" value="{{$row->product_type_id}}">
                            <button class="btn btn-success" type="submit" name="approved_bt" value="approved">อนุมัติ</button>
                        </form>
                     </td>
                    <td><form action="{{route('admin.product.no_approved',$row->id)}}">
                        <button class="btn btn-danger" type="submit" name="no_approved_bt" value="no_approved">ไม่อนุมัติ</button>
                    </form></td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
              {!!$products->links()!!}
        </div>
      </div>
  </div>



@endsection




