@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

<div class="row mt-4 p-1 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">รายการจองสินค้าที่เข้ามาในระบบ</p>
    </div>
</div>

    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >
                  <div class="col" width="30">

                  </div>

              </div>
              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10 mt-4" style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>

            <form action="{{route('Preoeder.List.Update')}}" method="POST">

                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">ราคา</label>
                  <input type="text" name="pre_list_price" value="{{$pre_list->pre_list_price}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                 @error('pre_list_price')
                    <span class="text-danger">{{$message}}</span>
                 @enderror
                </div>
                 <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">จำนวน</label>
                    <input type="text" name="pre_list_amount" value="{{$pre_list->pre_list_amount}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                   </div>
                   <input type="hidden" value="{{$pre_list->id}}" name="pre_list_id">

                   <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">ตกลง</button>
                   </div>

              </form>

        </div>
      </div>
  </div>



@endsection
