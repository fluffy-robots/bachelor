@extends('layouts.app')

@section('content')
<shopkeeper-products :products="{{$products}}"></shopkeeper-products>

@endsection