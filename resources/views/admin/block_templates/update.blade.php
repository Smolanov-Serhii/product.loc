<?php
/**
 * @var $block_template \App\Models\Block_templates;
 */
?>
@extends('adminlte::page')
@section('title', __('block_templates.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.block_templates.list')
        ],
        [
            'label' => __('block_templates.list'),
            'url' => route('admin.block_templates.list')
        ],
        [
            'label' => __('block_template.add'),
        ]
    ])
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form
        role="form"
        action="{{ route('admin.block_templates.update', ['block_template' => $block_template]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.block_templates.includes.create_update_form')
        @include('admin.setting.includes.editor_modal_dialog')
    </form>
@endsection

@section('adminlte_js')
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/summernote.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    {{--    <script src="{{ asset('/js/list.js') }}"></script>--}}
    <script src="{{ asset('/js/block_templates/create.js') }}"></script>
    <script src="{{ asset('/vendor/laravel-admin-ext/json-editor/jsoneditor-6.2.1/dist/jsoneditor.min.js') }}"></script>

{{--    <script>--}}
{{--        // create the editor--}}
{{--        const container = document.getElementById('jsoneditor')--}}
{{--        const options = {--}}
{{--            mode: 'tree',--}}
{{--            ace: ace--}}
{{--        }--}}
{{--        const editor = new JSONEditor(container, options)--}}

{{--        // set json--}}
{{--        document.getElementById('setJSON').onclick = function (e) {--}}
{{--            e.preventDefault();--}}
{{--            const json = {--}}
{{--                'options_list': {--}}
{{--                    'key': {'value': 'value', 'selected':true},--}}
{{--                    'key2': {'value':'value'},--}}
{{--                },--}}
{{--                'hideLabel': true,--}}
{{--                // 'array': [1, 2, 3, {1:2}],--}}
{{--                // 'boolean': true,--}}
{{--                // 'color': '#82b92c',--}}
{{--                // 'null': null,--}}
{{--                // 'number': 123,--}}
{{--                // 'object': {'a': 'b', 'c': 'd'},--}}
{{--                // 'time': 1575599819000,--}}
{{--                // 'string': 'Hello World',--}}
{{--                // 'onlineDemo': 'https://jsoneditoronline.org/'--}}
{{--            }--}}
{{--            editor.set(json);--}}
{{--            return;--}}
{{--        }--}}

{{--        // get json--}}
{{--        document.getElementById('getJSON').onclick = function () {--}}
{{--            const json = editor.get()--}}
{{--            alert(JSON.stringify(json, null, 2))--}}
{{--        }--}}
{{--        document.addEventListener('DOMContentLoaded', function (){--}}
{{--            const json = {--}}
{{--                'options_list': {--}}
{{--                    0: {value: 'пункт 1', selected:true},--}}
{{--                    1: {value:'пункт 2'},--}}
{{--                },--}}
{{--                hideLabel: true,--}}
{{--                classlist: [--}}
{{--                    'some',--}}
{{--                    'awesome'--}}
{{--                ],--}}
{{--                id: 'u_id',--}}
{{--                size: 2,--}}
{{--                multiple: true--}}


{{--                // 'array': [1, 2, 3, {1:2}],--}}
{{--                // 'boolean': true,--}}
{{--                // 'color': '#82b92c',--}}
{{--                // 'null': null,--}}
{{--                // 'number': 123,--}}
{{--                // 'object': {'a': 'b', 'c': 'd'},--}}
{{--                // 'time': 1575599819000,--}}
{{--                // 'string': 'Hello World',--}}
{{--                // 'onlineDemo': 'https://jsoneditoronline.org/'--}}
{{--            }--}}
{{--            editor.set(json);--}}
{{--        })--}}
{{--    </script>--}}
@endsection

@section('adminlte_css')
    <link href="{{ asset('/vendor/laravel-admin-ext/json-editor/jsoneditor-6.2.1/dist/jsoneditor.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/summernote.css') }}" rel="stylesheet">
@endsection
