@extends('layouts.app')

@section('content')
    @foreach($contents as $content)
    <p>{{ $content->title }}</p>
    @endforeach
@endsection
