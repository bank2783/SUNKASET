@extends('layouts.app')
@section('content')

@include('layouts.admin_header_bar')

<div class="row mt-4  p-1 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">รายการร้านค้าขอลงทะเบียน</p>
    </div>
</div>
    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >

              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list')
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10 mt-4  " style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
            <table class="table bg-light">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ชื่อร้าน</th>
                    <th scope="col">ที่อยู่</th>

                    <th scope="col">รายละเอียด</th>
                    <th scope="col">อนุมัติ</th>
                    <th scope="col">ไม่อนุมัติ</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach($market_register as $row)
                  <tr>
                    <th scope="row">{{$row->id}}</th>
                    <td>{{$row->market_name}}</td>
                    <td>{{$row->market_address}}</td>

                    <td><a href="{{route('view.market.wait.detail',$row->id)}}" class="">รายละเอียด</a></td>
                    <td>
                        <form action="{{route('admin.market.approved',$row->id)}}">
                            <button class="btn btn-success" type="submit" name="approved_bt" value="approved">อนุมัติ</button>
                        </form>
                    </td>
                    <td><form action="{{route('admin.market.no_approved',$row->id)}}">
                        <button class="btn btn-danger" type="submit" name="no_approved_bt" value="no_approved">ไม่อนุมัติ</button>
                    </form></td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
              {!!$market_register->links()!!}
        </div>
      </div>
  </div>



@endsection
