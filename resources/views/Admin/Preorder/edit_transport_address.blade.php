@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row mt-2 d-flex justify-content-center">

      <div class="col-sm-10 mt-5  " style=" height:auto;">
        <p class="fw-bold text-center bg-success text-light">กรอกข้อมูลที่อยู่</p>

        <form action="{{route('show.edit.address.update')}}" method="POST">
            @csrf
            {{method_field('put')}}

            <div class="row ">
                <div class="col-6 mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">ชื่อจริง</label>
                    <input type="text" name="first_name" value="{{$user_transport_data -> first_name}}" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('first_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">นามสกุล</label>
                    <input type="text" name="last_name" value="{{$user_transport_data -> last_name}}" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('last_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" name="phone_number" value="{{$user_transport_data -> phone_number}}" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('phone_number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-3 mb-3">
                    <label for="exampleInputEmail1" class="form-label">รหัสไปรษณีย์</label>
                    <input type="text" name="postal_number" value="{{$user_transport_data -> postal_code}}" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('postal_number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class="col-6  mb-6">
                    <label for="exampleInputEmail1" class="form-label">ที่อยู่</label>
                    <textarea name="address" value="{{$user_transport_data -> address}}" class="form-control rounded-0">

                    </textarea >
                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>

            </div>
            <div class="row d-flex justify-content-center">
            <button style="width:200px;" type="submit" class="rounded-0 btn btn-success mt-3">บันทึก</button>
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
