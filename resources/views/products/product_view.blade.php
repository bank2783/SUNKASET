@extends('layouts.app')
@section('content')
@include('layouts.header_menu');

<product-view @if(Auth::check())
    value="{{Auth::user()->id}}"
    @else
    value="0"
    @endif
    id="{{request()->route('id');}}"></product-view>







    <div class="container">
        <div class="row mt-3 bg-white">
            <div class="col-4 col-xl-1 col-md-2 mt-2 p-4">
                <img style="height: 70px;" src="{{asset('storage/images/marketprofile/'.$product_data -> market -> market_image )}}" class="rounded-circle" alt="Cinque Terre">
            </div>
            <div class="col-8 col-xl-10 col-md-10 mt-3 p-4">
                <p class=" fs-5 mt-3">{{$product_data -> market -> market_name}}</p>
            </div>
        </div>

    </div>

    <div class="container bg-light mt-2">
        <div style="height:300px;" class="col-sm-12">
            <p class="fs-4">รายละเอียดสินค้า</p>
            <p class="text-break fs-6 ">{{$product_data -> product_detail}}</p>
            <p></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row mt-2">
                    <div class="col-12 bg-white rounded-1">
                        <p class="mt-3 fs-5">รีวิวสินค้า</p>
                    </div>
                    @if($check_sold_his)

                    <div class="col-12 bg-white rounded-1">

                          <div class="mb-3">
                            <form action="{{route('insert.feedback')}}" methode="get">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                            <label for="exampleFormControlTextarea1" class="form-label">เขียนรีวิว</label>
                             <input type="hidden" name="product_id" value="{{$product_data -> id}}">
                            <textarea name="feedback_text" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3"></textarea>

                            <button type="submit" class="btn mt-2 rounded-0 btn-success">รีวิว</button>
                        </form>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container rounded-1 p-3 bg-white mt-2">
        @foreach ($feed_back as $row )
        <div class="row mt-1  ">
            <div class="col-1 ">
                <img style="height: 50px;" src="{{asset('storage/images/profiles/'.$row->user_image)}}" class="rounded-circle" alt="Cinque Terre">

            </div>
            <div class="col-2 ">
                <p class="mt-3">{{$row->user_name}}</p>

            </div>

        </div>
        <div class="row border-bottom">
            <div class="col-1 ">

            </div>
            <div class="col-11 ">
                <p>{{$row->feed_back_text}}</p>
            </div>
        </div>
        @endforeach
        <div class="container mt-5">
        {!!$feed_back -> links()!!}
    </div>
    </div>

@include('layouts.footer');

@endsection
