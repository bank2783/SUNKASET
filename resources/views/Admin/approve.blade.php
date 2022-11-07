@extends('layouts.app')
@section('content')

<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ชื่อร้าน</th>
            <th scope="col">ที่อยู่</th>
            <th scope="col">เจ้าของร้าน</th>
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
            <td>{{$row->user->first_name}}</td>
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
</div>


@endsection
