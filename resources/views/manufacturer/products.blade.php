@extends('layouts.app')

@section('content')
<manufacturer-products :products="{{$products}}"></manufacturer-products>
@endsection