<?php
/**
 * @var $pages \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('role.create'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('role.list'),
            'url' => route('admin.role.index')
        ],
        [
            'label' => __('role.create'),
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
        action="{{ route('admin.role.store') }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.role.includes.create_update_form')
    </form>
@endsection
