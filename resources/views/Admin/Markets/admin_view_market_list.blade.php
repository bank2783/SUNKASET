@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')


    <div class="row " style="background-color:#343a40">
      <div class="col-sm-2 border-end border-secondary">
          <div class="container" >
              <div class="row " >
                  <div class="col" width="30">

                  </div>

              </div>
              <div class="row ">
                  <div class="col">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10" style=" height:autopx;">
            <div class="container text-center mt-3">

            </div>
            <table class="table bg-white rounded-2">
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
