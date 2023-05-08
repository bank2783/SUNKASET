@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')




    <div class="row " style="background-color:#343a40">
      <div class="col-sm-2 border-end border-secondary">
          <div class="container" >
              <div class="row " >


              </div>
              <div class="row ">
                  <div class="col">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10" style="height:auto;">

            <table class="table bg-white rounded-2 mt-3">
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
                    <td>{{number_format($row->product_price)}}</td>
                    <td>{{number_format($row->product_amount)}}</td>
                    <td>{{$row->market->market_name}}</td>
                    <td>
                        <form action="{{route('admin.warehouse.product.sell.add-front-description.insert')}}" method="POST">
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
              {!!$warehouse->links()!!}
        </div>
      </div>
  </div>



@endsection
