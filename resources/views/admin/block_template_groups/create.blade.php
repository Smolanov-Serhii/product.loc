<?php
/**
 * @var $pages \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('pages.add'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('block_template_groups.list'),
            'url' => route('admin.template.groups.list')
        ],
        [
            'label' => __('block_template_groups.add'),
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
        action="{{ route('admin.template.groups.store') }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.block_template_groups.includes.create_update_form')
    </form>
@endsection
