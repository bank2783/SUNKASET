@extends('layouts.app')
@section('content')

@include('layouts.header_menu');

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

        <div class="container  mt-5">
            <div class="container ">
                <div style="background-color: #ffffff;height:120px;" class="d-flex  align-items-center rounded-1">
                    @if(empty($transport_data))
                    <div class="col-3">
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

                    <div class="col-2  mx-3 d-flex justify-content-start">
                        {{$transport_data -> first_name}} {{$transport_data -> last_name}}
                    </div>
                    <div class="col-9 mt-0">
                        {{$transport_data->address}} รหัสไปรษณีย์ {{$transport_data->postal_code}} เบอร์โทรศัพท์ {{$transport_data->phone_number}}
                    </div>
                    <div class="col-1 mt-3 d-flex  justify-content-end">
                        <p  class="me-5"><a style="text-decoration-line: none;" href="{{route('show.select.address')}}" >เปลี่ยน</a></p>
                    </div>
                   @endif
                </div>

            </div>




            <div class="container mt-2">
            <div class="d-flex p-2 bd-highlight  bg-white text-dark rounded-1  align-items-center shadow-sm" style="height: 70px;">
              <div class=" fs-5 mx-1 text-center" style="width:100px;">สินค้า</div>
              <div class="container ">
              <div class="row fs-5 mt-3">
                <div class="col-4 text-center ">

                </div>
                <div class="col-2 text-center ">
                ราคา
                </div>
                <div class="col-2 text-center  ">
                  จำนวน
                </div>
                <div class="col-2 text-center  ">
                    <p>การชำระเงิน</p>
                  </div>
                <div class="col-2 text-center  ">
                  ลบ
                </div>
              </div>
            </div>
            </div>
            </div>
            @foreach ($pre_list_data as $row )


            <div  class="container   mt-2 ">
                <div class=" d-flex p-2 bd-highlight  bg-white text-dark rounded-1  align-items-center shadow-sm" style="height: 150px;">
                  <div class="p-2 mx-1  bd-highlight ">
                      <img class="rounded-1 shadow-sm" src="{{asset('storage/images/preorders/'.$row->pre_list_image)}}"  style="height: 80px;width: 80px;" >
                  </div>
                  <div class="container">
                    <div class="row d-flex">
                        <div class="col-4 mt-2 ">
                            {{$row->pre_list_name}}
                        </div>
                        <div class="col-2 ">
                            <p style="color: #FF4600" class="fw-bold text-center">{{$row->pre_list_price}} .-</p>
                        </div>
                        <div class="col-2 ">
                            <p  class="fw-bold text-center">{{$row->pre_list_amount}}</p>
                        </div>
                        <div class="col-2 ">
                            <p  class=" text-center"><a style="text-decoration-line: none;" href="{{route('show.payment.method',$row->id)}}">ชำระเงิน</a></p>
                        </div>
                        <div class="col-2 ">
                            <p  class="fw-bold text-center text-danger"><a href="{{route('user.delete.preorder.list',$row->id)}}" class="nav-link">ลบ</a></p>
                        </div>
                    </div>


                  </div>



                </div>
                <div class="container">
                    <div class="row bg-white border rounded-1">
                        <div class="col d-flex justify-content-end mt-3">
                            <p>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</p>
                        </div>
                        <div class="col-2 d-flex justify-content-end  mt-3">
                            <p class="">{{$row->created_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

      </div>


            </div>
      </div>



  </div>
  </div>

@include('layouts.footer');

@endsection
