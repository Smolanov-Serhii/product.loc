{{--@extends('client.layouts.main')--}}
{{--@section('content')--}}
    @foreach($topics as $topic)
        <div>
            {{ $topic->id }} <br>
            {{ $topic->title }} <br>
            {!! $topic->theme !!}
        </div>
    @endforeach
{{--@endsection--}}