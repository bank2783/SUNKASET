@extends('layouts.app')
@section('content')
@include('layouts.header_baner');
@include('layouts.header_menu');



<div class="container">

    <div class="d-flex flex-wrap justify-content-start">
        @foreach ($products as $row )
        <a href="{{url('preorders/product/view/'.$row->id)}}" class="nav-link">
            <div class="flex" style="padding:3px;">
                <div class="card rounded-0 shadow-sm" style="width:209px;height:298px;">
                    <img src="{{asset('storage/images/products/'.$row->pre_image)}}" class="card-img-top rounded-0" alt="..." style="height:170px;">
                    <div class="mx-2 mt-1" style="height: 70px;">
                      <p class="card-text">{{Str::limit($row->pre_name)}}</p>
                    </div>
                    <div style="background-color:#ecedef;" class="d-flex rounded-0  justify-content-center" >
                        <p class="fs-5 mt-3 fw-bold" style="color:#1e3b37 ; height:20px;">{{$row->pre_price}} .-</p>
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

