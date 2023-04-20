@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

<div class="row mt-4 p-1 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">รายชื่อสมาชิกในระบบ</p>
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
                    <th scope="col">ชื่อจริง</th>
                    <th scope="col">นามสกุล</th>
                    <th scope="col">เบอร์โทร</th>
                    <th scope="col">รายละเอียด</th>
                    <th scope="col">แก้ไข</th>
                    <th scope="col">ลบ</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($user_data as $row )
                  <tr>
                    <th scope="row">{{$row -> id}}</th>
                    <td>{{$row->first_name}}</td>
                    <td>{{$row->last_name}}</td>
                    <td>{{$row->tel}}</td>
                    <td><a href="{{route('admin.view.user.detail',$row->id)}}">ดูรายละเอียด</a></td>
                    <td><a class="btn btn-warning" href="{{route('Admin.show.form.edit.user',$row->id)}}">แก้ไข</a></td>
                    <td><a class="btn btn-danger" href="{{route('admin.delete.user',$row->id)}}">ลบ</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {!!$user_data -> links()!!}
        </div>
      </div>
  </div>



@endsection
