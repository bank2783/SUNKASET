@extends('layouts.app')
@section('content')

@include('layouts.header_menu')

<div class="container fluid">
    <div class="row mt-2 d-flex justify-content-center">
      <div class="col-sm-2">
          <div class="container fluid">
              <div class="row ">
                  <div class="col" width="30">
                      <!-- รูป -->
                      <img src="{{asset('storage/images/profiles/'.$user_data->image)}}" style="width: 50px;" class="rounded-circle" alt="Cinque Terre">
                  </div>
                  <div class="col mt-3  ">
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
        <p class="fw-bold text-center">รายการพรีออเดอร์ของฉัน</p>

    
            
        <div style="background-color: #ffffff;" class="row border rounded-1">
                
                </div>
                <div class="row bg-success text-white mt-3 ">
                    <div class="col-1 col-md-2  text-center">
                        รูปสินค้า
                    </div>
                    <div class="col-4 col-md-4 text-start">
                        ชื่อสินค้า
                    </div>

                    
                    <div class="col-2 col-md-2  text-center">
                        ราคา
                    </div>
                    <div class="col-2 col-md-2  text-center">
                        จำนวน
                    </div>
                    <div class="col-2 col-md-2  text-center">
                        สถานะ
                    </div>
                    
             
            </div>
            
        
            @foreach ($order_confirm as $row )

                <div class="row bg-white">
                    <div class="col-12 col-sm-2 px-1 py-1 d-flex justify-content-center">
                        <img class="rounded-1 shadow-sm" src="{{asset('storage/images/products/'.$row->product_img)}}"  style="height: 80px;width: 80px;" >
                    </div>
                    <div class="col-12 col-sm-4">
                        {{$row->product_front_descript}}
                    </div>
                    <div class="col-12 col-sm-2 fw-bold d-flex justify-content-center align-items-center">
                        {{$row->total_price}} .-
                    </div>
                    <div class="col-12 col-sm-2 fw-bold d-flex justify-content-center align-items-center">
                        {{$row->product_amount}}
                    </div>

                    @php
                        $id_encrypt = Crypt::encrypt($row->id)
                    @endphp
                    
                    <div class="col-12 col-sm-2 d-flex justify-content-center align-items-center">
                        <a href="{{route('show.product.insert.payment',$id_encrypt)}}" class="nav-link text-primary" >ชำระเงิน</a>
                    </div>
                    {{-- <div class="col-1 text-danger d-flex justify-content-center align-items-center">
                        <a href="{{route('user.delete.preorder.list',$row->id)}}" class="nav-link">ลบ</a>
                    </div> --}}

                </div> 
                    <div class="row bg-white border rounded-1">
                        <div class="col-6 col-xl-10 col-md-8 d-flex justify-content-end align-items-center">
                            {{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
                        </div>
                        <div class="col-6 col-xl-2 col-md-4 d-flex justify-content-end align-items-center">
                             {{$row->created_at}}
                        </div>
                    </div>
                
            
            @endforeach
            <div class="row mt-2">
                <div class="col-md-12 col-12">
                    {!!$order_confirm -> links()!!}
                </div>
            </div>
           
            

      </div>

            <div class="row">
                <div class="col-md-12 col-12">
                        {{-- รอใส่ Line QR code --}}
                </div>
            </div>
            </div>
      </div>



  </div>
  </div>

@include('layouts.footer');

@endsection
