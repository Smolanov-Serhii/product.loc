<?php
/**
 * @var $model \App\Models\Pages;
 * @var $errors \Illuminate\Support\ViewErrorBag;
 */
?>
@extends('adminlte::page')
@section('title', __('variables.add'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.variables.list')
        ],
        [
            'label' => __('pages.list'),
            'url' => route('admin.variables.list')
        ],
        [
            'label' => __('variables.edit'),
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
        action="{{ route('admin.variables.update', ['variable' => $variable]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.variables.includes.update_form')
    </form>
@endsection
