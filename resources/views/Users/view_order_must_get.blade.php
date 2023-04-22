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
                    <div class="col-1 col-xl-1 text-center">
                        รูปสินค้า
                    </div>
                    <div class="col-4 col-xl-4 text-start">
                        ชื่อสินค้า
                    </div>

                    
                    <div class="col-2 col-xl-2 text-center">
                        ราคา
                    </div>
                    <div class="col-2 col-xl-2 text-center">
                        จำนวน
                    </div>
                    <div class="col-2 col-xl-2 text-center">
                        สถานะ
                    </div>
                    <div class="col-1 col-xl-1 text-center">
                        ลบ
                    </div>
             
            </div>
            
        
            @foreach ($preorder_list_data as $row )

                <div class="row bg-white">
                    <div class="col-12 d-flex justify-content-center col-xl-1 px-1 py-1">
                        <img class="rounded-1 shadow-sm" src="{{asset('storage/images/preorders/'.$row->pre_list_image)}}"  style="height: 80px;width: 80px;" >
                    </div>
                    <div class="col-12 col-xl-4">
                        {{$row->pre_list_name}}
                    </div>
                    <div class="col-12 col-xl-2 fw-bold d-flex justify-content-center align-items-center" style="color: #FF6600">
                        {{$row->pre_list_price}} .-
                    </div>
                    <div class="col-12 col-xl-2 fw-bold d-flex justify-content-center align-items-center">
                        {{$row->pre_list_amount}}
                    </div>
                    <div class="col-12 col-xl-2 d-flex justify-content-center align-items-center">
                        ชำระเงินเสร็จสิ้น
                    </div>
                    <div class="col-12 col-xl-1 text-danger d-flex justify-content-center align-items-center">
                        <a href="{{route('user.delete.preorder.list',$row->id)}}" class="nav-link">ลบ</a>
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
            {!!$preorder_list_data -> links()!!}

      </div>


            </div>
      </div>



  </div>
  </div>

@include('layouts.footer');

@endsection
