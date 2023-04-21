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
                
                @if(empty($transport_data))
                    <div class="col-6">
                    <a class="nav-link" href="{{route('add.address.form')}}">
                        <div style=" width:75px;height:40px;" class="rounded-2 d-flex mx-2">
                            <p style="color: #807f7f"  class="mt-2 fw-bold">+เพิ่มที่อยู่</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 mt-3">
                    <p>ยังไม่ได้เพิ่มที่อยู่สำหรับการจัดส่ง</p>
                </div>
                    
                @else
                
                    <div class="col-sm-2 col-12 mx-1 d-flex justify-content-center">
                        {{$transport_data -> first_name}} {{$transport_data -> last_name}}
                    </div>
                    <div class="col-sm-7 col-12 mt-0">
                        {{$transport_data->address}} รหัสไปรษณีย์ {{$transport_data->postal_code}} เบอร์โทรศัพท์ {{$transport_data->phone_number}}
                    </div>
                    <div class="col-sm-2 col-12 d-flex justify-content-center">
                        <a style="text-decoration-line: none;" href="{{route('show.edit.address.form')}}" >เปลี่ยนที่อยู่</a>
                    </div>
               
                   @endif
                
                </div>
                <div class="row bg-success text-white mt-3 ">
                    <div class="col-1  text-center">
                        รูปสินค้า
                    </div>
                    <div class="col-4 text-start">
                        ชื่อสินค้า
                    </div>

                    
                    <div class="col-2  text-center">
                        ราคา
                    </div>
                    <div class="col-2  text-center">
                        จำนวน
                    </div>
                    <div class="col-2  text-center">
                        ชำระเงิน
                    </div>
                    <div class="col-1  text-center">
                        ลบ
                    </div>
             
            </div>
            
        
            @foreach ($pre_list_data as $row )

                <div class="row bg-white">
                    <div class="col-1 px-1 py-1">
                        <img class="rounded-1 shadow-sm" src="{{asset('storage/images/preorders/'.$row->pre_list_image)}}"  style="height: 80px;width: 80px;" >
                    </div>
                    <div class="col-4">
                        {{$row->pre_list_name}}
                    </div>
                    <div class="col-2 fw-bold d-flex justify-content-center align-items-center" style="color: #FF6600">
                        {{$row->pre_list_price}} .-
                    </div>
                    <div class="col-2 fw-bold d-flex justify-content-center align-items-center">
                        {{$row->pre_list_amount}}
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <a style="text-decoration-line: none;" href="{{route('show.payment.method',$row->id)}}">ชำระเงิน</a>
                    </div>
                    <div class="col-1 text-danger d-flex justify-content-center align-items-center">
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
            {!!$pre_list_data -> links()!!}

      </div>


            </div>
      </div>



  </div>
  </div>

@include('layouts.footer');

@endsection
