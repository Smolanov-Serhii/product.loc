@php
    /**
     * @var $attribute \App\Models\BlockTemplateAttribute
     * @var $iteration \App\Models\BlockTemplateRepeaterIteration
     * @var $u_id int
     * @var $language \App\Models\Language
     */


    $contents = $iteration['contents']->keyBy('block_template_attribute_id');
    //dd($contents[$attribute->id]->mappedByLang()[$language->id]);
    //dd($contents[$attribute->id]);
    $iteration_class_name = class_basename(\App\Models\BlockTemplateRepeaterIteration::class);
    if(isset($contents[$attribute->id])) {
        $content = $contents[$attribute->id];
        $input_name = "old_iterations[{$iteration_class_name}_{$iteration->id}][old_attributes][{$language->iso}][{$content->id}]";

        //if(is_object($contents[$attribute->id]['translate'])){
            $value = $contents[$attribute->id]->mappedByLang()[$language->id]->value ?? $attribute->default_value;
//        } else {
  //          $value = $attribute->default_value;
    //    }



    } else {
        $input_name = "old_iterations[{$iteration_class_name}_{$iteration->id}][attributes][{$language->iso}][{$attribute->id}]";
        $value = $attribute->default_value;
    }
@endphp

<div class="form-group field-{{ \App\Models\BlockTemplateAttribute::TYPE_LIST[$attribute->type] }}">

    @switch($attribute->type)
        @case(0)
        {{--        @dd($content->translate->value);--}}
        <label for=""> {{ $attribute->name }} </label>
        @php

            /** @var $block \App\Models\Block */
            /** @var $attribute \App\Models\BlockTemplateAttribute */
            /** @var $value string */
            $url = isset($contents[$attribute->id])
            ? '/uploads/contents/' . $value
            : '/uploads/block_template_attributes/' . $value;
            $u_img_id = rand(10**4, 10**5);
        @endphp
        <img
            class="img-fluid pad"
            src="{{ $url }}"
            alt="Preview"
            id="image_{{ $iteration->id }}_{{ $attribute->id }}_{{ $u_img_id }}"
        >
        {{--            <input type="hidden" name="content[{{ $content->id }}]" value="{{ $content->translate->value }}">--}}
        <div class="input-group mb-3" id="option_image_{{ $iteration->id }}_{{ $attribute->id }}_{{ $u_img_id }}">
            <div class="custom-file">
                {{--                    <input type="hidden" name="content[{{ $attribute->id }}][{{ $content->id }}]" value="{{ $content->value }}">--}}
                <input
                        id="optionFile_{{ $iteration->id }}_{{ $attribute->id }}_{{ $u_img_id }}"
                        type="file"
                        class="custom-file-input input"
                        name="{{ $input_name }}"
                        data-id="{{$iteration->id}}_{{ $attribute->id }}_{{ $u_img_id }}">

                <label class="custom-file-label" for="optionFile_{{$iteration->id}}_{{ $attribute->id }}_{{ $u_img_id }}">{{ $value }}</label>
            </div>
        </div>
        @isset($contents[$attribute->id])
            <button
                    type="button"
                    class="btn btn-danger btn-icon block clear-value"
                    data-prop_id="{{ $contents[$attribute->id]->id }}"
                    data-attr_id="{{$iteration->id}}_{{ $attribute->id }}_{{ $u_img_id }}">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        @endif
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
                id="content_{{ $iteration->id }}_{{ $attribute->id }}"
        >{{ $value }}</textarea>
        {{--                <div class="input-group-append">--}}
        {{--                    <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        @break
        @case(3)

        <label for=""> {{ $attribute->name }} </label>
        <textarea
                name="{{ $input_name }}"
                class="editor"
                id="content_{{ $iteration->id }}_{{ $attribute->id }}"
        >{!! $value !!}</textarea>
        {{--        <input--}}
        {{--                type="hidden"--}}
        {{--                id="hidden_content_{{ $content->id }}"--}}
        {{--                name="{{ $input_name }}"--}}
        {{--        >--}}
        {{--        <div class="textarea" id="content_{{ $content->id }}">--}}
        {{--            --}}
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
        {{--        @dd($content->translate->value);--}}
        <label for=""> {{ $attribute->name }} </label>
{{--        @php--}}

{{--            /** @var $block \App\Models\Block */--}}
{{--            /** @var $attribute \App\Models\Block_template_attributes */--}}
{{--            $url = isset($contents[$attribute->id])--}}
{{--            ? '/uploads/contents/' . $value--}}
{{--            : '/uploads/block_template_attributes/' . $value--}}

{{--        @endphp--}}
{{--        <img class="img-fluid pad" src="{{ $url }}" alt="Preview" id="image_{{ $iteration->id }}_{{ $attribute->id }}">--}}
        {{--            <input type="hidden" name="content[{{ $content->id }}]" value="{{ $content->translate->value }}">--}}
        <div class="input-group mb-3" id="option_image_{{ $iteration->id }}_{{ $attribute->id }}">
            <div class="custom-file">
                {{--                    <input type="hidden" name="content[{{ $attribute->id }}][{{ $content->id }}]" value="{{ $content->value }}">--}}
                <input
                        id="optionFile_{{ $iteration->id }}_{{ $attribute->id }}"
                        type="file"
                        class="custom-file-input input"
                        name="{{ $input_name }}"
                        data-id="{{$iteration->id}}_{{ $attribute->id }}">

                <label class="custom-file-label" for="optionFile_{{$iteration->id}}_{{ $attribute->id }}">{{ $value }}</label>
            </div>
        </div>
        @break

        @case(6)
        {{--                @dd( $block->contents()->attribute($attribute->id)->first()->translate->value ?? $attribute->value)--}}
        {{--            <div class="input-group mb-3" id="option_input_{{ $attribute->id }}" style="">--}}
        <label for=""> {{ $attribute->name }} </label>
        <input
                name="{{ $input_name }}"
                type="color"
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

        @case(7)
        {{--                @dd( $block->contents()->attribute($attribute->id)->first()->translate->value ?? $attribute->value)--}}
        {{--            <div class="input-group mb-3" id="option_input_{{ $attribute->id }}" style="">--}}
        @php
            /** @var $attribute \App\Models\BlockTemplateAttribute */
            $properties = $attribute->setting->decodedProperties;
        @endphp
        <label for=""> {{ $attribute->name }} </label>
        <select
            name="{{ $input_name }}"
            id="{{ $properties['id'] }}"
            @class($properties['class_list'])
            @isset($properties['size']) size="{{ $properties['size'] }}" @endif
            @if(isset($properties['multiple']) and $properties['multiple']) multiple="multiple" @endif
        >

            @foreach($properties['options_list'] as $option_key => $option)
                <option
                    value="{{ $option_key }}"
                    @if($option_key == $value) selected @endif
                >{{ $option['value'] }}</option>
            @endforeach
        </select>
        @break

        @case(10)
        {{--        @dd($content->translate->value);--}}
        <label for=""> {{ $attribute->name }} </label>
        @php

            /** @var $block \App\Models\Block */
            /** @var $attribute \App\Models\BlockTemplateAttribute */
            /** @var $value string */
            $url = isset($contents[$attribute->id])
            ? '/uploads/contents/' . $value
            : '/uploads/block_template_attributes/' . $value;
            $u_img_id = rand(10**4, 10**5);
        @endphp
        <img
                class="img-fluid pad"
                src="{{ $url }}"
                alt="Preview"
                id="image_{{ $iteration->id }}_{{ $attribute->id }}_{{ $u_img_id }}"
        >
        {{--            <input type="hidden" name="content[{{ $content->id }}]" value="{{ $content->translate->value }}">--}}
        <div class="input-group mb-3" id="option_image_{{ $iteration->id }}_{{ $attribute->id }}_{{ $u_img_id }}">
            <div class="custom-file">
                {{--                    <input type="hidden" name="content[{{ $attribute->id }}][{{ $content->id }}]" value="{{ $content->value }}">--}}
                <input
                        id="optionFile_{{ $iteration->id }}_{{ $attribute->id }}_{{ $u_img_id }}"
                        type="file"
                        class="custom-file-input input"
                        name="{{ $input_name }}"
                        data-id="{{$iteration->id}}_{{ $attribute->id }}_{{ $u_img_id }}">

                <label class="custom-file-label" for="optionFile_{{$iteration->id}}_{{ $attribute->id }}_{{ $u_img_id }}">{{ $value }}</label>
            </div>
        </div>
        @isset($contents[$attribute->id])
            <button
                    type="button"
                    class="btn btn-danger btn-icon block clear-value"
                    data-prop_id="{{ $contents[$attribute->id]->id }}"
                    data-attr_id="{{$iteration->id}}_{{ $attribute->id }}_{{ $u_img_id }}">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        @endif
        @break
    @endswitch
</div>
