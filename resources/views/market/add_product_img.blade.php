@extends('layouts.app')
@section('content')
@include('layouts.header_menu')

<div class="container mt-3 " >
    <div class="row ">
        @if($market === null)
        <div class="col-12 d-flex justify-content-center">
            <p class="fs-5">คุณยังไม่มีร้านค้า</p>

          </div>
          <div class="col-12 d-flex justify-content-center">

            <a href="{{url('/')}}" class="btn btn-success rounded-0">กลับไปที่หน้าแรก</a>
          </div>
    </div>
    @elseif($market->market_status == 'wait')
    <div class="col-12 d-flex justify-content-center">
        <p class="fs-5">ร้านค้าของคุณยังไม่ถูกอนุมัติ</p>

      </div>
      <div class="col-12 d-flex justify-content-center">

        <a href="{{url('/')}}" class="btn btn-success rounded-0">กลับไปที่หน้าแรก</a>
      </div>

      @else
    <div class="col-sm-2 ">

        <div class="container " >
            <div class="row " >
                <div class="col" width="30">
                <img src="{{asset('storage/images/marketprofile/'.$market->market_image)}}"  class="rounded-circle border shadow-sm" width="60" height="60" alt="...">
                </div>
                <div class="col mt-3 ">
                    <h6>{{$market->market_name}}</h6>
                </div>
            </div>
            <div class="row ">
                <div class="col mt-3 mt-5 ">
                    @include('layouts.market_menu')
                </div>
            </div>

        </div>
    </div>

    <div class="col-sm-10 border " style=" height:auto;">
          <div class="container text-center " style="background-color: #F0F0F0">
            <div class="row " style="background-color: #F0F0F0">
                <div class="col-sm-12 mt-3 bg-success text-white ">
                    <h1></h1>
                </div>
            </div>
            </div>

            <div class="container">
            <div class="container d-flex align-items-center text-center border mt-5 " style="background-color:rgb(160, 221, 155); height:50px;">
                <div class="col d-flex justify-content-center fs-5">เพิ่มรูปภาพสินค้า</div>
            </div>
        </div>

          <div class="container">
            <div class="mt-2 pt-2 pb-1" style="background-color:white">

                @if(empty($product_main_image->main_image) and empty($product_main_image->id) )
                <div class="col d-flex justify-content-center mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                      </svg>
                </div>
                <div class="col d-flex justify-content-center mt-5">
                    <p>ยังไม่มีรูปภาพหลัก</p>
                </div>

                @else
                <div class="col d-flex justify-content-center">
                    <img src="{{asset('storage/images/products/'.$product_main_image->main_image)}}" style="height: 400px; width:300px;">
                </div>
                @endif
              <div class="col d-flex justify-content-center mt-1 pt-2 pb-2">

                @php
                    if(!empty($product_main_image->id)){
                        $main_image_id_encrypt = Crypt::encrypt($product_main_image->id);
                    }
                    else{
                        $main_image_id_encrypt = 0;
                    }

                @endphp
                <button class="btn btn-danger rounded-0" @if($main_image_id_encrypt == 0) disabled @endif><a class="nav-link" href="{{url('user/market/delete/second-image/'.$main_image_id_encrypt)}} ">ลบรูปภาพหลัก</a></button>

              </div>
            </div>
          </div>
          <div class="container d-flex justify-content-center mt-5 border">




            @if(!empty($product_images))
                @foreach ($product_images as $row )

                <div class="row">

                    <div class="col border d-flex justify-content-center">
                    <img class="img-fluid " src="{{asset('storage/images/products/'.$row->image_name)}}" style="height: 170px; width:190px;">
                </div>
                <div class="border d-flex justify-content-center">
                    @php
                        $id_encrypt = Crypt::encrypt($row->id);
                    @endphp
                    <a href="{{url('user/market/delete/second-image/'.$id_encrypt)}}" class="btn btn-danger rounded-0 mt-2">ลบรูปภาพ</a>
                </div>

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





            <div class="container d-flex align-items-center text-center border mt-5 " style="background-color:rgb(160, 221, 155); height:50px;">
                <div class="col d-flex justify-content-center fs-5">เพิ่มรูปภาพสินค้า</div>
            </div>


            <div class="container border">

                <form action="{{url("user/market/add-product-main-image-form/insert")}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row d-flex  justify-content-center">
                        <div class="mb-3 col-6 mt-3">
                          <label for="exampleInputEmail1" class="form-label">รูปหลัก 1 รูปภาพ</label>
                          <input type="file" name="main_image"  class="form-control rounded-0 border border-success" id="exampleInputEmail1" aria-describedby="emailHelp" accept="image/*">
                          <div id="emailHelp" class="form-text">รูปนี้จะแสดงเป็นรูปหลักที่หน้าเว็บไซต์</div>
                        </div>
                    </div>

                    <input type="hidden" name="product_id" value="{{$product -> id}}">

                    <div class="row d-flex  justify-content-center">
                        <div class="mb-3 col-6 mt-3">

                          <button type="submit" class="btn btn-success rounded-0" style="width:100%">บันทึกรูปภาพ</button>

                        </div>
                    </div>
                </form>
                <form action="{{url("user/marget/add-product-images-form/insert")}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row d-flex  justify-content-center">
                        <div class="mb-3 col-6 mt-3">
                          <label for="exampleInputEmail1" class="form-label">รูปเพิ่มเติมจำนวน 4 รูปภาพ</label>
                          <input type="file" name="images[]"  class="form-control rounded-0 border border-success" id="exampleInputEmail1" aria-describedby="emailHelp" multiple>
                          <div id="emailHelp" class="form-text">รูปสำหรับแสดงรูปภาพเพิ่มเติมของสินค้า</div>
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="{{$product -> id}}">

                    <div class="row d-flex  justify-content-center">
                        <div class="mb-3 col-6 mt-3">

                          <button type="submit" class="btn btn-success rounded-0" style="width:100%">บันทึกรูปภาพ</button>

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

     @endif
  </div>
</div>




@include('layouts.footer')
@endsection



