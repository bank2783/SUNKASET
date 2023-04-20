@extends('layouts.app')
@section('content')
@include('layouts.header_menu')

<div class="container mt-5">

        <div style="background-color: #ffffff;height:auto;" class="d-flex  align-items-center rounded-1 border border-success">
            @if(empty($transport_data))
            <div class="col-3">
            <a class="nav-link" href="{{route('add.address.form')}}">
                <div style=" width:80px;height:50px;" class="rounded-2 d-flex mx-2">
                    <p style="color: #807f7f"  class="mt-2 fw-bold">+เพิ่มที่อยู่</p>

                </div>
            </a>
        </div>
        <div class="col-6 mt-3">
            <p>ยังไม่ได้เพิ่มที่อยู่สำหรับการจัดส่ง</p>
        </div>
            @else

            <div class="col-2 mx-2 d-flex justify-content-start "  >
                {{$transport_data -> first_name}} {{$transport_data -> last_name}}
            </div>
            <div class="col-6">
                {{$transport_data->address}} รหัสไปรษณีย์ {{$transport_data->postal_code}} เบอร์โทรศัพท์ {{$transport_data->phone_number}}
            </div>
            <div class="col-3 mt-3 d-flex  justify-content-end">
                <p  class="me-3"><a style="text-decoration-line: none;" href="{{route('show.edit.address.form')}}" >เปลี่ยน</a></p>
            </div>
           @endif


    </div>
    </div>

    <div class="container mt-2">
        <div class="container bg-success">
            <div class="row">
                <div class="col-xl-1 col-2 border text-center text-white">

                    รูปสินค้า
                </div>
                <div class="col-xl-3 col-3 text-center border text-white">
                    ชื่อสินค้า
                </div>
                <div class="col-xl-2 col-1 text-center border text-white">

                </div>
                <div class="col-xl-2 col-2 text-center border text-white">
                    ราคา
                </div>
                <div class="col-xl-2 col-2 text-center border text-white">
                    จำนวน
                </div>
                <div class="col-xl-2 col-2 text-center border text-white">


                    ลบ
                </div>
            </div>
        </div>
    </div>
    @if($sum_total_price == 0)

        <div class="container mt-1">
            <div class=" d-flex p-2 mt-1 bd-highlight justify-content-center  bg-white text-dark rounded-1  align-items-center shadow-sm" style="height: 150px;">
                <p class="text-center">ไม่มีสินค้าในตระกร้า เลือกดูสินค้าอื่น ๆ <a href="{{'home'}}" class="nav-link "> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg></a></p>



        </div>
        </div>


    @else

    <div  class="container mt-1">
        <div class="container">
        @foreach ($user_cart_data as $row )

            <div class="row mt-1 bd-highlight  bg-white text-dark  border-bottom border-success shadow-sm">
                <div class="col-xl-1 col-md-2 d-flex p-2 mt-1 d-flex justify-content-center align-items-center">

                    <img src="{{asset('storage/images/products/'.$row->product_img)}}"  style="height: 70px;width: 70px;" >
                </div>

                <div class="col-xl-3  col-md-3 text-break my-4">
                    {{$row->product_front_descript}}
                </div>

                <div class="col-xl-2  col-md-1">

                </div>
                <div class="col-xl-2  col-md-2 col-4 d-flex justify-content-center text-secondary fw-bold align-items-center" >
                    {{$row->total_price}} .-
                </div>
                <div class="col-xl-2  col-md-2 col-4 d-flex justify-content-center align-items-center ">
                    {{$row->product_amount}} ชิ้น
                </div>
                <div class="col-xl-2  col-md-2 col-4 d-flex justify-content-center align-items-center my-5">
                    @php
                        $cart_id_encrypt = Crypt::encrypt($row->id);
                    @endphp
                    <button class="btn btn-secondary rounded-1"><a href="{{url('cart/cancle-product-in-cart/'.$cart_id_encrypt)}}" class="nav-link">ลบ</a></button>
                </div>




            </div>
        @endforeach
    </div>
</div>

    </div>
    @endif


    <div class="container mt-2">
      <div class="row d-flex p-2 bd-highlight  bg-white text-dark rounded-1 align-items-center shadow-sm">
      <div class="container">
    <div class="row justify-content-end align-items-center">

            <div class="col-xl-3  text-end text-secondary">
                กดสั่งซื้อเพื่อยืนยันคำสั่งซื้อสินค้าในตระกร้าด้านบน
            </div>
        <div class="col-xl-2 col-6 text-center">
            ราคารวม
          </div>
          <div class="col-xl-2 col-6 fw-bold d-flex justify-content-center align-items-center" >
            {{number_format($sum_total_price)}} .- บาท
          </div>
          <div class="col-xl-2 text-end  align-items-end ">
           <div class="d-grid gap-2">
           <button type="button" @if ($sum_total_price <= 0)
               disabled
           @endif  class="btn btn-dark rounded-0"><a class="nav-link" href="{{route('cart.update.products.confirme')}}" >สั่งซื้อ</a></button>
            </div>
          </div>
    </div>
      </div>
      </div>
    </div>
    @if(session()->has('message_success'))
    <div class="container">
        <div class="alert d-flex justify-content-center alert-success mt-5">
            {{ session()->get('message_success') }}
        </div>
    </div>
        @endif
    <div class="container">
        <div class="row d-flex justify-content-center p-2 bd-highlight mt-2 bg-white text-dark rounded-1 align-items-center shadow-sm">
            <div class="col-xl-2 col-12 d-flex justify-content-center">
                <p>ช่องทางการชำระเงิน</p>
            </div>
            <div class="col-xl-3 col-12 d-flex justify-content-center">
                <img style="height:150px;" src="{{asset('storage/images/asset/add-line-with-upload-qr-code-photo-04.jpg')}}">
            </div>
            <div class="col-xl-2 col-12 d-flex justify-content-center">
                <p>Lind ID: bank2783   </p>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
