<?php
/**
 * @var $pages \Illuminate\Database\Eloquent\Collection
 * @var $page \App\Models\Page;
 */
?>
@extends('adminlte::page')
@section('title', __('pages.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('pages.list'),
        ]
    ])
@endsection

@section('content')
    <a href="{{ route('admin.pages.create') }}" class="btn btn-sm btn-info"> @lang('pages.add') </a>
    @if($pages->count() > 0)
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title"> @lang('pages.list') </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            {{--                            <th>ID</th>--}}
                            {{--                            <th> @lang('pages.parent_page_id') </th>--}}
                            {{--                            <th> @lang('pages.level') </th>--}}
                            <th> @lang('system.title') </th>
                            <th> @lang('pages.alias') </th>
                            <th> @lang('system.status') </th>
                            {{--                            <th> @lang('system.image') </th>--}}
                            <th> @lang('system.action') </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            @include('admin.pages.includes.page_list_row', ['page' => $page, 'level' => 0, 'parents' => []])
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="{{ route('admin.pages.create') }}"
                   class="btn btn-sm btn-info float-left"> @lang('pages.add') </a>
            </div>
            <!-- /.card-footer -->
        </div>
    @else
        No pages...
    @endif
@endsection
@section('adminlte_js')
    <script src="{{ asset('/js/app.js') }}"></script>
{{--    <script>--}}
{{--        $(document).Toasts('create', {--}}
{{--            class: 'bg-warning',--}}
{{--            title: 'Как создать страницу ',--}}
{{--            body: `- <a href="/admin/pages/create">Добавить страницу</a><br>--}}
{{-- - <a href="/admin/block_templates">Создать шаблон</a> (один шаблон может использоваться для несколько страниц) <br>--}}
{{--и использовать этот шаблон для наполнения страницы.`,--}}
{{--            position: 'bottomRight',--}}
{{--            autohide: true,--}}
{{--            delay: 1e4--}}
{{--        })--}}
{{--    </script>--}}
@endsection
