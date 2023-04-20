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

        <form action="{{route('add.transport.data')}}" method="POST">
            @csrf
            {{method_field('put')}}

            <div class="row ">
                <div class="col-6 mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">ชื่อจริง</label>
                    <input type="text" name="first_name" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('first_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">นามสกุล</label>
                    <input type="text" name="last_name" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('last_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" name="phone_number" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('phone_number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-3 mb-3">
                    <label for="exampleInputEmail1" class="form-label">รหัสไปรษณีย์</label>
                    <input type="text" name="postal_number" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('postal_number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class="col-6  mb-6">
                    <label for="exampleInputEmail1" class="form-label">ที่อยู่</label>
                    <textarea name="address" class="form-control rounded-0">

                    </textarea >
                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>

            </div>
            <div class="row d-flex justify-content-center">
            <button style="width:200px;" type="submit" class="rounded-0 btn btn-primary mt-3">บันทึก</button>
        </div>
        @if(session()->has('message_success'))
        <div class="alert alert-success mt-5">
            {{ session()->get('message_success') }}
        </div>
        @endif
      </div>
        </div>
        </form>



@endsection
