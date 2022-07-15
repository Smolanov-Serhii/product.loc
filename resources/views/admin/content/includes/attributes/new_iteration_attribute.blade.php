@foreach($repeater->attrs as $attribute)
    @php
        /**
         * @var $attribute \App\Models\BlockTemplateAttribute
         * @var $u_id int
         * @var $language \App\Models\Language
         */
        $input_name = "iterations[{$u_id}][attributes][{$language->iso}][{$attribute->id}]";
    @endphp

    <div class="form-group field-{{ \App\Models\BlockTemplateAttribute::TYPE_LIST[$attribute->type] }}">
        @switch($attribute->type)

            @case(0)
            @php
                $u_img_id = rand(10**4, 10**5);
            @endphp
            <label for=""> {{ $attribute->name }} </label>
            <img
                    class="img-fluid pad"
                    src="{{ '/uploads/block_template_attributes/' . $attribute->default_value }}"
                    alt="Preview"
                    id="image_{{ $u_id }}_{{ $attribute->id }}_{{ $u_img_id }}"
            >
            <div class="input-group mb-3" id="option_image_{{ $attribute->id }}">
                <div class="custom-file">
                    <input
                            id="optionFile_{{ $u_id }}_{{ $attribute->id }}_{{ $u_img_id }}"
                            type="file"
                            class="custom-file-input input"
                            name="{{ $input_name }}"
                            data-id="{{ $u_id }}_{{ $attribute->id }}_{{ $u_img_id }}">

                    <label
                            class="custom-file-label"
                            for="optionFile_{{ $u_id }}_{{ $attribute->id }}"
                    >{{ $attribute->value }}</label>
                </div>
            </div>
            @break

            @case(1)
            <label for=""> {{ $attribute->name }} </label>
            <input
                    name="{{ $input_name }}"
                    type="text"
                    class="form-control input"
                    placeholder="{{ $attribute->default_value }}"
                    autocomplete="off"
            >
            @break

            @case(2)
            <label for=""> {{ $attribute->name }} </label>
            <textarea
                    class="form-control input"
                    rows="3"
                    placeholder="{{ $attribute->default_value }}"
                    name="{{ $input_name }}"
                    id="content_{{ $u_id }}_{{ $attribute->id }}"
            >{{ $attribute->default_value }}</textarea>
            @break

            @case(3)
            <div class="input-group mb-3" id="option_editor_{{ $u_id }}">
                <label for=""> {{ $attribute->name }} </label>
                <textarea
                        class="editor"
                        id="content_{{ $u_id }}_{{ $attribute->id }}"
                        name="{{ $input_name }}"
                >{!! $attribute->default_value !!}</textarea>
            </div>
            @break

            @case(4)

            @break

            @case(5)
            <label for=""> {{ $attribute->name }} </label>
            <div class="input-group mb-3" id="option_image_{{ $attribute->id }}">
                <div class="custom-file">
                    <input
                            id="optionFile_{{ $u_id }}_{{ $attribute->id }}"
                            type="file"
                            class="custom-file-input input"
                            name="{{ $input_name }}"
                            data-id="{{ $u_id }}_{{ $attribute->id }}">

                    <label
                            class="custom-file-label"
                            for="optionFile_{{ $u_id }}_{{ $attribute->id }}"
                    >{{ $attribute->defalut_value }}</label>
                </div>
            </div>
            @break

            @case(6)
            <label for=""> {{ $attribute->name }} </label>
            <input
                    name="{{ $input_name }}"
                    type="color"
                    class="form-control input"
                    placeholder="{{ $attribute->default_value }}"
                    autocomplete="off"
            >
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

                @foreach($properties['options_list'] as $value => $option)
                    <option
                            value="{{ $value }}"
                            @if(isset($option['selected']) and $option['selected']) selected @endif
                    >{{ $option['value'] }}</option>
                @endforeach
            </select>
            @break

        @endswitch
    </div>
@endforeach
{{--------------------------------------------}}
{{--@foreach($template->attrs as $attribute)--}}
{{--    <div class="form-group field-{{ \App\Models\Block_template_attributes::TYPE_LIST[$attribute->type] }}">--}}
{{--        @switch($attribute->type)--}}
{{--            @case(0)--}}
{{--            <label for=""> {{ $attribute->name }} </label>--}}
{{--            @php--}}

{{--                /** @var $block \App\Models\Block */--}}
{{--                /** @var $attribute \App\Models\Block_template_attributes */--}}
{{--                $url = '/uploads/block_template_attributes/' . $attribute->default_value;--}}
{{--                $u_img_id = rand(10**4, 10**5);--}}

{{--            @endphp--}}
{{--            <img class="img-fluid pad" src="{{ $url }}" alt="Preview" id="image_{{ $attribute->id }}_{{ $u_img_id }}">--}}
{{--            <div class="input-group mb-3" id="option_image_{{ $attribute->id }}">--}}
{{--                <div class="custom-file">--}}
{{--                    --}}{{--                    <input--}}
{{--                    --}}{{--                            type="hidden"--}}
{{--                    --}}{{--                            name="content[{{ $attribute->id }}]"--}}
{{--                    --}}{{--                            value="{{ $attribute->value }}">--}}

