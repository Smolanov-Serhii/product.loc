<?php
/**
 * @var $pages \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('permission_group.create'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.role.index')
        ],
        [
            'label' => __('permission.list'),
            'url' => route('admin.permission_group.index')
        ],
        [
            'label' => __('permission_group.create'),
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
        action="{{ route('admin.permission_group.store') }}"
        method="post"
        enctype="multipart/form-data"
    >
{{--        @method('PUT')--}}
        @include('admin.permission_group.includes.create_update_form')
    </form>
@endsection
