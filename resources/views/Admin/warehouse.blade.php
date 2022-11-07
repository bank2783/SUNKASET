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
            <th scope="col">แก้ไขสินค้า</th>
            <th scope="col">ลบสินค้าออกจากคลัง</th>

          </tr>
        </thead>
        <tbody>
            @foreach($products as $row)
          <tr>
            <th scope="row">{{$row->id}}</th>
            <td>{{$row->product_name}}</td>
            <td>{{$row->product_detail}}</td>
            <td>{{$row->product_price}}</td>
            <td>{{$row->product_amount}}</td>
            <td>{{$row->market->market_name}}</td>
            <td>
                <form action="{{route('admin.warehouse.edit.product.form')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <input type="hidden" name="product_id" value="{{$row->id}}">
                    <button class="btn btn-warning" type="submit" >แก้ไข</button>
                </form>
            </td>
            <td>
                <form action="{{route('admin.warehouse.delete.product')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <input type="hidden" name="product_id" value="{{$row->id}}">
                    <button class="btn btn-danger " type="submit" name="delete_product" value="delete">ลบ</button>
                </form>
            </td>


          </tr>
          @endforeach
        </tbody>
      </table>
</div>


@endsection




