@extends('layouts.app')
@section('content')

<div class="container " >
    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >
                  <div class="col" width="30">
                  <img src="img\alpaka.jpeg"  class="rounded-circle border shadow-sm" width="60" height="60" alt="...">
                  </div>
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
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
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
      </div>
  </div>
</div>

@endsection
