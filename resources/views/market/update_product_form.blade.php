@extends('layouts.app')
@section('content')
@include('layouts.header_menu')

<div class="container mt-3 " >
    <div class="row">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >
                  <div class="col" width="30">
                  <img src="img\alpaka.jpeg"  class="rounded-circle border shadow-sm" width="60" height="60" alt="...">
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
                  <div class="col-sm-12 mt-3 border">
                    <h1>ร้านขายสินค้า</h1>
                  </div>
              </div>
            </div>

            <div class="container">
                    <form action="{{route('market.product.update',$product_data -> id)}}" methode="POST">
                        @csrf
                        @method('put')
                    <div class="row d-flex">
                        <div class="mb-3 col-6">
                          <label for="exampleInputEmail1" class="form-label">จำนวน</label>
                          <input type="text" name="product_amount" value="{{$product_data -> product_amount}}" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">รายละเอียดสินค้า</label>
                            <textarea type="text"  name="product_detail" value="{{$product_data -> product_detail}}" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>

                          </div>
                          <div class="row d-flex">
                            <div class="mb-3 col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success rounded-0">บันทึก</button>
                            </div>
                          </div>
                    </div>
                    </form>


                    <div class="row d-flex justify-content-center">
                        @if(session()->has('message_success'))
                        <div class=" col-3 alert alert-success text-center rounded-0 mt-5">
                         {{ session()->get('message_success') }}
                        </div>
                         @endif
                    </div>


            </div>

        </div>
      </div>
  </div>
</div>
@include('layouts.footer')
@endsection


