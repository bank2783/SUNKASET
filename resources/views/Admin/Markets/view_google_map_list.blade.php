@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')



    <div class="row" style="background-color:#343a40">
      <div class="col-sm-2 border-end border-secondary ">
          <div class="container" >

              <div class="row ">
                  <div class="col ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10" style=" height:auto;">
                <div class="container">
                    <div class="col-sm-12 mt-3">
                        <table class="table bg-white rounded-2">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">ชื่อร้านค้า</th>
                                <th scope="col">แผนที่ร้านค้า</th>

                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($market_google_map as $row)
                                <tr>
                                    <th scope="row">{{$row->id}}</th>
                                    <td>{{$row -> market_name}}</td>
                                    <td><a href="{{url(''.$row->google_map)}}" class="nav-link text-primary" target="_blank">ดูแผนที่ร้านค้า</a></td>

                                  </tr>
                                @endforeach


                            </tbody>
                          </table>
                      </div>
                </div>




              {!!$market_google_map->links()!!}
        </div>
      </div>
  </div>



@endsection




