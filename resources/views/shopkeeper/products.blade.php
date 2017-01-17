@extends('layouts.app')

@section('content')
<shopkeeper-products :data="{{$products}}"></shopkeeper-products>

@endsection