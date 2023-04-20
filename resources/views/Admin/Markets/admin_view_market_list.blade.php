@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')
<div class="row mt-4 p-1 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">รายละเอียดของสมาชิกในระบบ</p>
    </div>
</div>

    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >
                  <div class="col" width="30">

                  </div>

              </div>
              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10 mt-4" style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
            <table class="table bg-white">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ชื่อร้านค้า</th>

                    <th scope="col">รายละเอียด</th>
                    <th scope="col">แก้ไข</th>
                    <th scope="col">ลบ</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($market_data as $row )
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->market_name}}</td>

                        <td><a href="{{route('admin.view.market.Detail',$row->id)}}">รายละเอียด</a></td>
                        <td><a href="{{route('admin.market.edit.form',$row->id)}}" class="btn btn-warning">แก้ไข</a></td>
                        <td><a href="{{route('admin.delete.market',$row->id)}}" class="btn btn-danger">ลบ</a></td>
                      </tr>
                    @endforeach


                </tbody>
              </table>
              {!!$market_data -> links()!!}
        </div>
      </div>
  </div>



@endsection
