<?php
/**
 * @var $taxonomy \App\Models\Taxonomy;
 * @var $taxonomy_item \App\Models\TaxonomyItem;
 */
?>
@extends('adminlte::page')
@section('title', __('taxonomy.add') . " {$taxonomy->name}")
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('taxonomy.list'),
            'url' => route('admin.taxonomy.list')
        ],
        [
            'label' => __('taxonomy_items.list'),
            'url' => route('admin.taxonomy.items.list', ['taxonomy' => $taxonomy])
        ],
        [
            'label' => "{$taxonomy->name} " . __('taxonomy_items.add'),
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
        action="{{ route('admin.taxonomy.items.create', ['taxonomy' => $taxonomy]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.taxonomy_items.includes.create_update_form')
    </form>
@endsection
