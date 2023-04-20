@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

<div class="row p-1 mt-4 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">จัดการสินค้าพรีออร์เดอร์</p>
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
                        <th scope="col">ID</th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ราคาสินค้า</th>
                        <th scope="col">จำนวนสินค้า</th>
                        <th scope="col">เปิด</th>
                        <th scope="col">ปิด</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pre_data as $row )


                      <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->pre_name}}</td>
                        <td>{{number_format($row->pre_price)}}</td>
                        <td>{{number_format($row->pre_amount)}}</td>
                        <td><a href="{{route('Preorder.update.on',$row->id)}}"><button type="button" class="btn btn-success"
                            @if($row->pre_status == 'on')
                                @disabled(true)
                            @else
                                @disabled(false)
                            @endif
                            >
                        เปิด</button></a></td>
                        <td><a href="{{route('Preorder.update.off',$row->id)}}"><button type="button" class="btn btn-secondary"
                            @if($row->pre_status == 'off')
                                @disabled(true)
                            @else
                                @disabled(false)
                            @endif
                            >ปิด</button></a></td>
                        <td><a href="{{route('Preorder.update.form',$row->id)}}"><button type="button" class="btn btn-warning">แก้ไข</button></a></td>
                        <td><a href="{{route('Preorder.update.delete',$row->id)}}"><button type="button" class="btn btn-danger">ลบ</button></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {!!$pre_data->links()!!}
            </div>
              {{-- {!!$products->links()!!} --}}
        </div>
      </div>
  </div>



@endsection
