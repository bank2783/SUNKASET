@extends('layouts.app')
@section('content')

<product-view value="{{Auth::user()->id}}" id="{{request()->route('id');}}"></product-view>

@endsection
