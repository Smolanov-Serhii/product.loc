<?php
/**
 * @var $module_item \App\Models\ModuleItem;
 * @var $attribute \App\Models\ModuleAttribute;
 */

$block_templates = $module_item->module->group->templates;

?>
@csrf
<div class="card card-primary card-outline card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active"
                   id="custom-tabs-one-home-tab"
                   data-toggle="pill" href="#custom-tabs-one-home"
                   role="tab" aria-controls="custom-tabs-one-home"
                   aria-selected="true"
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
                   id="custom-tabs-five-blocks-tab"
                   data-toggle="pill" href="#custom-tabs-five-blocks"
                   role="tab" aria-controls="custom-tabs-five-blocks"
                   aria-selected="false"
                >
                    @lang('block.form_tab')
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
                    @lang('taxonomy_item.form_tab')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   id="custom-tabs-for-module-tab"
                   data-toggle="pill" href="#custom-tabs-for-module"
                   role="tab" aria-controls="custom-tabs-for-module"
                   aria-selected="false"
                >
                    @lang('modules.module_tab')
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                 aria-labelledby="custom-tabs-one-home-tab">
                @foreach($module_item->module->attrs as $attribute)
                    <div
                            class="form-group {{ $module_item->module->name }}-field field-{{ \App\Models\ModuleAttribute::TYPE_LIST[$attribute->type] }}">
                        @switch($attribute->type)
                            @case(0)
                            {{--                        @dd($module_item_props_mapped_by_attr)--}}
                            <label for=""> {{ $attribute->name }} </label>
                            @isset($module_item_props_mapped_by_attr[$attribute->id])
                                <img id="optionImage_{{ $attribute->id }}"
                                     class="img-fluid pad"
                                     src="/uploads/module_items/{{$module_item_props_mapped_by_attr[$attribute->id]->value}}"
                                     alt="Preview"
                                >
                            @endif
                            <div class="input-group mb-3" id="option_image_{{ $attribute->id }}">
                                <div class="custom-file">
                                    <input id="optionFile_{{ $attribute->id }}"
                                           data-id="{{ $attribute->id }}"
                                           type="file"
                                           class="custom-file-input module-item-file-input"
                                           name="attributes[{{ $attribute->id }}]"
                                    >
                                    <label class="custom-file-label" for="optionFile_{{ $attribute->id }}">
                                        {{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}
                                    </label>
                                </div>
                            </div>
                            @break

                            @case(1)
                            <label for="key"> {{ $attribute->name }} </label>
                            <input
                                    name="attributes[{{ $attribute->id }}]"
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    placeholder="{{ $attribute->type }}"
                                    value="{{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}"
                            >

                            @break

                            @case(2)
                            <label for=""> {{ $attribute->name }} </label>
                            <textarea
                                    class="form-control input textarea"
                                    rows="3"
                                    placeholder="{{ __('system.textarea') }}"
                                    name="attributes[{{ $attribute->id }}]"
                                    id="content_{{ $attribute->id }}"
                            >{{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}</textarea>
                            @break

                            @case(3)
                            <label for=""> {{ $attribute->name }} </label>
                            <textarea
                                    class="form-control input editor"
                                    rows="3"
                                    placeholder="{{ $attribute->default_value }}"
                                    name="attributes[{{ $attribute->id }}]"
                                    id="content_{{ $attribute->id }}"
                            >{{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}</textarea>
                            @break
                            @case(5)
                            <label for="key"> {{ $attribute->name }} </label>
                            <input
                                    name="attributes[{{ $attribute->id }}]"
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    placeholder="{{ $attribute->type }}"
                                    value="{{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}"
                            >

                            @break
                            @case(6)
                            {{--                        @dd($module_item_props_mapped_by_attr)--}}
                            <label for=""> {{ $attribute->name }} </label>
                            <div class="input-group mb-3" id="option_file_{{ $attribute->id }}">
                                <div class="custom-file">
                                    <input id="optionFile_{{ $attribute->id }}"
                                           data-id="{{ $attribute->id }}"
                                           type="file"
                                           class="custom-file-input module-item-file-input"
                                           name="attributes[{{ $attribute->id }}]"
                                    >
                                    <label class="custom-file-label" for="optionFile_{{ $attribute->id }}">
                                        {{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}
                                    </label>
                                </div>
                                @isset($module_item_props_mapped_by_attr[$attribute->id]->value)
                                    <button
                                            type="button"
                                            class="btn btn-danger btn-icon module-item clear-value"
                                            data-prop_id="{{ $module_item_props_mapped_by_attr[$attribute->id]->id }}"
                                            data-attr_id="{{ $attribute->id }}"
                                    >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                @endif
                            </div>
                            @break
                        @endswitch
                    </div>
                @endforeach

                @if($module_item->iterations->count())
                    @include('admin.module_items.includes.iterations', ['iterations' => $module_item->iterations])
                @else
                    @include('admin.module_items.includes.repeaters', ['repeaters' => $module_item->module->repeaters])
                @endif

                <div
                        class="module-attributes"
                        id="module_attributes_{{ $module_item->id }}"
                >
                    <div class="input-group"></div>
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
            <div class="tab-pane fade" id="custom-tabs-five-blocks" role="tabpanel"
                 aria-labelledby="custom-tabs-five-blocks-tab">
                @include('admin.block.includes.constructor', [$model = $module_item])
            </div>
            <div class="tab-pane fade" id="custom-tabs-for-taxonomy" role="tabpanel"
                 aria-labelledby="custom-tabs-for-taxonomy-tab">
                @include('admin.module_items.includes.taxonomy_tab')
            </div>
            <div class="tab-pane fade" id="custom-tabs-for-module" role="tabpanel"
                 aria-labelledby="custom-tabs-for-module-tab">
                <div class="modules-synch-grpup">
                    @include('admin.module_items.includes.module_tab')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>


@section('adminlte_js')
    @parent('adminlte_js')
    <script src="{{ asset('/js/summernote.js') }}"></script>
    <script src="{{ asset('/js/additions/form.js') }}"></script>
    <script src="{{ asset('/js/seo/form.js') }}"></script>
    <script src="{{ asset('/js/module_items/form.js') }}"></script>
    <script src="{{ asset('/js/list.js') }}"></script>
    <script>
        var aliases = {{ \Illuminate\Support\Js::from($aliases) }}
    </script>
@endsection

@section('adminlte_css')
    <link href="{{ asset('/css/summernote.css') }}" rel="stylesheet">
@endsection
