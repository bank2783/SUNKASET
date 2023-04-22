@extends('layouts.app')
@section('content')


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
                      รายละเอียดสินค้าพรีออเดอร์
                  </div>
              </div>
            </div>
            <div class="container">
                <div class="d-sm-flex justify-content-center bg-light">
                    <img style="height: 300px;" src="{{asset('storage/images/preorders/'.$pre_one_data->pre_list_image)}}" class="img-thumbnail" alt="...">
                </div>
                <form>
                    <div class="row mt-3 g-3">
                        <div class="col-6">
                          <label for="inputEmail4" class="form-label">ชื่อสินค้า</label>
                          <input type="text" value="{{$pre_one_data -> pre_list_name}}" class="form-control rounded-0"  aria-label="First name">
                        </div>
                        <div class="col-6">
                          <label for="inputEmail4" class="form-label">ราคาทั้งหมด</label>
                          <input type="text" value="{{number_format($pre_one_data -> pre_list_price)}}" class="form-control rounded-0" placeholder="Last name" aria-label="Last name">
                        </div>
                        <div class="col-6">
                            <label for="inputEmail4" class="form-label">จำนวน</label>
                            <input type="text" value="{{number_format($pre_one_data -> pre_list_amount)}}" class="form-control rounded-0" placeholder="Last name" aria-label="Last name">
                          </div>
                          <div class="col-6">
                            <label for="inputEmail4" class="form-label">ชื่อผู้ซื้อ</label>
                            <input type="text" value="{{$pre_one_data -> user -> first_name}} {{$pre_one_data -> user -> first_name}}" class="form-control rounded-0" placeholder="Last name" aria-label="Last name">
                          </div>
                          <div class="col-6">
                            <label for="inputEmail4" class="form-label">รหัสคำสั่งซื้อ</label>
                            <input type="text" value="{{$pre_one_data ->id}} " class="form-control rounded-0" placeholder="Last name" aria-label="Last name">
                          </div>
                      </div>
                </form>




                  <div class="row mt-3 g-3 my-5">
                    <label for="inputEmail4" class="form-label">ที่อยู่สำหรับการจัดส่งสินค้า</label>
                        <textarea type="text" value="{{$pre_one_data -> TransportData -> address}}   {{"รหัสไปรษรีย์ " . $pre_one_data -> TransportData -> postal_code}} {{"เบอร์โทรติดต่อ ".$pre_one_data -> TransportData -> phone_number}}" class="form-control rounded-0"  aria-label="Last name"></textarea>
                  </div>
                  {{-- <div class="row mt-3 g-3 d-flex justify-content-center">
                    <div class="col-5 d-flex justify-content-center">
                        <button class="btn btn-primary"><a href="{{route('Preorder.List.Sold.Finished',$pre_one_data ->id)}}" class="nav-link">สำเร็จการสั่งซื้อ</button>
                    </div>
                  </div> --}}


            </div>
        </div>
      </div>
  </div>



@endsection
