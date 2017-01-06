@extends('layouts.app')

@section('content')
<manufacturer-products :data="{{$products}}"></manufacturer-products>
@endsection