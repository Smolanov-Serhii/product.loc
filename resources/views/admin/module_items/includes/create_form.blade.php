<?php
/**
 * @var $model \App\Models\Page;
 */
?>
@csrf
<div class="card card-primary card-outline card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active"
                   id="custom-tabs-two-home-tab"
                   data-toggle="pill" href="#custom-tabs-two-home"
                   role="tab" aria-controls="custom-tabs-two-home"
                   aria-selected="false"
                >
                    @lang('module_attributes.form_tab')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   id="custom-tabs-two-profile-tab"
                   data-toggle="pill"
                   href="#custom-tabs-two-profile"
                   role="tab"
                   aria-controls="custom-tabs-two-profile"
                   aria-selected="false"
                >
                    @lang('additions.form_tab')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   id="custom-tabs-three-profile-tab"
                   data-toggle="pill"
                   href="#custom-tabs-three-profile"
                   role="tab"
                   aria-controls="custom-tabs-three-profile"
                   aria-selected="false"
                >
                    @lang('seo.form_tab')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   id="custom-tabs-for-taxonomy-tab"
                   data-toggle="pill"
                   href="#custom-tabs-for-taxonomy"
                   role="tab"
                   aria-controls="custom-tabs-for-taxonomy"
                   aria-selected="false"
                >
                    @lang('taxonomy_items.form_tab')
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel"
                 aria-labelledby="custom-tabs-two-home-tab">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                                <li class="nav-item">
                                    <a class="nav-link @if($loop->first) active @endif"
                                       id="attribute_tab_link"
                                       data-toggle="pill"
                                       href="#attribute_tab_{{ $language->iso }}"
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
                            @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                                <div class="tab-pane fade show @if($loop->first) active @endif"
                                     id="attribut_tab_{{ $language->iso }}"
                                     role="tabpanel"
                                     aria-labelledby="content_tab_{{ $language->iso }}">
                                    @include('admin.module_items.includes.new_form_attributes')
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                 aria-labelledby="custom-tabs-two-profile-tab">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                                <li class="nav-item">
                                    <a class="nav-link @if($loop->first) active @endif"
                                       id="content_tab_link"
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
                            @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                                <div class="tab-pane fade show @if($loop->first) active @endif" id="content_tab_{{ $language->iso }}" role="tabpanel"
                                     aria-labelledby="content_tab_{{ $language->iso }}">
                                    @include('admin.additions.includes.create_update_form', [$lang = $language, $model = $module_item])
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                 aria-labelledby="custom-tabs-three-profile-tab">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                                <li class="nav-item">
                                    <a class="nav-link @if($loop->first) active @endif"
                                       id="seo_tab_link"
                                       data-toggle="pill"
                                       href="#seo_tab_{{ $language->iso }}"
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
                            @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                                <div class="tab-pane fade show @if($loop->first) active @endif" id="seo_tab_{{ $language->iso }}" role="tabpanel"
                                     aria-labelledby="content_tab_{{ $language->iso }}">
                                    @include('admin.seo.includes.create_update_form', [$lang = $language, $model = $module_item])
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-for-taxonomy" role="tabpanel"
                 aria-labelledby="custom-tabs-for-taxonomy-tab">
                @include('admin.module_items.includes.taxonomy_tab')
            </div>
        </div>
    </div>
</div>
{{--<div class="card-body">--}}
{{--    <div class="form-group">--}}
{{--        <label for="key"> @lang('modules.excerpt') </label>--}}
{{--        <textarea--}}
{{--            name="excerpt"--}}
{{--            type="text"--}}
{{--            class="form-control"--}}
{{--            id="name"--}}
{{--            placeholder="{{ __('modules.excerpt') }}"--}}
{{--            value="{{ $module->name ?? old('name') }}"--}}
{{--        ></textarea>--}}
{{--    </div>--}}

{{--    @include('admin.additions.includes.create_update_form', [$lang = \App\Models\Languages::where('id',3)->first(), $model = new \App\Models\Module_items()])--}}
{{--    --}}

{{--    <div class="module-attributes">--}}
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
{{--    </div>--}}
{{--</div>--}}

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>


@section('adminlte_js')
    @parent('adminlte_js')
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
