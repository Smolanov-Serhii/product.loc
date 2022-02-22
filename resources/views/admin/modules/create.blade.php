<?php
/**
 * @var $pages \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('modules.add'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('modules.list'),
            'url' => route('admin.modules.list')
        ],
        [
            'label' => __('modules.add'),
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
        class="module-create-items"
        action="{{ route('admin.modules.store') }}"
        method="post"
        enctype="multipart/form-data"
        class="module-create-items"
    >
        @include('admin.modules.includes.create_form')
    </form>
@endsection
