{{--@foreach($template->attrs as $attribute)--}}
<div class="form-group field-{{ \App\Models\BlockTemplateAttribute::TYPE_LIST[$attribute->type] }}">
    @php
        /** @var $block \App\Models\Block */
        /** @var $attribute \App\Models\BlockTemplateAttribute */
        /** @var $language \App\Models\Language */
        $prop = $block->contents()->attribute($attribute->id)->first();
        $input_name = "content[{$language->iso}][{$attribute->id }]";

        $value = $prop
        ? ($block->contents()->attribute($attribute->id)->first()->translations()->where('lang_id', $language->id)->first()->value ?? '')
        : $attribute->default_value;


    @endphp
    @switch($attribute->type)
        @case(0)
        <label for=""> {{ $attribute->name }} </label>
        @php

            /** @var $prop \App\Models\BlockContentTranslation | \App\Models\BlockTemplateAttribute */
            /** @var $block \App\Models\Block */
            /** @var $attribute \App\Models\BlockTemplateAttribute */
            $url = $prop
                ? '/uploads/contents/' . $value
                : '/uploads/block_template_attributes/' . $attribute->default_value;
            $u_img_id = rand(10**4, 10**5);
        @endphp
        <img class="img-fluid pad" src="{{ $url }}" alt="Preview" id="image_{{ $attribute->id }}_{{ $u_img_id }}"
             @if(!$prop) style="display:none;" @endif>
        @if($prop)
            <button type="button" class="btn btn-danger btn-icon block clear-value" data-prop_id="{{ $prop->id }}"
                    data-attr_id="{{ $attribute->id }}_{{ $u_img_id }}">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        @endif
        <div class="input-group mb-3" id="option_image_{{ $attribute->id }}">
            <div class="custom-file">
                {{--                    <input--}}
                {{--                            type="hidden"--}}
                {{--                            name="content[{{ $attribute->id }}]"--}}
                {{--                            value="{{ $attribute->value }}">--}}

                <input
                        id="optionFile_{{ $attribute->id }}_{{ $u_img_id }}"
                        type="file"
                        class="custom-file-input input"
                        name="{{ $input_name }}"
                        data-id="{{ $attribute->id }}_{{ $u_img_id }}">

                <label class="custom-file-label"
                       for="optionFile_{{ $attribute->id }}">{{ $attribute->value }}</label>
            </div>
        </div>
        @break

        @case(1)
        {{--                @dd( $block->contents()->attribute($attribute->id)->first()->translate->value ?? $attribute->value)--}}
        {{--            <div class="input-group mb-3" id="option_input_{{ $attribute->id }}" style="">--}}
        <label for=""> {{ $attribute->name }} </label>
        <input
                name="{{ $input_name }}"
                type="text"
                class="form-control input"
                placeholder="{{ $attribute->default_value }}"
                autocomplete="off"
                value="{{ $value }}"
        >
        {{--                <div class="input-group-append">--}}
        {{--                    <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        @break

        @case(2)
        {{--            @dd($block->contents()->attribute($attribute->id)->first()->translate->value)--}}
        {{--            @dd($block->contents()->attribute($attribute->id)->first()->translate)--}}
        {{--            <div class="input-group mb-3" id="option_textarea_{{ $attribute->id }}" style="">--}}
        {{--            @dd( $block->contents()->attribute($attribute->id)->first()->translate->value)--}}
        <label for=""> {{ $attribute->name }} </label>
        <textarea
                class="form-control input textarea"
                rows="3"
                placeholder="{{ $attribute->default_value }}"
                name="{{ $input_name }}"
                id="content_{{ $attribute->id }}"
        >{{ $value }}</textarea>
        {{--                <div class="input-group-append">--}}
        {{--                    <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        @break
        @case(3)


        <div class="input-group mb-3" id="option_editor_{{ $u_id }}">
            <label for=""> {{ $attribute->name }} </label>
            <textarea
                    class="editor"
                    id="content_{{ $u_id }}_{{ $attribute->id }}_{{ $language->id }}"
                    name="{{ $input_name }}"
            >{!! $value !!}</textarea>
        </div>

        {{--        <label for=""> {{ $attribute->name }} </label>--}}
        {{--        <input--}}
        {{--            type="hidden"--}}
        {{--            id="hidden_content_{{ $attribute->id }}"--}}
        {{--            name="content[{{ $attribute->id }}]"--}}
        {{--        >--}}
        {{--        <div class="textarea" id="content_{{ $attribute->id }}">--}}
        {{--            {!! $block->contents()->attribute($attribute->id)->first()->translate->value ?? '' !!}--}}
        {{--        </div>--}}
        {{--            <textarea--}}
        {{--                class="form-control input textarea"--}}
        {{--                rows="3"--}}
        {{--                placeholder="{{ $attribute->default_value }}"--}}
        {{--                name="content[{{ $attribute->id }}]"--}}
        {{--                id="content_{{ $attribute->id }}"--}}
        {{--            >{{ $block->contents()->attribute($attribute->id)->first()->translate->value ?? '' }}</textarea>--}}
        @break

        @case(4)
        repeater2
        @break

        @case(5)
        <label for=""> {{ $attribute->name }} </label>
        @php

            /** @var $block \App\Models\Block */
            /** @var $attribute \App\Models\BlockTemplateAttribute */

            $content = $block->contents()->attribute($attribute->id)->first();
            $content = $content ? $content->translate : $attribute;
        @endphp
        {{ $content->value ?? $content->default_value }}
        {{--        <input type="hidden" name="content[{{ $attribute->id }}]" value="">--}}
        <div class="input-group mb-3" id="option_file_{{ $attribute->id }}">
            <div class="custom-file">
                {{--                <input type="hidden" name="content[{{ $attribute->id }}]" value="{{ $attribute->value }}">--}}
                <input
                        id="optionFile_{{ $attribute->id }}"
                        type="file"
                        class="custom-file-input input"
                        name="{{ $input_name }}"
                        data-id="{{ $attribute->id }}">
                <label class="custom-file-label"
                       for="optionFile_{{ $attribute->id }}">{{ $attribute->value }}</label>
            </div>
        </div>
        @break

        @case(6)
        <label for=""> {{ $attribute->name }} </label>
        <input
                name="{{ $input_name }}"
                type="color"
                class="form-control color"
                placeholder="{{ $attribute->default_value }}"
                autocomplete="off"
                value="{{ $value }}"
        >
        @break

        @case(7)
        @php
            /** @var $attribute \App\Models\BlockTemplateAttribute */
            $properties = $attribute->setting->decodedProperties;
        @endphp

        <label for="{{ $properties['id'] }}">{{ $attribute->name }}</label>
        <select
                name="{{ $input_name }}"
                id="{{ $properties['id'] }}"
                @class($properties['class_list'])
                @isset($properties['size']) size="{{ $properties['size'] }}" @endif
                @if(isset($properties['multiple']) and $properties['multiple']) multiple="multiple" @endif
        >

            @foreach($properties['options_list'] as $value => $option)
                @if($prop)
                    <option
                            value="{{ $value }}"
                            @if($value == $prop->translate->value) selected @endif
                    >{{ $option['value'] }}</option>
                @else
                    <option
                            value="{{ $value }}"
                            @if(isset($option['selected']) and $option['selected']) selected @endif
                    >{{ $option['value'] }}</option>

                @endif
            @endforeach
        </select>
        @break

        @case(9)
        <label for=""> {{ $attribute->name }} </label>

        <input
                name="{{ $input_name }}"
                type="hidden"
                value="0"
        >
        <input
                name="{{ $input_name }}"
                type="checkbox"
                class="form-control input"
                placeholder="{{ $attribute->default_value }}"
                autocomplete="off"
                @if($block->contents()->attribute($attribute->id)->first()->translate->value == 'on') checked @endif
                {{--                    value="{{ $block->contents()->attribute($attribute->id)->first()->translate->value ?? '' }}"--}}
        >

        @break

    @endswitch
</div>
{{--@endforeach--}}
