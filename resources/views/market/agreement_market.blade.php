@extends('layouts.app')
@section('content')
@include('layouts.header_baner');
@include('layouts.header_menu');

<div class="container">
    <p class="fw-bold">ข้อตกลง</p>
    <p class="fst-normal">1.................</p>

    <a href="{{route('market.register.form')}}" class="btn btn-success rounded-0">ยอมรับข้อตกลง</a>

</div>

@include('layouts.footer');

@endsection