{{--                    <input--}}
{{--                        id="optionFile_{{ $attribute->id }}_{{ $u_img_id }}"--}}
{{--                        type="file"--}}
{{--                        class="custom-file-input input"--}}
{{--                        name="content[{{ $attribute->id }}]"--}}
{{--                        data-id="{{ $attribute->id }}_{{ $u_img_id }}">--}}

{{--                    <label class="custom-file-label"--}}
{{--                           for="optionFile_{{ $attribute->id }}">{{ $attribute->value }}</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @break--}}

{{--            @case(1)--}}
{{--            --}}{{--                @dd( $block->contents()->attribute($attribute->id)->first()->translate->value ?? $attribute->value)--}}
{{--            --}}{{--            <div class="input-group mb-3" id="option_input_{{ $attribute->id }}" style="">--}}
{{--            <label for=""> {{ $attribute->name }} </label>--}}
{{--            <input--}}
{{--                name="content[{{ $attribute->id }}]"--}}
{{--                type="text"--}}
{{--                class="form-control input"--}}
{{--                placeholder="{{ $attribute->default_value }}"--}}
{{--                autocomplete="off"--}}
{{--            >--}}
{{--            --}}{{--                <div class="input-group-append">--}}
{{--            --}}{{--                    <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>--}}
{{--            --}}{{--                </div>--}}
{{--            --}}{{--            </div>--}}
{{--            @break--}}

{{--            @case(2)--}}
{{--            --}}{{--            @dd($block->contents()->attribute($attribute->id)->first()->translate->value)--}}
{{--            --}}{{--            @dd($block->contents()->attribute($attribute->id)->first()->translate)--}}
{{--            --}}{{--            <div class="input-group mb-3" id="option_textarea_{{ $attribute->id }}" style="">--}}
{{--            --}}{{--            @dd( $block->contents()->attribute($attribute->id)->first()->translate->value)--}}
{{--            <label for=""> {{ $attribute->name }} </label>--}}
{{--            <textarea--}}
{{--                class="form-control input textarea"--}}
{{--                rows="3"--}}
{{--                placeholder="{{ $attribute->default_value }}"--}}
{{--                name="content[{{ $attribute->id }}]"--}}
{{--                id="content_{{ $attribute->id }}"--}}
{{--            ></textarea>--}}
{{--            --}}{{--                <div class="input-group-append">--}}
{{--            --}}{{--                    <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>--}}
{{--            --}}{{--                </div>--}}
{{--            --}}{{--            </div>--}}
{{--            @break--}}
{{--            @case(3)--}}

{{--            <label for=""> {{ $attribute->name }} </label>--}}
{{--            <input--}}
{{--                type="hidden"--}}
{{--                id="hidden_content_{{ $attribute->id }}"--}}
{{--                name="content[{{ $attribute->id }}]"--}}
{{--            >--}}
{{--            <div class="textarea" id="content_{{ $attribute->id }}">--}}
{{--            </div>--}}
{{--            --}}{{--            <textarea--}}
{{--            --}}{{--                class="form-control input textarea"--}}
{{--            --}}{{--                rows="3"--}}
{{--            --}}{{--                placeholder="{{ $attribute->default_value }}"--}}
{{--            --}}{{--                name="content[{{ $attribute->id }}]"--}}
{{--            --}}{{--                id="content_{{ $attribute->id }}"--}}
{{--            --}}{{--            >{{ $block->contents()->attribute($attribute->id)->first()->translate->value ?? '' }}</textarea>--}}
{{--            @break--}}

{{--            @case(4)--}}

{{--            @break--}}

{{--            @case(5)--}}
{{--            <label for=""> {{ $attribute->name }} </label>--}}

{{--            {{ $attribute->default_value }}--}}
{{--            --}}{{--        <input type="hidden" name="content[{{ $attribute->id }}]" value="">--}}
{{--            <div class="input-group mb-3" id="option_file_{{ $attribute->id }}">--}}
{{--                <div class="custom-file">--}}
{{--                    --}}{{--                <input type="hidden" name="content[{{ $attribute->id }}]" value="{{ $attribute->value }}">--}}
{{--                    <input--}}
{{--                        id="optionFile_{{ $attribute->id }}"--}}
{{--                        type="file"--}}
{{--                        class="custom-file-input input"--}}
{{--                        name="content[{{ $attribute->id }}]"--}}
{{--                        data-id="{{ $attribute->id }}">--}}
{{--                    <label class="custom-file-label"--}}
{{--                           for="optionFile_{{ $attribute->id }}">{{ $attribute->value }}</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @break--}}

{{--            @case(6)--}}
{{--            <label for=""> {{ $attribute->name }} </label>--}}
{{--            <input--}}
{{--                name="content[{{ $attribute->id }}]"--}}
{{--                type="color"--}}
{{--                class="form-control color"--}}
{{--                placeholder="{{ $attribute->default_value }}"--}}
{{--                autocomplete="off"--}}
{{--            >--}}
{{--            @break--}}

{{--        @endswitch--}}
{{--    </div>--}}
{{--@endforeach--}}
