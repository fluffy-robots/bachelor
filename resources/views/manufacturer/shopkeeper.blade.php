@extends('layouts.app')

@section('content')
<shopkeepers :data="{{ $shopkeepers }}"></shopkeepers>
@endsection