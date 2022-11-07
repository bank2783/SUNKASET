@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-6 align-items-center">
            <form action="{{route('admin.warehouse.edit.products.update')}}" method="POST">
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">ชื่อสินค้า</label>
                  <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">ราคา</label>
                  <input type="text" name="product_price" value="{{$product->product_price}}" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">จำนวนสินค้า</label>
                    <input type="text" name="product_amount" value="{{$product->product_amount}}" class="form-control" id="exampleInputPassword1">
                  </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">คำอธิบายสินค้า</label>
                    <textarea type="text" class="form-control" value="{{$product->product_detail}}" id="exampleInputEmail1"  placeholder="" name="product_detail"></textarea>
                </div>
                <input type="hidden" name="product_id" value="{{ $product->id}}">

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection
