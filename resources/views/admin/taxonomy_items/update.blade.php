<?php
/**
 * @var $model \App\Models\Pages;
 * @var $errors \Illuminate\Support\ViewErrorBag;
 */
?>
@extends('adminlte::page')
@section('title', __('taxonomy.edit'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('pages.list'),
            'url' => route('admin.taxonomy.list')
        ],
        [
            'label' => __('taxonomy.edit'),
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
        action="{{ route('admin.taxonomy.items.update', ['taxonomy_item' => $taxonomy_item]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.taxonomy_items.includes.create_update_form')
    </form>
@endsection
