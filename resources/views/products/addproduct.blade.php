@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{url('addproduct/form/added/'.request()->route('id'))}}"  enctype="multipart/form-data" method="POST" >
        @csrf
        <div class="col-md-5">
            <div class="form-group">
                <label for="product_name" class="col-md-4 col-form-label text-md-start">ชื่อสินค้า</label>
                <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="ชื่อสินค้า" name="product_name">
        </div>

    </div>
    <br>
    <div class="col-md-5">
        <div class="form-group">
            <label for="product_price" class="col-md-4 col-form-label text-md-start">ราคาสินค้า</label>
            <input type="number" class="form-control" id="exampleInputEmail1"  placeholder="ราคา" name="product_price">
        </div>
    </div>
    <br>
    <div class="col-md-5">
        <div class="form-group">
            <label for="product_amount" class="col-md-4 col-form-label text-md-start">จำนวนสินค้า</label>
            <input type="number" class="form-control" id="exampleInputEmail1"  placeholder="จำนวนสินค้า" name="product_amount">
        </div>
    </div>
    <br>
    <div class="col-md-5">
        <div class="form-group">
            <label for="product_detail" class="col-md-4 col-form-label text-md-start">รายละเอียดของสินค้า</label>
            <textarea type="text" class="form-control" id="exampleInputEmail1"  placeholder="รายละเอียดสินค้า" name="product_detail"></textarea>
        </div>
    </div>
    <br>
    <div class="col-md-9">
        <div class="form-group">
            <label for="product_detail" class="col-md-4 col-form-label text-md-start">ประเภทสินค้า</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="product_type_id" id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1">ผัดสด</label>

              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="product_type_id" id="inlineRadio2" value="2">
                <label class="form-check-label" for="inlineRadio2">ข้าว</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="product_type_id" id="inlineRadio2" value="3">
                <label class="form-check-label" for="inlineRadio2">ผลิตภัณฑ์แปรรูป</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="product_type_id" id="inlineRadio2" value="4">
                <label class="form-check-label" for="inlineRadio2">ของฝาก/ของที่ระลึก</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="product_type_id" id="inlineRadio2" value="5">
                <label class="form-check-label" for="inlineRadio2">ผลิคภัณฑ์ทางการเกษตร</label>
              </div>


        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <label for="product_img" class="col-md-4 col-form-label text-md-start">อัปโหลดรูปสินค้า</label>
            <input type="file" class="form-control" id="exampleInputEmail1"  placeholder="รูปภาพสินค้า" name="product_img"></input>
        </div>
    </div>
    <br>


    <input type="submit" value="ตกลง" class="btn btn-primary">
    <br>

    <br>


</form>

@endsection
