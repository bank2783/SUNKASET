@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')


<div class="row p-1 mt-4 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">รายละเอียดสินค้าขอลงทะเบียน</p>
    </div>
</div>

    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >


              </div>
              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list')
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10" style=" height:auto;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
            <div class="container bg-light">
                @if(!empty($product_data -> product_img))
                <div class="col mt-4 d-flex justify-content-center">
                    <img src="{{asset('storage/images/products/'.$product_data -> product_img)}}" class="img-fluid rounded-1 mt-5" alt="..." style="height: 450px;">

                </div>
                <div class="col d-flex justify-content-center mt-3">
                    <p class="fs-4">รูปภาพหลัก</p>
                </div>
                @else
                <div class="col d-flex justify-content-center mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                      </svg>
                </div>
                <div class="col d-flex justify-content-center mt-5">
                    <p>ยังไม่มีรูปภาพหลัก</p>
                </div>

                @endif


                <div class="col d-flex justify-content-center">
                    @if(!empty($prouct_images))
                    @foreach ($prouct_images as $row )
                    <div class="col d-flex justify-content-center">
                    <img src="{{asset('storage/images/products/'.$row -> image_name)}}" class="img-fluid  rounded-1 mt-5 px-2" alt="..." style="height: 200px;">
                    </div>
                    @endforeach
                    @else
                    <div class="col d-flex justify-content-center mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                          </svg>
                    </div>
                    <div class="col d-flex justify-content-center mt-5">
                        <p>ยังไม่มีรูปภาพเพิ่มเติม</p>
                    </div>
                    @endif
                </div>
                <div class="col mt-5">
                    <form action=""  enctype="multipart/form-data" method="POST" class="row g-3 bg-white mt-2" methode="POST">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                    <div class="row d-flex">
                        <div class="mb-3 col-6">
                          <label for="exampleInputEmail1" class="form-label">ชื่อสินค้า</label>
                          <input type="text" name="product_name" value="{{$product_data -> product_name}}"  class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">จำนวน</label>
                            <input type="text"  name="product_amount" value="{{number_format($product_data -> product_amount)}}" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">

                          </div>
                    </div>
                    <div class="row d-flex">
                        <div class="mb-3 col-6">
                          <label for="exampleInputEmail1" class="form-label">ราคาสินค้า</label>
                          <input type="text" name="product_price" value="{{number_format($product_data -> product_price)}}"  class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">ประเภทสินค้า</label>
                            <p>{{$product_data ->ProductType -> product_type_name }}</p>

                        </div>
                        <input type="hidden" value="" name="id">

                    </div>
                    <div class="row d-flex  justify-content-center">
                        <div class="mb-3 col-6">
                          <label for="exampleInputEmail1" class="form-label">รายละเอียดของสินค้า</label>
                          <textarea type="text" name="product_detail" value="{{$product_data -> product_detail }}" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>

                        </div>

                    </div>
                    <div class="row d-flex  justify-content-center">
                        <div class="mb-3 col-6">
                          <label for="exampleInputEmail1" class="form-label">ชื่อร้านค้า</label>

                          <input type="text" name="product_price" value="{{$product_data -> market -> market_name}}"  class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                          {{-- <p class="">{{$product_data -> market ->market_name}}</p> --}}

                        </div>

                    </div>
                    <div class="row d-flex  justify-content-center">


                    </div>


                      </div>
                    </form>

                    </div>

                </div>
            </div>
        </div>
      </div>
  </div>



@endsection
