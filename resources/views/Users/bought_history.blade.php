@extends('layouts.app')
@section('content')

@include('layouts.header_menu');

<div class="container fluid">
    <div class="row mt-2 d-flex justify-content-center">
      <div class="col-sm-2">
          <div class="container fluid mt-2">
              <div class="row mt-2 ">
                  <div class="col" width="30">
                      <!-- รูป -->
                      <img src="{{asset('storage/images/profiles/'.$user_data->image)}}" style="width: 50px;" class="rounded-circle" alt="Cinque Terre">
                  </div>
                  <div class="col mt-3 ">
                      <p class="fw-bold text-break">{{$user_data -> first_name}}</p>
                  </div>
              </div>
              <div class="row ">
                  <div class="col mt-3">
                    <profile-menu-list></profile-menu-list>
                  </div>

              </div>

          </div>
      </div>
      <div class="col-10" >
        <div class="container mt-4">
            <div class="d-flex p-2 bd-highlight  bg-white text-dark rounded-1  align-items-center shadow-sm" style="height: 70px;">
              <div class=" mx-1 text-center" style="width:100px;">สินค้า</div>
              <div class="container ">
              <div class="row  justify-content-end">
                <div class="col-6  text-center ">

                </div>
                <div class="col-2 text-center ">
                ราคา
                </div>
                <div class="col-2 text-center  ">
                  จำนวน
                </div>
                <div class="col-2 text-center ">
                  วันที่และเวลา
                </div>
              </div>
            </div>
            </div>
            </div>

            @if(empty($sold_histories))



        <div class="container mt-1">
            <div class=" d-flex p-2 mt-1 bd-highlight justify-content-center  bg-white text-dark rounded-1  align-items-center shadow-sm" style="height: 150px;">
                <p class="text-center">ไม่มีสินค้าในตระกร้า เลือกดูสินค้าอื่น ๆ <a href="{{'home'}}" class="nav-link "> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg></a></p>



        </div>
        </div>
        @else

        <div  class="container mt-1">
            @foreach ($sold_histories as $row )

            <div class=" d-flex p-2 mt-1 bd-highlight  bg-white text-dark rounded-1  align-items-center shadow-sm" style="height: 150px;">
              <div class="p-2 mx-1  bd-highlight ">
                  <img src="{{asset('storage/images/products/'.$row->product_image)}}"  style="height: 70px;width: 70px;" >
            </div>


              <div class="container ">
          <div class="row justify-content-start">
            <div class="col-6 text-center ">
                <p class="text-break">{{$row->product_name}}</p>
            </div>
            <div class="col-6 text-center  align">

            </div>
            </div>
        </div>
        <div class="container ">
          <div class="row justify-content-end">
            <div class="col-4 text-center ">
                <p style="color: #FF4600" class="text-break">{{number_format($row->product_price)}} .-</p>
            </div>
            <div class="col-4 text-center align">
                <p>{{$row->product_mount}}</p>
            </div>
            <div class="col-4 text-center align">
                <p>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</p>
            </div>


        </div>

        </div>



            </div>
            <div class="container">
            <div class="row bg-white border rounded-1">
                <div class="col d-flex justify-content-end mt-3">
                    <p>{{$row->created_at}}</p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="mt-2">
            {!!$sold_histories -> links()!!}
        </div>
        </div>

        @endif

    </div>
      </div>
    </div>
</div>

@include('layouts.footer');

@endsection
