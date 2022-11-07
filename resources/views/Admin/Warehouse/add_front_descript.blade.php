@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-6 align-items-center">
            <form action="{{route('admin.warehouse.product.sell.add-front-description.insert')}}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">คำอธิบายสินค้าหน้าเว็บไซต์</label>
                  <input type="text" name="product_front_description" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <input type="hidden" name="product_id" value="{{$product_id}}">

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>

@endsection
