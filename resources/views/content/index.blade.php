@extends('layouts.app')

@section('content')
    @foreach($contents as $content)
    <p>{!! $content->uuid !!}</p>
    @endforeach
@endsection
