<?php
/**
 * @var $model \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('widget.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('widget.list'),
        ]
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title"> @lang('widget.list') </h3>

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
                            <th> @lang('widget.slug') </th>
                            <th> @lang('system.action') </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($widgets as $widget)
                        <tr>
                            <td>
                                {{ $widget->slug }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.widget.edit', [ 'widget' => $widget ]) }}"
                                       class="btn btn-success"> <i class="fas fa-pen"></i> </a>
                                    <form method="POST" action="{{ route('admin.widget.destroy', [ 'widget' => $widget ]) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-icon"
                                                onclick="return confirm('Вы уверены?')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="{{ route('admin.widget.create') }}" class="btn btn-sm btn-info float-left"> @lang('widget.create') </a>
        </div>
        <!-- /.card-footer -->
    </div>
@endsection

