@csrf

<div class="card-body">
        <div class="row">
        <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-right-tabContent">
                <div class="form-group">
                    <label for="key"> @lang('taxonomy_item.key') </label>
                    <input
                        name="key"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="@lang('taxonomy_item.key')"
                        value="{{ $taxonomy_item->key ?? old('key') }}"
                    >
                </div>
                <div class="form-group">
                    <label for="key"> @lang('taxonomy_item.name') </label>
                    <input
                        name="name"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="@lang('taxonomy_item.name')"
                        value="{{ $taxonomy_item->name ?? old('name') }}"
                    >
                </div>

            </div>
            @foreach($taxonomy_item->taxonomy->attrs as $attribute)
                <div
                        class="form-group field-{{ \App\Models\TaxonomyAttribute::TYPE_LIST[$attribute->type] }}">
                    @switch($attribute->type)
                        @case(0)
                        <label for=""> {{ $attribute->name }} </label>
                        <img id="optionImage_{{ $attribute->id }}"
                             class="img-fluid pad"
                             alt="Preview"
                             @isset($props_mapped_by_attribute_id)
                                src="{{ "/uploads/taxonomy_item_property/{$props_mapped_by_attribute_id[$attribute->id]->value}" }}"
                             @else
                                style="display:none"
                             @endif

                        >
                        <div class="input-group mb-3" id="option_image_{{ $attribute->id }}">
                            <div class="custom-file">
{{--                                <input type="hidden" name="item[{{ $attribute->id }}]" value="{{ $attribute->value }}">--}}
                                <input id="optionFile_{{ $attribute->id }}"
                                       data-id="{{ $attribute->id }}"
                                       type="file"
                                       class="custom-file-input taxonomy-item-file-input"
                                       name="properties[{{ $attribute->id }}]"
                                       value="{{ isset($props_mapped_by_attribute_id) ? $props_mapped_by_attribute_id[$attribute->id]->value : '' }}"
                                >

                                <label class="custom-file-label"
                                       for="optionFile_{{ $attribute->id }}">{{ $attribute->value }}</label>
                            </div>
                        </div>
                        @break

                        @case(1)

                        <label for="key"> {{ $attribute->name }} </label>
                        <input
                                name="properties[{{ $attribute->id }}]"
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="{{ $attribute->type }}"
                                value="{{ isset($props_mapped_by_attribute_id) ? $props_mapped_by_attribute_id[$attribute->id]->value : '' }}"
                        >

                        @break

                        @case(2)

                        <label for=""> {{ $attribute->name }} </label>
                        <textarea
                                class="form-control input textarea"
                                rows="3"
                                placeholder="{{ $attribute->default_value }}"
                                name="properties[{{ $attribute->id }}]"
                                id="content_{{ $attribute->id }}"
                        >{{ isset($props_mapped_by_attribute_id) ? $props_mapped_by_attribute_id[$attribute->id]->value : '' }}</textarea>
                        @break

                        @case(3)

                        <label for=""> {{ $attribute->name }} </label>
                        <textarea
                                class="form-control input editor"
                                rows="3"
                                placeholder="{{ $attribute->default_value }}"
                                name="properties[{{ $attribute->id }}]"
                                id="content_{{ $attribute->id }}"
                        >{{ isset($props_mapped_by_attribute_id) ? $props_mapped_by_attribute_id[$attribute->id]->value : '' }}</textarea>
                        @break
                        @case(4)

                        <label for=""> {{ $attribute->name }} </label>
                        <input
                                name="properties[{{ $attribute->id }}]"
                                type="time"
                                class="form-control"
                                placeholder="{{ $attribute->type }}"
                                value="{{ isset($props_mapped_by_attribute_id) ? $props_mapped_by_attribute_id[$attribute->id]->value : '' }}"
                        >

                        @break
                        @case(5)
                        <label for=""> {{ $attribute->name }} </label>
                        <div class="input-group mb-3" id="option_file_{{ $attribute->id }}">
                            <span>{{ isset($props_mapped_by_attribute_id) ? $props_mapped_by_attribute_id[$attribute->id]->value : '' }}</span>
                            <div class="custom-file">
                                <input id="optionFile_{{ $attribute->id }}"
                                       data-id="{{ $attribute->id }}"
                                       type="file"
                                       class="custom-file-input module-item-file-input"
                                       name="properties[{{ $attribute->id }}]"
                                >

                                <label class="custom-file-label"
                                       for="optionFile_{{ $attribute->id }}">{{ $attribute->value }}</label>
                            </div>
                        </div>
                        @break

                    @endswitch
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>

@section('adminlte_js')
    @parent('adminlte_js')
    <script src="{{ asset('/js/summernote.js') }}"></script>
    <script src="{{ asset('/js/taxonomies/item_form.js') }}"></script>
@endsection

@section('adminlte_css')
    <link href="{{ asset('/css/summernote.css') }}" rel="stylesheet">
@endsection
