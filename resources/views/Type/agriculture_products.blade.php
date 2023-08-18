@extends('layouts.app')
@section('content')
@include('layouts.header_baner');
@include('layouts.header_menu');



<div class="container">

    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($products as $row )
        <a href="{{route('product.view',$row->id)}}" class="nav-link">
            <div class="flex" style="padding:3px;">
                <div class="card rounded-2 shadow-sm border border-white" style="width:300px;height:450px;">
                    <img src="{{asset('storage/images/products/'.$row->product_img)}}" class="card-img-top rounded-top-2" alt="..." style="height:280px;">
                    <div class="mx-2 mt-1" style="height: 70px;">
                      <p class="card-text">{{Str::limit($row->product_name)}}</p>
                    </div>
                    <div style="background-color:#ffffff    ;" class="d-flex rounded-2  justify-content-center" >
                        <p class="fs-5 mt-3" style="color:#be0d0d ; height:20px;">฿{{$row->product_price}} .-</p>
                    </div>
                  </div>
            </div>
        </a>
        @endforeach
    </div>
    {!!$products->links()!!}

    </div>
</div>

@include('layouts.footer');

@endsection
