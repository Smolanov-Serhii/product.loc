<?php
/**
 * @var $taxonomy \App\Models\Taxonomy;
 */
?>
@extends('adminlte::page')
@section('title', __('taxonomies.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('taxonomies.list'),
            'url' => route('admin.taxonomy.list')
        ],
        [
            'label' => __('taxonomies.list'),
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
                        <th> @lang('taxonomy_item.key') </th>
                        <th> @lang('taxonomy_item.name') </th>
                        <th> @lang('system.action') </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($taxonomy->items as $taxonomy_item)
                        <tr>
                            <td>
                                {{ $taxonomy_item->key }}

                            </td>
                            <td>
                                {{ $taxonomy_item->name }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.taxonomy.items.edit', ['taxonomy_item' => $taxonomy_item]) }}" class="btn btn-success"> <i class="fas fa-pen"></i> </a>
                                    <form method="POST" action="{{ route('admin.taxonomy.items.delete', ['taxonomy_item' => $taxonomy_item]) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Вы уверены?')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
{{--                            @if($lang->enabled)--}}
{{--                                <td><span class="badge badge-success">Enabled</span></td>--}}
{{--                            @else--}}
{{--                                <td><span class="badge badge-danger">Disable</span></td>--}}
{{--                            @endif--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <a href="{{ route('admin.taxonomy.items.create', ['taxonomy' => $taxonomy]) }}" class="btn btn-sm btn-info float-left">@lang('taxonomy_items.create')</a>
{{--            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>--}}
        </div>
        <!-- /.card-footer -->
    </div>
@endsection

