<?php
/**
 * @var $model \App\Models\Pages;
 * @var $errors \Illuminate\Support\ViewErrorBag;
 */
?>
@extends('adminlte::page')
@section('title', __('permission.edit'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('role.list'),
            'url' => route('admin.permission.index')
        ],
        [
            'label' => __('permission.edit'),
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
        action="{{ route('admin.permission.update', ['permission' => $permission]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @method('PUT')
        @include('admin.permission.includes.create_update_form')
    </form>
@endsection
