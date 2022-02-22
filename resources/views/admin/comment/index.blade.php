<?php
/**
 * @var $model \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('comment.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('comment.list'),
        ]
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title"> @lang('comment.list') </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-comment="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-comment="remove">
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
                            <th> @lang('system.author') </th>
                            <th> @lang('comment.parent') </th>
                            <th> @lang('comment.comment') </th>
                            <th> @lang('system.created_at') </th>
                            <th> @lang('comment.is_approved') </th>
                            <th> @lang('system.action') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                            @include('admin.comment.includes.comment_list_row', ['comment' => $comment, 'level' => 0])
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix"></div>
        <!-- /.card-footer -->
    </div>
@endsection

@section('adminlte_js')
    @parent('adminlte_js')
    <script src="{{ asset('/js/comment/list.js') }}"></script>
@endsection
