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
                @foreach($module->attrs as $attribute)
                    <div
                            class="form-group field-{{ \App\Models\ModuleAttribute::TYPE_LIST[$attribute->type] }}">
                        @switch($attribute->type)
                            @case(0)
                            <label for=""> {{ $attribute->name }} </label>
                            {{--            @php--}}

                            {{--                /** @var $block \App\Models\Block */--}}
                            {{--                /** @var $attribute \App\Models\Block_template_attributes */--}}

                            {{--                $url = $block->contents()->attribute($attribute->id)->first()--}}
                            {{--                    ? '/uploads/contents/' .$block->contents()->attribute($attribute->id)->first()->translate->value--}}
                            {{--                    : '/uploads/block_template_attributes/' . $attribute->default_value;--}}

                            {{--            @endphp--}}
                            <img id="optionImage_{{ $attribute->id }}"
                                 class="img-fluid pad"
                                 {{--                                 src="/uploads/module_items/{{$module_item_props_mapped_by_attr[$attribute->id]->value}}"--}}
                                 alt="Preview"
                                 style="display:none"
                            >
                            {{--                            <img class="img-fluid pad" src="" alt="Preview" >--}}
                            {{--            <input type="hidden" name="content[{{ $attribute->id }}]" value="">--}}
                            <div class="input-group mb-3" id="option_image_{{ $attribute->id }}">
                                <div class="custom-file">
                                    {{--                    <input type="hidden" name="item[{{ $attribute->id }}]" value="{{ $attribute->value }}">--}}
                                    <input id="optionFile_{{ $attribute->id }}"
                                           data-id="{{ $attribute->id }}"
                                           type="file"
                                           class="custom-file-input module-item-file-input"
                                           name="item[{{ $attribute->id }}]"
                                           required
                                    >

                                    <label class="custom-file-label"
                                           for="optionFile_{{ $attribute->id }}">{{ $attribute->value }}</label>
                                </div>
                            </div>
                            @break

                            @case(1)

                            <label for="key"> {{ $attribute->name }} </label>
                            <input
                                    name="item[{{ $attribute->id }}]"
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    placeholder="{{ $attribute->type }}"
                                    value=""
                                    required
                            >

                            @break

                            @case(2)

                            <label for=""> {{ $attribute->name }} </label>
                            <textarea
                                    class="form-control input textarea"
                                    rows="3"
                                    placeholder="{{ $attribute->default_value }}"
                                    name="item[{{ $attribute->id }}]"
                                    id="content_{{ $attribute->id }}"
                                    required
                            ></textarea>
                            @break

                            @case(3)

                            <label for=""> {{ $attribute->name }} </label>
                            <textarea
                                    class="form-control input editor"
                                    rows="3"
                                    placeholder="{{ $attribute->default_value }}"
                                    name="item[{{ $attribute->id }}]"
                                    id="content_{{ $attribute->id }}"
                                    required
                            ></textarea>
                            @break
                            @case(5)

                            <label for=""> {{ $attribute->name }} </label>
                            <input
                                    name="item[{{ $attribute->id }}]"
                                    type="time"
                                    class="form-control"
                                    placeholder="{{ $attribute->type }}"
                                    value=""
                                    required
                            >

                            @break
                            @case(6)
                            <label for=""> {{ $attribute->name }} </label>
                            <div class="input-group mb-3" id="option_file_{{ $attribute->id }}">
                                <div class="custom-file">
                                    <input id="optionFile_{{ $attribute->id }}"
                                           data-id="{{ $attribute->id }}"
                                           type="file"
                                           class="custom-file-input module-item-file-input"
                                           name="item[{{ $attribute->id }}]"

                                    >

                                    <label class="custom-file-label"
                                           for="optionFile_{{ $attribute->id }}">{{ $attribute->value }}</label>
                                </div>
                            </div>
                            @break

                        @endswitch
                    </div>
                @endforeach


                @include('admin.module_items.includes.repeaters', ['repeaters' => $module->repeaters])


                <div
                        class="module-attributes"
                        {{--                    id="module_attributes_{{ $module_item->id }}"--}}

                >
                    <div class="input-group"></div>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                 aria-labelledby="custom-tabs-two-profile-tab">
                @include('admin.additions.includes.create_update_form', [$lang = \App\Models\Language::where('id',3)->first(), $model = new \App\Models\ModuleItem])
            </div>
            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                 aria-labelledby="custom-tabs-three-profile-tab">
                @include('admin.seo.includes.create_update_form', [$lang = \App\Models\Language::where('id',3)->first(), $model = new \App\Models\ModuleItem])
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
