@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{ route('market.register.insert')}}" method="post" enctype="multipart/form-data">
        @csrf



        <div class="col-md-5">
            <div class="form-group">
                <label for="first name" class="col-md-4 col-form-label text-md-start">ชื่อร้านค้า</label>
                <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="market name" name="market_name">
        </div>

    </div>
    <br>
    <div class="col-md-5">
        <div class="form-group">
            <label for="last_name" class="col-md-4 col-form-label text-md-start">ที่อยู่ร้านค้า</label>
            <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="market address" name="market_address">
        </div>
    </div>
    <br>

    <br>

    <input type="submit" value="บันทึก" class="btn btn-primary">


</form>
</div>

@endsection
