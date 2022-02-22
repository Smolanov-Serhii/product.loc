<?php
/**
 * @var $pages \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('modules.update'))
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
            'label' => __('modules.update') . " {$module->name}",
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
        action="{{ route('admin.modules.update', ['module' => $module]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.modules.includes.update_form')
    </form>
@endsection
