@extends('layouts.app')
@section('content')

@include('layouts.admin_header_bar')


    <div class="row " style="background-color:#343a40">
      <div class="col-sm-2 border-end border-secondary">
          <div class="container" >

              <div class="row">
                  <div class="col">
                    @include('layouts.admin_list')
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10" style=" height:auto;">

            <table class="table bg-white mt-3 rounded-2">
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
                    <td>
                    <form action="{{route('admin.market.no_approved',$row->id)}}">
                        <button class="btn btn-danger" type="submit" name="no_approved_bt" value="no_approved">ไม่อนุมัติ</button>
                    </form>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
              {!!$market_register->links()!!}
        </div>
      </div>
  </div>



@endsection
