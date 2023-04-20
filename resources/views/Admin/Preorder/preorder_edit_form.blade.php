@extends('layouts.app')
@section('content')
@include('layouts.admin_header_bar')

<div class="row p-1 mt-4 bg-success">
    <div class="col d-flex justify-content-center">
        <p class=" fs-5 mt-3 text-white">แก้ไขข้อมูลสินค้าพรีออเดอร์</p>
    </div>
</div>

    <div class="row">
      <div class="col-sm-2 ">
          <div class="container" >

              <div class="row ">
                  <div class="col mt-3 ">
                    @include('layouts.admin_list');
                  </div>
              </div>
          </div>
      </div>
        <div class="col-sm-10 mt-4 " style=" height:550px;">
            <div class="container text-center " style="background-color: #F0F0F0">
              <div class="row " style="background-color: #F0F0F0">
                  <div class="col-sm-12 mt-3">

                  </div>
              </div>
            </div>
            <div class="container bg-light">
                <div class="d-flex bg-white justify-content-center">
                    <img src="{{asset('storage/images/preorders/'.$pre_data->pre_image)}}" class="img-fluid" alt="..." style="height:400px;width:400px;">
                </div>
                <div class="row mt-5">

                        @foreach ($preorder_images as $row )
                            <div class="col-3 d-flex justify-content-center">
                                <img src="{{asset('storage/images/preorders/'.$row->image_name)}}" class="img-fluid" alt="...">
                            </div>
                        @endforeach

                </div>

                <form class=" mt-2" action="{{route('Preorder.edite.update')}}"  enctype="multipart/form-data" method="POST">
                    @csrf
                    {{method_field('put')}}
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">ชื่อสินค้าแสดงหน้าเว็บไซต์</label>
                      <input type="text" name="pre_name" value="{{$pre_data->pre_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">ราคาสินค้า</label>
                      <input type="text" name="pre_price" value="{{$pre_data->pre_price}}" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">จำนวนสินค้า</label>
                        <input type="text" name="pre_amount" value="{{$pre_data->pre_amount}}" class="form-control" id="exampleInputPassword1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">รายละเอียดสินค้า</label>
                        <textarea type="text" name="pre_description" value="{{$pre_data->pre_description}}" class="form-control" id="exampleInputPassword1"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">รูปสินค้า</label>
                        <input class="form-control" name="pre_image"  type="file" id="formFile">
                      </div>
                      <input type="hidden" name="pre_id" value="{{$pre_data->id}}">
                      <input type="hidden" name="old_image_name" value="{{$pre_data->pre_image}}">

                    <button type="submit" class="btn btn-primary">ตกลง</button>
                  </form>



                    <form action="{{url('admin/preorder/edit-preorder-product-data/'.$pre_data -> id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row d-flex  justify-content-center">
                            <div class="mb-3 col-6 mt-3">
                              <label for="exampleInputEmail1" class="form-label">รูปเพิ่มเติมจำนวน 4 รูปภาพ</label>
                              <input type="file" name="images[]"  class="form-control rounded-0 border border-primary" id="exampleInputEmail1" aria-describedby="emailHelp" multiple>
                              <div id="emailHelp" class="form-text">รูปสำหรับแสดงรูปภาพเพิ่มเติมของสินค้าพรีออเดอร์</div>
                            </div>
                        </div>
                        {{-- <input type="hidden" name="preorder_data_id" value="{{$pre_data -> id}}"> --}}

                        <div class="row d-flex  justify-content-center">

                          <div class="mb-3 col-6 mt-3">

                              <button type="submit" class="btn btn-primary rounded-0" style="width:100%">เพิ่มรูปภาพ</button>

                          </div>

                        </div>

                    </form>

                    <div class="row d-flex justify-content-center">
                        @if(session()->has('message_success'))
                        <div class=" col-3 alert alert-success text-center rounded-0 mt-5">
                         {{ session()->get('message_success') }}
                        </div>
                         @endif
                    </div>

            </div>

        </div>
      </div>
  </div>



@endsection
