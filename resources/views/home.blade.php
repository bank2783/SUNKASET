@extends('layouts.app')
@section('content')
@include('layouts.header_baner');
@include('layouts.header_menu');



<div class="container-fluid">

    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($products as $row )

            <div class="col-md-1 col-xl-3 d-flex bg-white mt-2 shadow-sm mx-1 image-card-out" style="width:260px;max-height:450px;">
                <a href="{{route('product.view',$row->id)}}" class="nav-link col">

                    <img src="{{asset('storage/images/products/'.$row->product_img)}}" class="product-img" alt="..." style="height:300px;width:100%">
                    <div class="mx-2 mt-1" style="height: 70px;">
                      <p class="card-text">{{Str::limit($row->product_name)}}</p>
                    </div>
                    <div style="background-color:#ffffff    ;" class="d-flex justify-content-center" >
                        <p class="fs-5 mt-3" style="color:#be0d0d ; height:20px;">฿{{$row->product_price}} .-</p>
                    </div>
                    <div class="col">
                        <span class="ms-1 text-secondary">ผู้ขาย: {{Str::limit($row -> market -> market_name,20)}}</span>
                    </div>

                </a>
            </div>

        @endforeach
    </div>
    {!!$products->links()!!}

    </div>
</div>

@include('layouts.footer');

@endsection

<style>
    @media (max-width:767px){
        .image-card-out{
            max-height: 250px;
            max-width: 185px;
        }
        .product-img{
            max-height: 185px;
        }


    }
</style>
