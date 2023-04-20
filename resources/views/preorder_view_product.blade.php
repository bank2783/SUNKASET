@extends('layouts.app')
@section('content')
@include('layouts.header_menu')

{{-- <preorder-view-product @if(Auth::check())
    value = "{{Auth::user()->id}}"

@else
    value = "0"

@endif

id="{{request()->route('id');}}"></preorder-view-product> --}}



@include('layouts.footer')
@endsection
