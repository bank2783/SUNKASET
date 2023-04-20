@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >
                  <div class="col" width="30">

                  </div>
                  <div class="col mt-3 ">
                      <h7></h7>
                  </div>
              </div>
              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10" style=" height:550px;">
            <div class="container text-center ">
              <div class="row " >
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
            <div class="container mt-5 bg-white p-5 rounded-2 shadow-sm">
                <div class="container px-4 text-center">
                    <div class="row gx-5">
                      <div class="col-sm-4 bg-">

                       <div class="border p-3 rounded-1 bg-success shadow-sm">
                        <div class="">
                            <p class="fs-5 text-white">ยอดขายวันนี้</p>
                            <p class="fs-5 text-white">฿ {{number_format($total_sold_today)}} .-</p>
                        </div>
                       </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="p-3 border rounded-1 shadow-sm  bg-secondary">
                            <p class="fs-5 text-white">ยอดขายเดือนนี้</p>
                            <p class="text-white fs-5">฿ {{number_format($total_sold_month)}} .-</p>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="p-3 border rounded-1 shadow-sm  bg-primary">
                            <p class="fs-5 text-white">ยอดขายปีนี้</p>
                            <p class="text-white fs-5">฿ {{number_format($total_sold_year)}} .-</p>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-5 gx-5">
                        <div class="col-sm-4 bg-">

                            <div class="border p-3 rounded-1 bg-white shadow-sm">
                             <div class="">
                                 <p class="fs-5 text-success">กำไรของระบบ <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                    <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                  </svg></p>
                                 <p class="fs-5 text-success">฿ {{number_format($total_money_in_site)}} .-  </p>
                             </div>
                            </div>
                           </div>
                    </div>
                  </div>
            </div>
        </div>
      </div>
  </div>



@endsection
