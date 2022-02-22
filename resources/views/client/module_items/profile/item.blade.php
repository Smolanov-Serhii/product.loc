<?php
/**
 * @var $module_item \App\Models\Module_items;
 */

//$attributes = $program->attrs();
//$properties = $module_item->props->mapWithKeys(function ($prop) {
//    return [$prop->type->key => $prop->value];
//});

?>


{{--@extends('client.layouts.main')--}}
{{--@section('content')--}}
        <div class="breadcrumbs main-container">
{{--            @yield('breadcrumbs')--}}
        </div>
        <section class="trener-sin">
            <div class="trener-sin__design">

            </div>
            <div class="trener-sin__container main-container">
                <div class="trener-sin__content">

{{--                    <img src="{!! '/uploads/module_items/' . $properties['desktop_img'] !!}" alt=" {!! $properties['title'] !!}">--}}
                    <h1 class="trener-sin__title section-title">
{{--                        {!! $properties['title'] !!}--}}
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
{{--@endsection--}}
