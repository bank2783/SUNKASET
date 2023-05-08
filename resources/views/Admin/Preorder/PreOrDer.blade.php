@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')



    <div class="row" style="background-color:#343a40">
      <div class="col-sm-2 border-end border-secondary">
          <div class="container" >

              <div class="row ">
                  <div class="col">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10" style=" height:auto;">

            <div class="container mt-3 bg-white my-5 p-3 rounded-2">
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
