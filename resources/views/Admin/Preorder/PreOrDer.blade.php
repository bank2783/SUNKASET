@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

<div class="row mt-4 p-1 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">เปิดพรีออเดอร์สินค้า</p>
    </div>
</div>

    <div class="row ">
      <div class="col-sm-2 ">
          <div class="container" >
              <div class="row " >


              </div>
              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10  " style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
            <div class="container mt-4 bg-white p-3">
                <form action="{{route('preorder.insert')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">ชื่อสินค้าแสดงหน้าเว็บไซต์</label>
                      <input type="text" name="pre_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">ราคาสินค้า</label>
                      <input type="text" name="pre_price" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">จำนวนสินค้า</label>
                        <input type="text" name="pre_amount" class="form-control" id="exampleInputPassword1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">รายละเอียดสินค้า</label>
                        <textarea type="text" name="pre_description" class="form-control" id="exampleInputPassword1"></textarea>
                      </div>



                      <div class="mb-3">
                        <label for="formFile" class="form-label">รูปสินค้า</label>
                        <input class="form-control" name="pre_image" type="file" id="formFile">
                      </div>


                    <button type="submit" class="btn btn-primary">ตกลง</button>
                  </form>
            </div>
        </div>
      </div>
  </div>



@endsection
