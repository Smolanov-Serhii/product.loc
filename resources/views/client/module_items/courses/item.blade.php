<?php
/**
 * @var $module_item \App\Models\ModuleItem;
 */

//$attributes = $program->attrs();
$properties = $module_item->props->mapWithKeys(function ($prop) {
    return [$prop->type->key => $prop->value];
});
?>


@extends('client.layouts.main')
@section('content')
{{--    <iframe src="https://trinket.io/embed/python/edd948bf08" width="100%" height="356" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>--}}

{{--    <div id="terminal"></div>--}}
<div id="meetingSDKElement">
    <!-- Zoom Meeting SDK Rendered Here -->
</div>

    <div class="breadcrumbs main-container">
            @yield('breadcrumbs')
        </div>
        <section class="trener-sin">
            <div class="trener-sin__design">

            </div>
            <div class="trener-sin__container main-container">
                <div class="trener-sin__content">

{{--                    <img src="{!! '/uploads/module_items/' . $properties['desktop_img'] !!}" alt=" {!! $properties['title'] !!}">--}}
                    <h1 class="trener-sin__title section-title">
                        {!! $properties['title'] !!}
                    </h1>
                    <div class="trener-sin__skils">
{{--                        <span><strong>{!! $properties['date'] !!}</strong></span>--}}
                    </div>
{{--                    {!! $properties['content'] !!}--}}
                </div>
                <div class="trener-sin__btn">
                    <div class="main-button js-button-send-form button">
{{--                        <span>{{ $var['zapisatsa'] }}</span>--}}
                    </div>
                </div>
            </div>
        </section>
{{--        @include('client.module_items.treners.trainers-all')--}}
        @auth
            @include('client.includes.comments.form', ['commentable' => $module_item])
            @include('client.includes.comments.items', ['commentable' => $module_item])
        @endauth

@endsection

@section('client_scripts')
    @parent('client_scripts')
{{--    <script src="/js/xterm.js"></script>--}}
{{--    <script>--}}
{{--        var term = new Terminal();--}}
{{--        term.open(document.getElementById('terminal'));--}}
{{--        term.write('Hello from \x1B[1;3;31mxterm.js\x1B[0m $ ')--}}
{{--    </script>--}}
    <script src="{{ asset('/js/module_items/zoom.js') }}"></script>
    <script src="{{ asset('/js/module_items/comment.js') }}"></script>
@endsection

<link rel="stylesheet" href="/css/xterm.css" />
