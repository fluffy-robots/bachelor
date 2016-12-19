@extends('layouts.app')

@section('content')
<h3>Manufacturer Products</h3>
<manufacturer-products :products="{{$products}}"></manufacturer-products>
@endsection