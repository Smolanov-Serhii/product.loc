@extends('admin.adminLte.adminlte-page')
@section('title',  __('admin/users.user_editing'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => __('title.manage_panel'),
            'url' => route('admin.dashboard')
        ],
        [
            'label' =>  __('admin/users.title'),
            'url' => route('user.index')
        ],
        [
            'label' =>  __('admin/users.user_editing')
        ]
    ])
@endsection
@section('content')
    <section class="content">
        <form action="{{route('user.update', ['id' => $model->id])}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @include('admin.user.includes.create-update-form-body')
        </form>
    </section>
@endsection
