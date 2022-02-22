@extends('layouts.admin')
@section('title',  __('admin/users.user_creating'))
@section('content_header')
{{--    @include('breadcrumbs', $breadcrumbs = [--}}
{{--        [--}}
{{--            'label' => __('title.manage_panel'),--}}
{{--            'url' => route('home')--}}
{{--        ],--}}
{{--        [--}}
{{--            'label' =>  __('admin/users.title'),--}}
{{--            'url' => route('home')--}}
{{--        ],--}}
{{--        [--}}
{{--            'label' =>  __('admin/users.user_creating')--}}
{{--        ]--}}
{{--    ])--}}
@endsection
@section('content')
    <section class="content">
        <form action="{{route('admin.position.create')}}" method="POST" enctype="multipart/form-data">
            @include('admin.position.includes.create-update-form-body')
        </form>
    </section>
@endsection
