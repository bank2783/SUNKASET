@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

<div class="row p-1 mt-4 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">รายการร้านค้าขอลงทะเบียน</p>
    </div>
</div>

    <div class="row">
      <div class="col-sm-2 ">
          <div class="container" >

              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10 mt-4 " style=" height:550px;">
            <div class="container  " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">
                    <table class="table bg-white ">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col"></th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">ผู้ซื้อ</th>
                            <th scope="col">ชื่อร้านค้า</th>
                            <th scope="col">วัน/เดือน/ปี</th>
                          </tr>
                          @foreach($sold_his as $row)
                          <tr >
                            <th>
                                <div>
                                    <p class="d-flex align-items-center my-5">
                                        {{$row->id}}
                                    </p>
                                </div>
                            </th>
                            <td >
                                <img src="{{asset('storage/images/products/'.$row->product_image)}}" class="rounded-1 my-2 " alt="..." style="height:100px;width:150px;">
                            </td>

                            <td>
                                <div class="">
                                    <p class="d-flex align-items-center my-5">{{$row->product_name}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <p class="d-flex align-items-center my-5 fw-bold">{{$row->product_mount}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <p class="d-flex align-items-center my-5 fw-bold">{{number_format($row->product_price)}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <p class="d-flex align-items-center my-5 fw-bold">{{$row->user->first_name}}</p>
                                </div>
                            </td>

                            <td>
                                <div class="">
                                    <p class="d-flex align-items-center my-5 fw-bold">{{$row->market->market_name}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <p class="d-flex align-items-center my-5 fw-bold">{{$row->created_at}}</p>
                                </div>
                            </td>



                          </tr>

                          @endforeach
                        </thead>

                      </table>
                      {!!$sold_his->links()!!}
                  </div>
              </div>
            </div>


        </div>
      </div>
  </div>



@endsection
