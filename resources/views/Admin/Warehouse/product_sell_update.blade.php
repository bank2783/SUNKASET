@extends('layouts.app')
@section('content')



<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ชื่อสินค้า</th>
            <th scope="col">รายละเอียด</th>
            <th scope="col">ราคา</th>
            <th scope="col">จำนวน</th>
            <th scope="col">ชื่อร้านค้า</th>
            <th scope="col">Action 1</th>
            <th scope="col">Action 2</th>

          </tr>
        </thead>
        <tbody>
            @foreach($warehouse as $row)
          <tr>
            <th scope="row">{{$row->id}}</th>
            <td>{{$row->product_name}}</td>
            <td>{{$row->product_detail}}</td>
            <td>{{$row->product_price}}</td>
            <td>{{$row->product_amount}}</td>
            <td>{{$row->market->market_name}}</td>
            <td>
                <form action="{{route('admin.warehouse.product.sell.add-front-description.from')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <input type="hidden" name="product_id" value="{{$row->id}}">
                    <button class="btn btn-success" type="submit"
                        @if ($row->product_status == 'selling')
                            @disabled(true)
                        @else
                            @disabled(false)
                        @endif
                        >
                        @if($row->product_status == 'selling')
                            กำลังขาย
                        @else
                            ขาย
                        @endif
                    </button>
                </form>
            </td>
            <td>
                <form action="{{route('admin.warehouse.product.cancel')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <input type="hidden" name="product_id" value="{{$row->id}}">
                    <button class="btn btn-secondary" type="submit"
                    @if ($row->product_status == 'wait')
                        @disabled(true)
                    @else
                        @disabled(false)
                    @endif
                    >
                    ยกเลิก</button>
                </form>
            </td>


          </tr>
          @endforeach
        </tbody>
      </table>
</div>


@endsection
