<?php
/**
 * @var $page \App\Models\Page;
 * @var $templates \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('pages.content'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.pages.list')
        ],
        [
            'label' => __('block.content') .' страницы "'. $page->title . '"',
        ]
    ])
@endsection

@section('content')
    <!-- Button trigger modal -->
{{--    <button--}}
{{--        type="button"--}}
{{--        class="btn btn-success"--}}
{{--        data-toggle="modal"--}}
{{--        data-target="#blockModalCreate"--}}
{{--        id="createBlock"--}}
{{--    ><i class="fas fa-plus"></i>--}}
{{--    </button>--}}
    @include('admin.content.includes.content_modal_dialog')
    @include('admin.block.includes.constructor', [$model = $page, $block_templates = \App\Models\BlockTemplateGroup::pagesGroup()->templates])
{{--    <div class="modal fade" id="confirmDeleteContent">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content bg-danger">--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title"> @lang('system.confirm') </h4>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">×</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <p> @lang('block_contents.confirm_delete_content_question') </p>--}}
{{--                </div>--}}
{{--                <div class="modal-footer justify-content-between">--}}
{{--                    <button type="button" class="btn btn-outline-light" data-dismiss="modal"> @lang('system.cancel') </button>--}}
{{--                    <button type="button" class="btn btn-outline-light" id="deleteBlockContent"> @lang('system.delete') </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.modal-content -->--}}
{{--        </div>--}}
{{--        <!-- /.modal-dialog -->--}}
{{--    </div>--}}
@endsection

@section('adminlte_js')
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/summernote.js') }}"></script>
{{--    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>--}}
{{--    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>--}}
{{--    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>--}}

{{--    <!-- Theme included stylesheets -->--}}
{{--    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
{{--    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">--}}

{{--    <!-- Core build with no theme, formatting, non-essential modules -->--}}
{{--    <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">--}}
{{--    <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>--}}
{{--    <script src="https://martinezdelizarrondo.com/ckplugins/simpleuploads.demo4/ckeditor.js"></script>--}}
{{--    <script src="{{ asset('/js/ckeditor.js') }}"></script>--}}
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/list.js') }}"></script>
{{--    <script src="{{ asset('/js/form.js') }}"></script>--}}
@endsection

@section('adminlte_css')
    <link href="{{ asset('/css/summernote.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
