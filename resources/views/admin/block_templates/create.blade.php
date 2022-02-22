<?php
/**
 * @var $templates \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('block_templates.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.block_templates.list')
        ],
        [
            'label' => __('block_templates.list'),
            'url' => route('admin.block_templates.list')
        ],
        [
            'label' => __('block_template.add'),
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
        action="{{ route('admin.block_templates.store') }}"
        method="post"
        enctype="multipart/form-data"
        class="card"
    >
        @include('admin.block_templates.includes.create_update_form')
    </form>
@endsection

@section('adminlte_js')
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/summernote.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/block_templates/create.js') }}"></script>
@endsection

@section('adminlte_css')
    <link href="{{ asset('/css/summernote.css') }}" rel="stylesheet">
@endsection