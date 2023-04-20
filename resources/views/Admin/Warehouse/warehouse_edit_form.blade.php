@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >
                  <div class="col" width="30">

                  </div>

              </div>
              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10" style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
            <form action="{{route('admin.warehouse.edit.products.update')}}" method="POST">
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">ชื่อสินค้า</label>
                  <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">ราคา</label>
                  <input type="text" name="product_price" value="{{$product->product_price}}" class="form-control rounded-0" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">จำนวนสินค้า</label>
                    <input type="text" name="product_amount" value="{{$product->product_amount}}" class="form-control rounded-0" id="exampleInputPassword1">
                  </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">รายละเอียด/คำอธิบายสินค้า</label>
                    <textarea type="text" class="form-control rounded-0" value="{{$product->product_detail}}" id="exampleInputEmail1"  placeholder="" name="product_detail"></textarea>
                </div>
                <input type="hidden" name="product_id" value="{{ $product->id}}">

                <button type="submit" class="btn btn-primary rounded-0">บันทึก</button>
              </form>
        </div>
      </div>
  </div>



@endsection
