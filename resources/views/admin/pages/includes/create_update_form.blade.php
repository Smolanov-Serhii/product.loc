<?php
/**
 * @var $model \App\Models\Page;
 * @var $pages \Illuminate\Database\Eloquent\Collection;
 * @var $languages \Illuminate\Database\Eloquent\Collection;
 */
?>
@csrf
<div class="card-body">
    @if($model->parent_page_id || !$model->id)
        <div class="form-group">
            <label> @lang('pages.parent_page_id') </label>
            <select
                    class="form-control select2-hidden-accessible"
                    name="parent_page_id"
                    style="width: 100%;"
                    data-select2-id="17"
                    tabindex="-1"
                    aria-hidden="true"
            >
                @foreach($pages as $page)
                    <option
                            value="{{ $page->id }}"
                            @if($page->parent_page_id == $model->id) selected="selected" @endif
                            @if($model->id == $page->id) disabled @endif
                            data-select2-id="{{ $page->id }}"
                    >
                        {{ $page->title }}
                    </option>
                @endforeach
            </select>
        </div>
    @elseif($model->id)
        <label for=""> @lang('pages.this_page_cannot_have_root') </label>
    @else
        <label for=""> @lang('pages.root_page') </label>
    @endif

    {{--    <div class="form-group">--}}
    {{--        <label for="image"> @lang('system.image') </label>--}}
    {{--        @if($model->image_path)--}}
    {{--            <img class="img-fluid pad" src="{{ '/uploads/pages/thumbs/' . $model->image_path }}" alt="Photo">--}}
    {{--        @endif--}}
    {{--        <div class="input-group">--}}
    {{--            <div class="custom-file">--}}
    {{--                <input type="file" class="custom-file-input" id="image" name="image">--}}
    {{--                <label class="custom-file-label" for="exampleInputFile"> @lang('system.select image') </label>--}}
    {{--            </div>--}}
    {{--            <div class="input-group-append">--}}
    {{--                <span class="input-group-text" id=""> @lang('system.upload') </span>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="row">
        <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-right-tabContent">
                <div class="form-group">
                    <div class="custom-control custom-switch" style="display: inline-block; width: 30px; margin: 10px;">
                        <input type="hidden" name="auth_only" value="0">
                        <input
                                name="auth_only"
                                type="checkbox"
                                id="auth_only"
                                class="custom-control-input enable-block-switcher"
                                value="1"
                                @if($model->auth_only) checked @endif
                        >
                        <label class="custom-control-label" for="auth_only"> @lang('auth.auth_only') </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch" style="display: inline-block; width: 30px; margin: 10px;">
                        <input type="hidden" name="is_main" value="0">
                        <input
                                name="is_main"
                                type="checkbox"
                                id="is_main"
                                class="custom-control-input enable-block-switcher"
                                value="1"
                                @if($model->is_main) checked @endif
                        >
                        <label class="custom-control-label" for="is_main"> @lang('pages.is_main') </label>
                    </div>
                </div>

                @foreach($languages as $count => $lang)
                    <div class="tab-pane fade @if(!$count) show active @endif" id="vert-tabs-right-{{ $lang->iso }}"
                         role="tabpanel" aria-labelledby="vert-tabs-right-{{ $lang->iso }}-tab">
                        <div class="form-check">
                            <input
                                    name="properties[{{ $lang->iso }}][enabled]"
                                    type="checkbox"
                                    class="form-check-input"
                                    id="enabled_{{ $lang->iso }}"
                                    @if($lang->enabled) checked
                                    @else disabled
                                    @endif
                                    value="{{ $model->property($lang->id) ? $model->property($lang->id)->enabled : old('properties.'.$lang->iso.'.enabled', true) }}"
                            >
                            <label class="form-check-label"
                                   for="enabled_{{ $lang->iso }}"> @lang('system.status') </label>
                        </div>
                        <div class="card card-primary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active"
                                           id="addition_tab_link"
                                           data-toggle="pill"
                                           href="#addition_tab_{{ $lang->iso }}"
                                           role="tab"
                                           aria-controls="custom-tabs-two-home"
                                           aria-selected="false"
                                        >
                                            @lang('additions.form_tab')
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           id="seo_tab_link"
                                           data-toggle="pill"
                                           href="#seo_tab_{{ $lang->iso }}"
                                           role="tab"
                                           aria-controls="custom-tabs-two-profile"
                                           aria-selected="false"
                                        >
                                            @lang('seo.form_tab')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-two-tabContent">
                                    <div class="tab-pane fade show active" id="addition_tab_{{ $lang->iso }}" role="tabpanel"
                                         aria-labelledby="custom-tabs-two-home-tab">
                                        @include('admin.additions.includes.create_update_form')
                                    </div>
                                    <div class="tab-pane fade" id="seo_tab_{{ $lang->iso }}" role="tabpanel"
                                         aria-labelledby="custom-tabs-two-profile-tab">
                                        @include('admin.seo.includes.create_update_form')
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="title_{{ $lang->iso }}"> @lang('system.title') </label>--}}
                        {{--                            <input--}}
                        {{--                                name="properties[{{ $lang->iso }}][title]"--}}
                        {{--                                type="text"--}}
                        {{--                                class="form-control"--}}
                        {{--                                id="title_{{ $lang->iso }}"--}}
                        {{--                                placeholder="Title"--}}
                        {{--                                value="{{ $model->property($lang->id) ? $model->property($lang->id)->title : old('properties.'.$lang->iso.'.title') }}"--}}
                        {{--                            >--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="keywords_{{ $lang->iso }}"> @lang('pages.keywords') </label>--}}
                        {{--                            <input--}}
                        {{--                                name="properties[{{ $lang->iso }}][keywords]"--}}
                        {{--                                type="text"--}}
                        {{--                                class="form-control"--}}
                        {{--                                id="keywords_{{ $lang->iso }}"--}}
                        {{--                                placeholder="Keywords"--}}
                        {{--                                value="{{ $model->property($lang->id) ? $model->property($lang->id)->keywords : old('properties.'.$lang->iso.'.keywords') }}"--}}
                        {{--                            >--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <script>--}}
                        {{--                                var editor = CodeMirror.fromTextArea(document.getElementById("textarea"), {--}}
                        {{--                                    lineNumbers: true,--}}
                        {{--                                    mode: "text/html",--}}
                        {{--                                    matchBrackets: true--}}
                        {{--                                });--}}
                        {{--                            </script>--}}
                        {{--                            <label> @lang('pages.description') </label>--}}
                        {{--                            <div id="textarea">--}}
                        {{--                                text--}}
                        {{--                            </div>--}}
                        {{--                            <textarea--}}
                        {{--                                name="properties[{{ $lang->iso }}][description]"--}}
                        {{--                                class="form-control"--}}
                        {{--                                rows="3"--}}
                        {{--                                placeholder="Enter ..."--}}
                        {{--                                id="textarea"--}}
                        {{--                            >{{ $model->property($lang->id) ? $model->property($lang->id)->description : old('properties.'.$lang->iso.'.description') }}</textarea>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="h1_{{ $lang->iso }}">h1</label>--}}
                        {{--                            <input--}}
                        {{--                                name="properties[{{ $lang->iso }}][h1]"--}}
                        {{--                                type="text"--}}
                        {{--                                class="form-control"--}}
                        {{--                                id="h1_{{ $lang->iso }}"--}}
                        {{--                                placeholder="h1"--}}
                        {{--                                value="{{ $model->property($lang->id) ? $model->property($lang->id)->h1 : old('properties.'.$lang->iso.'.h1') }}"--}}
                        {{--                            >--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="h2_{{ $lang->iso }}">h2</label>--}}
                        {{--                            <input--}}
                        {{--                                name="properties[{{ $lang->iso }}][h2]"--}}
                        {{--                                type="text"--}}
                        {{--                                class="form-control"--}}
                        {{--                                id="h2_{{ $lang->iso }}"--}}
                        {{--                                placeholder="h2"--}}
                        {{--                                value="{{ $model->property($lang->id) ? $model->property($lang->id)->h2 : old('properties.'.$lang->iso.'.h2') }}"--}}
                        {{--                            >--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="alias_{{ $lang->iso }}"> @lang('pages.alias') </label>--}}
                        {{--                            <input--}}
                        {{--                                name="properties[{{ $lang->iso }}][alias]"--}}
                        {{--                                type="text"--}}
                        {{--                                class="form-control"--}}
                        {{--                                id="alias_{{ $lang->iso }}"--}}
                        {{--                                placeholder="alias"--}}
                        {{--                                value="{{ $model->property($lang->id) ? $model->property($lang->id)->alias : old('properties.'.$lang->iso.'.alias') }}"--}}
                        {{--                            >--}}
                        {{--                        </div>--}}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-5 col-sm-3">
            <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="vert-tabs-right-tab" role="tablist"
                 aria-orientation="vertical">
                @foreach($languages as $count => $lang)
                    <a
                            class="nav-link @if(!$count) active @endif"
                            id="vert-tabs-right-{{ $lang->iso }}-tab"
                            data-toggle="pill" href="#vert-tabs-right-{{ $lang->iso }}"
                            role="tab" aria-controls="vert-tabs-right-{{ $lang->iso }}"
                            aria-selected="{{ (!$count) ? 'true' : 'false' }}">
                        {{ $lang->iso }} @if(!$lang->enabled) (@lang('system.disable')) @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>


@section('adminlte_js')
    {{--    <script src="https://cdn.quilljs.com/1.2.6/quill.min.js"></script>--}}
    <script src="{{ asset('/js/summernote.js') }}"></script>
    <script src="{{ asset('/js/additions/form.js') }}"></script>
    <script src="{{ asset('/js/seo/form.js') }}"></script>
    <script>
        var aliases = ({!! json_encode($aliases) !!});
    </script>
@endsection

@section('adminlte_css')
    <link href="{{ asset('/css/summernote.css') }}" rel="stylesheet">
@endsection
