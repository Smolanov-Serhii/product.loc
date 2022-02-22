<?php
/**
 * @var $model \App\Models\Pages;
 * @var $errors \Illuminate\Support\ViewErrorBag;
 */
?>
@extends('adminlte::page')
@section('title', __('user.edit'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('taxonomies.list'),
            'url' => route('admin.user.index')
        ],
        [
            'label' => __('user.edit'),
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
            action="{{ route('admin.user.update', ['user' => $user]) }}"
            method="post"
            enctype="multipart/form-data"
    >
        @method('PUT')
        @include('admin.user.includes.create_update_form')
    </form>
@endsection
