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
            'url' => route('admin.modules.list')
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
    @include('admin.content.includes.content_modal_dialog')
    <form
        role="form"
        action="{{ route('admin.modules.items.update', ['module_item' => $module_item]) }}"
        method="post"
        enctype="multipart/form-data"
        id="module_items_form"
    >
        @include('admin.module_items.includes.update_form')
    </form>
@endsection

@section('adminlte_css')
{{--    <link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">--}}
@endsection


@section('adminlte_js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{--    <script src="https://cdn.quilljs.com/1.2.6/quill.min.js"></script>--}}
    <script src="{{ asset('/js/modules/form.js') }}"></script>
@endsection
