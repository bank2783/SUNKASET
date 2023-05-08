@extends('layouts.app')
@section('content')

@include('layouts.admin_header_bar')



    <div class="row " style="background-color:#343a40">
      <div class="col-sm-2 border-end border-secondary " >
          <div class="container" >


                  <div class="col">
                    @include('layouts.admin_list');
                  </div>

          </div>
      </div>
        <div class="col-sm-10" style=" height:auto;">

            <div class="container">
                <table class="table bg-white mt-2 rounded-2">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ราคารวม</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">Detail</th>
                        <th scope="col">สถานะ</th>

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
                        <td><button class="btn btn-primary" href="">@if ($row->pay_image == null )
                                                                        ยังไม่ได้แนบสลีป
                                                                    @else
                                                                        แนบลีปแล้ว
                                                                    @endif
                        </button>
                    </td>

                        <td><a class="btn btn-warning" href="{{route('Preoeder.List.Update.form',$row->id)}}">แก้ไข</a>
                        <a class="btn btn-danger mx-1" href="{{route('Preorder.List.Delete',$row->id)}}">ลบ</a>
                        </td>
                        <td><a href="{{route('Preorder.List.Sold.Finished',$row->id)}}" class="btn btn-success">สำเร็จคำสั่งซื้อ</a></td>
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
