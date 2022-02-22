<?php
/**
 * @var $pages \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('module_items.add'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.modules.list')
        ],
        [
            'label' => __('module_items.list'),
            //'url' => route('admin.modules.list')
        ],
        [
            'label' => __('module_items.add'),
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
    <form
        role="form"
        action="{{ route('admin.modules.items.store', ['module' => $module]) }}"
        method="post"
        enctype="multipart/form-data"
        id="module_items_form"
    >
        @include('admin.module_items.includes.create_form')
    </form>
@endsection

@section('adminlte_js')
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
{{--    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>--}}
    <script src="{{ asset('/js/modules/form.js') }}"></script>
@endsection
