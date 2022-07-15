<?php
/**
 * @var $model \App\Models\Page;
 * @var $pages \Illuminate\Database\Eloquent\Collection;
 * @var $languages \Illuminate\Database\Eloquent\Collection;
 */
?>
@csrf

{{--<link rel="stylesheet" href="/lib/codemirror.css">--}}
{{--<script src="/lib/codemirror.js"></script>--}}
{{--<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">--}}
{{--<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-ko-KR.min.js"></script>--}}
<!-- include libraries(jQuery, bootstrap) -->
{{--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
{{--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" />--}}
{{--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}

<!-- include summernote css/js-->
{{--<link href="summernote.css" rel="stylesheet">--}}
{{--<script src="summernote.js"></script>--}}


{{--*********--}}
{{--*********--}}
{{--Templates--}}
{{--*********--}}
{{--*********--}}


{{--                   INPUT TEMPLATE--}}
<div class="input-group mb-3" id="option_image" style="display: none">
    <div class="custom-file">
        <input type="file" id="optionFile" class="custom-file-input input" name="value">
        <label class="custom-file-label" for="optionFile"> @lang('system.select image') </label>
    </div>
</div>
{{--                   INPUT TEMPLATE--}}
<div class="input-group mb-3" id="option_input" style="display: none">
    <input
            name="value"
            type="text"
            class="form-control input"
            placeholder="{{ __('system.input') }}"
            autocomplete="off"
    >
</div>
{{--                   INPUT TEMPLATE--}}
<div class="input-group mb-3" id="option_textarea" style="display: none">
    <textarea
            class="form-control input"
            rows="3"
            placeholder="{{ __('block_contents.content') }}"
            name="value"
    ></textarea>
</div>
{{--                   INPUT TEMPLATE--}}
<div class="input-group mb-3" id="option_editor" style="display: none">
    <textarea
            class="form-control input"
            rows="3"
            placeholder="{{ __('block_contents.content') }}"
            name="value"
    ></textarea>
</div>

@section('adminlte_js')
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/summernote.js') }}"></script>
    <script src="{{ asset('/js/var.js') }}"></script>
@endsection

{{--@dd($variable)--}}
<div class="card-body">
    <div class="form-group">
        <label for="key"> @lang('variables.key') </label>
        <input
                name="key"
                type="text"
                class="form-control"
                id="key"
                placeholder="Key"
                value="{{$variable->key}}"
        >
    </div>
    <div class="form-group">
        <label for="name"> @lang('variables.name') </label>
        <input
                name="name"
                type="text"
                class="form-control"
                id="name"
                placeholder="name"
                value="{{$variable->name}}"
        >
    </div>
    {{--    @dd($variable)--}}
    <div class="form-group">
        <label for="selectType"> @lang('block_option_contents.add_value') </code></label>
        <select
                class="custom-select form-control-border"
                id="type"
                name="type">
            {{--            <option value="-1" disabled hidden> @lang('variables.select_type') </option>--}}
            @foreach(\App\Models\Variable::TYPE_LIST as $id => $type)
                <option
                        value="{{ $type }}"
                        @if($id == $variable->type) selected @endif
                >{{ __('system.'.$type) }}</option>
            @endforeach
        </select>
    </div>
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active @endif"
                           id="addition_tab_link"
                           data-toggle="pill"
                           href="#content_tab_{{ $language->iso }}"
                           role="tab"
                           aria-controls="custom-tabs-two-home"
                           aria-selected="false"
                        >
                            {{ $language->iso }}
                        </a>
                    </li>
                @endforeach

                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link"--}}
                {{--                       id="seo_tab_link"--}}
                {{--                       data-toggle="pill"--}}
                {{--                       href="#seo_tab_"--}}
                {{--                       role="tab"--}}
                {{--                       aria-controls="custom-tabs-two-profile"--}}
                {{--                       aria-selected="false"--}}
                {{--                    >--}}
                {{--                        @lang('seo.form_tab')--}}
                {{--                    </a>--}}
                {{--                </li>--}}
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
                @foreach(\App\Models\Language::enabled()->get() as $language)
                    <div class="tab-pane fade show @if($loop->first) active @endif"
                         id="content_tab_{{ $language->iso }}"
                         role="tabpanel"
                         aria-labelledby="content_tab_{{ $language->iso }}">
                        <div class="variable-value" data-iso="{{ $language->iso }}">
                            @php
                                $value = $variable->translations()->where('lang_id', $language->id)->value('value');
                            @endphp
                            @switch($variable->type)
                                @case(0)
                                <div class="input-group mb-3" id="option_image">
                                    <div class="custom-file">
                                        <input type="file" id="optionFile" class="custom-file-input input" name="value[{{ $language->iso }}]">
                                        <label class="custom-file-label"
                                               for="optionFile"> @lang('system.select image') </label>
                                    </div>
                                </div>
                                @break

                                @case(1)
                                <div class="input-group mb-3" id="option_input">
                                    <input
                                            name="value[{{ $language->iso }}]"
                                            type="text"
                                            class="form-control input"
                                            placeholder="{{ __('system.input') }}"
                                            autocomplete="off"
                                            value="{{ $value }}"
                                    >
                                </div>
                                @break
                                @case(2)
                                <div class="input-group mb-3" id="option_textarea">
                    <textarea
                            class="form-control input"
                            rows="3"
                            placeholder="{{ __('block_contents.content') }}"
                            name="value[{{ $language->iso }}]"
                    >{{ $value }}</textarea>
                                </div>
                                {{--                   INPUT TEMPLATE--}}

                                @break
                                @case(3)
                                <div class="input-group mb-3" id="option_editor">
                    <textarea
                            class="form-control input"
                            rows="3"
                            placeholder="{{ __('block_contents.content') }}"
                            name="value[{{ $language->iso }}]"
                    >{{ $value }}</textarea>
                                </div>
                                @break
                            @endswitch
                            {{--        <div class="form-group">--}}
                            {{--            <label for="value"> @lang('variables.value') </label>--}}
                            {{--            <input--}}
                            {{--                name="value"--}}
                            {{--                type="text"--}}
                            {{--                class="form-control"--}}
                            {{--                id="value"--}}
                            {{--                placeholder="value"--}}
                            {{--                value=""--}}
                            {{--            >--}}
                            {{--        </div>--}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>
