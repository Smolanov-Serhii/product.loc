<?php
/**
 * @var $model \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('picture.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.languages.list')
        ],
        [
            'label' => __('languages.list'),
        ]
    ])
@endsection

@section('content')

{{--    @foreach($model as $lang)--}}
{{--        {{ $lang->iso }}--}}
{{--        {{ $lang->enabled }}--}}
{{--    @endforeach--}}
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title"> @lang('languages.list') </h3>

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
                        <th>ISO</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($model as $lang)
                        <tr>
                            <td>
                                <a href="">{{ $lang->iso }}</a>
                            </td>
                            @if($lang->enabled)
                                <td><span class="badge badge-success">Enabled</span></td>
                            @else
                                <td><span class="badge badge-danger">Disable</span></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
{{--            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>--}}
        </div>
        <!-- /.card-footer -->
    </div>
@endsection

