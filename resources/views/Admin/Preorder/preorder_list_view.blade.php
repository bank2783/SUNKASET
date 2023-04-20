@extends('layouts.app')
@section('content')

@include('layouts.admin_header_bar')

<div class="row mt-4 p-1 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">รายการจองสินค้าพรีออเดอร์ในระบบ</p>
    </div>
</div>


    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >


              </div>
              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10 mt-4 " style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
            <div class="container">
                <table class="table bg-white">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ราคารวม</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">Detail</th>

                        <th scope="col">Action1</th>
                        <th scope="col">Action2</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($pre_list as $row )
                      <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->pre_list_name}}</td>
                        <td>{{number_format($row->pre_list_price)}}</td>
                        <td>{{number_format($row->pre_list_amount)}}</td>
                        <td><a href="{{route('Preorder.List.View.Detail',$row->id)}}">ดูรายละเอียด</a></td>
                        {{-- <td><button class="btn btn-primary" href="">@if ($row->pay_image == null )
                                                                        ยังไม่ได้แนบสลีป
                                                                    @else
                                                                        แนบลีปแล้ว
                                                                    @endif
                        </button>
                    </td> --}}
                        <td><a class="btn btn-warning" href="{{route('Preoeder.List.Update.form',$row->id)}}">แก้ไข</a>
                        <a class="btn btn-danger mx-1" href="{{route('Preorder.List.Delete',$row->id)}}">ลบ</a>
                        </td>
                        <td><a href="{{route('Preorder.List.Sold.Finished',$row->id)}}" class="btn btn-success">ยืนยันคำสั่งซื้อ</a></td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                  {!!$pre_list->links()!!}
            </div>
        </div>
      </div>
  </div>



@endsection
