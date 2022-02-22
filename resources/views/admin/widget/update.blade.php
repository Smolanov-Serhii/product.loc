<?php
/**
 * @var $model \App\Models\Pages;
 * @var $errors \Illuminate\Support\ViewErrorBag;
 */
?>
@extends('adminlte::page')
@section('title', __('widget.edit'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('widget.list'),
            'url' => route('admin.widget.index')
        ],
        [
            'label' => __('widget.edit'),
        ]
    ])
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @include('admin.content.includes.content_modal_dialog')
    <form
        role="form"
        action="{{ route('admin.widget.update', ['widget' => $widget]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @method('PUT')
        @include('admin.widget.includes.create_update_form')
    </form>
@endsection
