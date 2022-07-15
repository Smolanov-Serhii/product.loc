<?php
/**
 * @var $languages Language;
 */

use App\Models\Language;

?>
@extends('adminlte::page')
@section('title', __('picture.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.language.index')
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
                    @foreach($languages as $lang)
                        <tr>
                            <td>
                                <a href="">{{ $lang->iso }}</a>
                            </td>
                            <td>
                                <div class="custom-control custom-switch"
                                     style="display: inline-block; width: 30px; margin: 10px; position: absolute">
                                    <input
                                            name="enabled"
                                            type="checkbox"
                                            class="custom-control-input update-status-lang-switcher"
                                            data-lang_id="{{ $lang->id }}"
                                            id="moderate_comment_{{ $lang->id }}"
                                            data-url="{{ route('admin.language.update_status', ['language' => $lang]) }}"
                                            @if($lang->enabled) checked="" @endif
                                            @if(config('app.fallback_locale') == $lang->iso) disabled @endif
                                    >
                                    <label class="custom-control-label" for="moderate_comment_{{ $lang->id }}">
                                        @if(config('app.fallback_locale') == $lang->iso) (@lang('language.fallback_locale')) @endif
                                    </label>
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
            <a href="{{ route('admin.language.create') }}" class="btn btn-sm btn-info float-left">@lang('language.add')</a>
{{--            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>--}}
        </div>
        <!-- /.card-footer -->
    </div>
@endsection

@section('adminlte_js')
    @parent('adminlte_js')
    <script src="{{ asset('/js/language/list.js') }}"></script>
@endsection


