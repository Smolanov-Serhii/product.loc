<?php
/**
 * @var $block \App\Models\Block;
 * @var $content \App\Models\Block_contents;
 */
?>
{{--@extends('client.layouts.main')--}}
{{--@section('content')--}}
    <section class="text-block">
        User Info
        <br>
        {{ auth()->user()->name }}
        {{ auth()->user()->email }}
{{--        @include('client.cabinet.profile')--}}
    </section>

@endsection
