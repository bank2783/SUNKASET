@extends('layouts.app')
@section('content')

<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ชื่อสินค้า</th>
            <th scope="col">รายละเอียด</th>
            <th scope="col">ราคา</th>
            <th scope="col">จำนวน</th>
            <th scope="col">ชื่อร้านค้า</th>
            <th scope="col">อนุมัติ</th>
            <th scope="col">ไม่อนุมัติ</th>

          </tr>
        </thead>
        <tbody>
            @foreach($products as $row)
          <tr>
            <th scope="row">{{$row->product_id}}</th>
            <td>{{$row->product_name}}</td>
            <td>{{$row->product_detail}}</td>
            <td>{{$row->product_price}}</td>
            <td>{{$row->product_amount}}</td>
            <td>{{$row->market->market_name}}</td>
            <td>
                <form action="{{route('admin.product.approved',$row->product_id)}}">
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
            <td><form action="{{route('admin.product.no_approved',$row->product_id)}}">
                <button class="btn btn-danger" type="submit" name="no_approved_bt" value="no_approved">ไม่อนุมัติ</button>
            </form></td>

          </tr>
          @endforeach
        </tbody>
      </table>
</div>


@endsection




