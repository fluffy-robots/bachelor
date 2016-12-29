@extends('layouts.app')

@section('content')
<media-bank :data="{{ $files }}"></media-bank>
@endsection