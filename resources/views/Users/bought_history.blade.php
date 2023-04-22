@extends('layouts.app')
@section('content')

@include('layouts.header_menu')

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
              <div class="row">
                  <div class="col mt-3">
                    <profile-menu-list></profile-menu-list>
                  </div>

              </div>

          </div>
      </div>
      <div class="col-10 mt-4" >
        <div class="row bg-success text-white mt-5">
            <div class="col-3 col-xl-2 text-center">
                รูปสินค้า
            </div>
            <div class="col-3 col-xl-4 text-start">
                ชื่อสินค้า
            </div>

            
            <div class="col-2 col-xl-2 text-center">
                ราคารวม
            </div>
            <div class="col-2 col-xl-2 text-center">
                จำนวน
            </div>
            <div class="col-2 col-xl-2 text-center">
                สถานะ
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

        
        @foreach ($sold_histories as $row )

        <div class="row border bg-white">
            <div class="col-xl-2 d-flex justify-content-center align-items-center">
                <img src="{{asset('storage/images/products/'.$row->product_image)}}" class="img-fluid py-1" alt="..." style="height:80px;width:90px;">
            </div>
            <div class="col-xl-4 d-flex align-items-center justify-content-center">
                {{$row->product_name}}
            </div>
            <div class="col-xl-2 d-flex align-items-center justify-content-center">
                {{$row->product_price}}
            </div>
            <div class="col-xl-2 text-center d-flex align-items-center justify-content-center">
                {{$row->product_mount}}
            </div>
            <div class="col-xl-2 text-center d-flex align-items-center justify-content-center">
                รอชำระเงิน
            </div>
        </div>
        <div class="row bg-white border rounded-1">
            <div class="col-6 col-md-10 d-flex justify-content-end align-items-center">
                {{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
            </div>
            <div class="col-6 col-md-2 d-flex justify-content-end align-items-center">
                 {{$row->created_at}}
            </div>
        </div>
           
        @endforeach
        <div class="mt-2">
            {!!$sold_histories -> links()!!}
        </div>
        

        @endif

    </div>
      </div>
    </div>
</div>

@include('layouts.footer');

@endsection
