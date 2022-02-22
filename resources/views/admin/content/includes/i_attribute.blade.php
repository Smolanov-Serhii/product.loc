@php
    /**
     * @var $attribute \App\Models\BlockTemplateAttribute
     * @var $iteration \App\Models\BlockTemplateRepeaterIteration
     * @var $u_id int
     *
     */
    $contents = $iteration->contents->mapWithKeys(function ($content) {
        return [$content->block_template_attribute_id => $content];
    });

    if(isset($contents[$attribute->id])) {
        $content = $contents[$attribute->id];
        $input_name = "old_iterations[i_{$iteration->id}][old_attributes][{$content->id}]";
        $value = $contents[$attribute->id]->translate->value;
    } else {
        $input_name = "old_iterations[i_{$iteration->id}][attributes][{$attribute->id}]";
        $value = $attribute->default_value;
    }
@endphp

<div class="form-group field-{{ \App\Models\BlockTemplateAttribute::TYPE_LIST[$attribute->type] }}">
    <input
            type="hidden"
            name="old_iterations[i_{{ $iteration->id }}][iteration_id]"
            value="{{ $iteration->id }}"
    >


    @switch($attribute->type)
        @case(0)
        {{--        @dd($content->translate->value);--}}
        <label for=""> {{ $attribute->name }} </label>
        @php

            /** @var $block \App\Models\Block */
            /** @var $attribute \App\Models\BlockTemplateAttribute */
            $url = isset($contents[$attribute->id])
            ? '/uploads/contents/' . $value
            : '/uploads/block_template_attributes/' . $value

        @endphp
        <img class="img-fluid pad" src="{{ $url }}" alt="Preview" id="image_{{ $iteration->id }}_{{ $attribute->id }}">
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
    @endswitch
</div>
