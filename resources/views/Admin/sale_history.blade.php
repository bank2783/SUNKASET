@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

{{-- <div class="row p-1 mt-4 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">รายการร้านค้าขอลงทะเบียน</p>
    </div>
</div> --}}

    <div class="row" style="background-color:#343a40">
      <div class="col-sm-2 border-end border-secondary">
          <div class="container" >

              <div class="row">
                  <div class="col ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10 mt-4 " style=" height:auto;">

              <div class="row rounded-2 mx-2 " style="background-color: #ffffff">
                <div class="row ">
                    <div class="col-3 mt-3">
                        @php
                            $type = isset($type) ? $type : 'daily';
                        @endphp

                        <form action="{{route('Export.Excel.Sold-history',['type' => $type])}}" method="get">

                            <select class="form-select" name="type" id="type">

                                <option value="all" {{ $type == 'all' ? 'selected' : '' }}>All</option>
                                <option value="daily" {{ $type == 'daily' ? 'selected' : '' }}>Daily</option>
                                <option value="monthly" {{ $type == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                <option value="yearly" {{ $type == 'yearly' ? 'selected' : '' }}>Yearly</option>

                            </select>
                            <button type="submit" class="btn btn-primary mt-2"> Export Excel</button>
                        </form>
                    </div>

                </div>

                <div class="container">
                    <div class="col-sm-12 mt-3 border rounded-3 ">
                        <table class="table bg-white ">
                            <thead>
                              <tr class="text-center">
                                <th scope="col" class="border">ID</th>
                                <th scope="col" class="border">รูปสินค้า</th>
                                <th scope="col" class="border"> ชื่อสินค้า</th>
                                <th scope="col" class="border">จำนวน</th>
                                <th scope="col" class="border">ราคา</th>
                                <th scope="col" class="border">ผู้ซื้อ</th>
                                <th scope="col" class="border">ชื่อร้านค้า</th>
                                <th scope="col" class="border">วัน/เดือน/ปี</th>
                                <th class="border" scope="col">Action</th>
                              </tr>
                              @foreach($sold_his as $row)
                              <tr>
                                <th>
                                    <div>
                                        <p class="d-flex align-items-center my-5">
                                            {{$row->id}}
                                        </p>
                                    </div>
                                </th>
                                <td class="border text-center">
                                    <img src="{{asset('storage/images/products/'.$row->product_image)}}" class="rounded-1 my-2 " alt="..." style="height:100px;width:150px;">
                                </td>

                                <td class="align-middle border">
                                    <p >{{$row->product_name}}</p>

                                </td>
                                <td class="align-middle border">

                                        {{$row->product_mount}}



                                </td>
                                <td class="align-middle border">

                                       {{number_format($row->product_price)}}

                                </td>
                                <td class="align-middle border">

                                        {{$row->user->first_name}}

                                </td>

                                <td class="align-middle border">

                                        {{$row->market->market_name}}

                                </td>
                                <td class="align-middle border">

                                        {{$row->created_at}}

                                </td>
                                <td class="align-middle border">
                                    <a href="{{route('admin.dowload.invoice',$row->id)}}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                          </svg>
                                    </a>


                            </td>



                              </tr>

                              @endforeach
                            </thead>

                          </table>
                          {!!$sold_his->links()!!}
                      </div>
                </div>

              </div>



        </div>
      </div>
  </div>



@endsection
