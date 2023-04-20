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
        <div class="col-sm-10 bg-white mt-3 " >
            <div class="container text-center ">
              <div class="row ">
                  <div class="col-sm-12 mt-3 bg-white">
                    <h1>ขายสินค้า</h1>
                  </div>
              </div>
            </div>

            <div class="container">

                    <form action="{{route('market.insert.product')}}"  enctype="multipart/form-data" method="POST" methode="POST">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                    <div class="row d-flex">
                        <div class="mb-3 col-6">
                          <label for="exampleInputEmail1" class="form-label">ชื่อสินค้า</label>
                          <input type="text" name="product_name"  class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">จำนวน</label>
                            <input type="text"  name="product_amount"  class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">

                          </div>
                    </div>
                    <div class="row d-flex">
                        <div class="mb-3 col-6">
                          <label for="exampleInputEmail1" class="form-label">ราคาสินค้า</label>
                          <input type="text" name="product_price"  class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">ข้อความที่ใช้แสดงหน้าเว็บไซต์</label>
                            <input type="text"  name="product_front_descrip"  class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">

                          </div>
                    </div>


                    <div class="row d-flex  justify-content-center">
                        <input type="hidden" value="{{$market->id}}" name="market_id">

                    <div class="row d-flex  justify-content-center">
                        <div class="mb-3 col-6">
                          <label for="exampleInputEmail1" class="form-label">รายละเอียดของสินค้า</label>
                          <textarea type="text" name="product_detail"  class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>

                        </div>

                    </div>
                    <div class="row d-flex  justify-content-center">
                        <div class="mb-3 col-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="product_type_id" id="inlineRadio1" value="2">
                                <label class="form-check-label" for="inlineRadio1">ข้าว</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="product_type_id" id="inlineRadio2" value="3">
                                <label class="form-check-label" for="inlineRadio2">ผลิตภัณฑ์แปรรูป</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="product_type_id" id="inlineRadio3" value="4">
                                <label class="form-check-label" for="inlineRadio3">ของฝาก/ของที่ระลึก</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="product_type_id" id="inlineRadio3" value="5" >
                                <label class="form-check-label" for="inlineRadio3">ผลิตภัณฑ์ทางการเกษตร</label>
                              </div>

                        </div>

                    </div>

                    <div class="row d-flex">
                        <div class="mb-3 col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success rounded-0">บันทึก</button>
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


