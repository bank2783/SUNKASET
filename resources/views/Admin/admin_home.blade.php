@extends('layouts.app')
@section('content')

<div class="container " >
    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >
                  <div class="col" width="30">
                  <img src="img\alpaka.jpeg"  class="rounded-circle border shadow-sm" width="60" height="60" alt="...">
                  </div>
                  <div class="col mt-3 ">
                      <h7>{{$user->first_name}}</h7>
                  </div>
              </div>
              <div class="row ">
                  <div class="col mt-3 ">
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item text-center"style="background-color: #F0F0F0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  </svg> บัญชีของฉัน</li>

                          <li class="list-group-item text-center" style="background-color: #F0F0F0">
                              <a href="{{route('admin.approve.maket')}}" class="nav-link">ร้านค้ารออนุมัติ</a>
                          </li>
                          <li class="list-group-item text-center" style="background-color: #F0F0F0">
                            <a href="{{route('admin.approve.products')}}" class="nav-link">สินค้ารออนุมัติ</a>
                        </li>
                        <li class="list-group-item text-center" style="background-color: #F0F0F0">
                            <a href="{{route('admin.wearhouse.view')}}" class="nav-link">คลังสินค้า</a>
                        </li>
                        <li class="list-group-item text-center" style="background-color: #F0F0F0">
                            <a href="{{route('admin.warehouse.product.sell.list')}}" class="nav-link">ขายสินค้า</a>
                        </li>

                      </ul>
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10  " style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">
                      สินค้าของฉัน
                  </div>
              </div>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">สถานะ</th>
                  </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>


                </tbody>
              </table>
        </div>
      </div>
  </div>
</div>


@endsection
