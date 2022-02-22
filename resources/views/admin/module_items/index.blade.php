<?php
/**
 * @var $module \App\Models\Module
 */

$attributes = $module->attrs->mapWithKeys(function ($attr) {
    return [$attr->key => $attr->id];
});

//dd($attributes)

?>
@extends('adminlte::page')
@section('title', __('module_items.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            //'url' => route('admin.languages.list')
        ],
        [
            'label' => __('module_items.list'),
        ]
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title"> @lang('module_items.list') </h3>

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
        <div class="card-body p-0 table-custom-admin">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                        @if($module->name == 'feedback')
                        <th>Фото</th>
                        @endif
                        <th width="100%">Имя</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--                    @dd($attributes)--}}
                    @foreach($module->items as $item)
                        <tr>
                            @if($item->module->name == 'feedback')
                                <td style="width:150px">
                                    <img
                                        src="/uploads/module_items/{{ $item->props()->where('module_attribute_id', $attributes['image'])->first()->value }}"
                                        style="width:100px"
                                    >
                                </td>
                            @endif
                            <td>
                                {{ $item->addition->title }}
{{--                                @switch($item->module->name)--}}
{{--                                    @case('programs')--}}
{{--                                    {{ $item->props()->where('module_attribute_id', $attributes['title'])->first()->value }}--}}
{{--                                    @break--}}
{{--                                    @case('treners')--}}
{{--                                    {{ $item->props()->where('module_attribute_id', $attributes['name'])->first()->value }}--}}
{{--                                    @break--}}
{{--                                    @case('news')--}}
{{--                                    {{ $item->addition->title }}--}}
{{--                                        {{ $item->props()->where('module_attribute_id', $attributes['name'])->first()->value }}--}}
{{--                                    @break--}}
{{--                                @endswitch--}}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a style="margin-right: 3px" href="{{ route('admin.modules.items.update', ['module_item' => $item]) }}"
                                       class="btn btn-success"> <i class="fas fa-pen"></i> </a>
                                    <form method="POST" action="{{ route('admin.modules.items.delete', [ 'module_item'=> $item ]) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Вы уверены?')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
{{--                                    <a href="#" class="btn btn-danger"> @lang('system.delete') </a>--}}
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
            <a href="{{ route('admin.modules.items.create',['module' => $module]) }}"
               class="btn btn-sm btn-info float-right">@lang('module_items.create')</a>
        </div>
        <!-- /.card-footer -->
    </div>
@endsection

