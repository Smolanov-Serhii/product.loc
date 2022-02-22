<?php
/**
 * @var $model \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('modules.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            //'url' => route('admin.languages.list')
        ],
        [
            'label' => __('modules.list'),
        ]
    ])
@endsection

@section('content')

{{--    @foreach($model as $lang)--}}
{{--        {{ $lang->iso }}--}}
{{--        {{ $lang->enabled }}--}}
{{--    @endforeach--}}
    <div class="card module-creator-item">
        <div class="card-header border-transparent">
            <h3 class="card-title"> @lang('modules.list') </h3>

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
                        <th>Название модуля</th>
                        <th>Перечень полей</th>
                        <th>@lang('system.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($modules as $module)
                        <tr>
                            <td>
                                @if(\App\Models\ModelSeo::where('alias', $module->name)->first())
                                    <a href="{{ route('client.page.show', ['alias' => $module->name]) }}" target="_blank">{{ $module->name }}</a>
                                @else
                                    {{ $module->name }}
                                @endif
                            </td>
                            <td>
                                @include('admin.modules.includes.attributes_index_list', [$model = $module])
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.modules.update', ['module' => $module]) }}" class="btn btn-success">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="{{ route('admin.modules.items.list', ['module' => $module]) }}" style="margin: 0 3px" class="btn btn-primary"><i class="far fa-list-alt"></i></a>
                                    <form method="POST" action="{{ route('admin.modules.delete', [ 'module'=> $module ]) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Вы уверены?')">
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
            <a href="{{ route('admin.modules.create') }}" class="btn btn-sm btn-info float-right">Create new module</a>
        </div>
        <!-- /.card-footer -->
    </div>
@endsection

