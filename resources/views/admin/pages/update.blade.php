<?php
/**
 * @var $model Page;
 * @var $errors ViewErrorBag;
 */

use App\Models\Page;
use Illuminate\Support\ViewErrorBag;

?>
@extends('adminlte::page')
@section('title', $model->title.'-'.__('pages.edit'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('pages.list'),
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('pages.edit'),
        ]
    ])
@endsection

@section('content')
{{--    TODO use for tabs --}}
{{--    @error('seo.*.alias')--}}
{{--    33333333333--}}
{{--    @enderror--}}
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
        action="{{ route('admin.pages.update', ['page' => $model]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.pages.includes.create_update_form')
    </form>
@endsection
