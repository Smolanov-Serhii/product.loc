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
        <div class="breadcrumbs main-container">
            <div class="breadcrumbs__list">
                <ul class="breadcrumb">
                    <a href="{{ url('/') }}">Главная</a>
                    <span class="devider"> / </span>
                    <a href="{{ url('/trainings') }}">Тренировки</a>
                    <span class="devider"> / </span>
                    <span class="current-page">{{ $page->seo->title }}</span>
                </ul>
            </div>
        </div>
        <section class="program-single main-container">
            <div class="program-single__container">
                <div class="program-single__img">
                    <img src="{{  url('/') . '/uploads/module_items/' . $properties['cover'] }}" alt="{{ $properties['title'] }}">
                </div>
                <div class="program-single__content">
                    {!!  $properties['content']  !!}
                    <div class="trainings-page__buttons">
                        <div class="trainings-page__button button-bg">
                            <span>Начать тренироваться</span>
                        </div>
                        <div class="trainings-page__button button-stroke">
                            <span>ПОПРОБОВАТЬ</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
