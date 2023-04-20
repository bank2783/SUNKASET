@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

<div class="row p-1 mt-4 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">คลังสินค้า</p>
    </div>
</div>

    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >

              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10 mt-4 " style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
            <table class="table bg-white">
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
            {!!$products->links()!!}
        </div>
      </div>
  </div>



@endsection




