<?php
/**
 * @var $model \App\Models\Pages;
 * @var $errors \Illuminate\Support\ViewErrorBag;
 */
?>
@extends('adminlte::page')
@section('title', __('role.edit'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.role.index')
        ],
        [
            'label' => __('role.list'),
            'url' => route('admin.role.index')
        ],
        [
            'label' => __('role.edit'),
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
        action="{{ route('admin.role.update', ['role' => $role]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @method('PUT')
        @include('admin.role.includes.create_update_form')
    </form>
@endsection
