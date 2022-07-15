@extends('adminlte::page')
@section('title', __('language.create'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('language.list'),
            'url' => route('admin.language.index')
        ],
        [
            'label' => __('language.create'),
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
        action="{{ route('admin.language.store') }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.language.includes.create_update_form')
    </form>
@endsection
