@foreach($module->attrs as $attribute)
    @php

    @endphp
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