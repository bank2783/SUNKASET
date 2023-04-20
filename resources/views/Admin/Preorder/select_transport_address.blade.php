@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row mt-2">
      <div class="col-md-2">
          <div class="container mt-2">
              <div class="row mt-2 border " >
                  <div class="col-6 ">
                      <!-- รูป -->

                      <img src=""  class="rounded-circle  shadow-sm" width="60" height="60" alt="...">


                  </div>
                  <div class="col-6  mt-4 ">
                      <p class="fw-bold text-break">{{$user_data -> first_name}}</p>
                  </div>
              </div>
              <div class="row ">
                  <div class="col mt-3 ">
                      <profile-menu-list></profile-menu-list>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-sm-10 mt-5  " style=" height:auto;">
        <p class="fw-bold text-center">เพิ่มที่อยู่</p>
        @foreach ($user_transport_data as $row)
        <form>
            <div class="container mt-2  bg-light">
            <div class="row d-flex">
            <div class="col-2">
            <div class="form-check">

                <label class="form-check-label" for="flexRadioDefault1">

                        {{$row->first_name}} {{$row->last_name}}

                </label>
              </div>

            </div>
            <div class="col-6 text-break ">
                {{$row->address}} รหัสไปรษณีย์ {{$row->postal_code}} เบอร์โทรศัพท์ {{$row->phone_number}}
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
                <a style="" href="{{route('show.edit.address.form')}}">แก้ไข</a>
          </div>
        </div>
            </div>
        </form>
        @endforeach


      </div>




@endsection
