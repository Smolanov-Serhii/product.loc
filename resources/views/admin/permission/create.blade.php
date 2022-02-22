<?php
/**
 * @var $pages \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('permission.create'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.role.index')
        ],
        [
            'label' => __('permission.list'),
            'url' => route('admin.permission.index')
        ],
        [
            'label' => __('permission.create'),
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
        action="{{ route('admin.permission.store') }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.permission.includes.create_update_form')
    </form>
@endsection
