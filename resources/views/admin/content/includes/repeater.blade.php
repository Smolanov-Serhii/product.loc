@if(isset($iterations) and !is_null($iterations))
    <div class="iterations row">
        @foreach($iterations as $iteration)
            <div class="border rounded saved-iteration {{ $repeater->class }}"
                 id="{{ $iteration->id }}">
                <div class="iteration-buttons">
                    <div class="move btn">+</div>
                    <div class="devider-block" style="flex: 1"></div>
                    <button
                            data-url="{{ route('admin.block_template_repeater_iterations.delete', [ 'iteration'=> $iteration ]) }}"
                            type="submit"
                            class="btn btn-danger btn-icon content remove-iteration"
                    >
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <div class="hide btn">
                        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L7.5 6L14 1" stroke="#0D0E17" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <input
                        type="hidden"
                        name="old_iterations[{{ class_basename(\App\Models\BlockTemplateRepeaterIteration::class) }}_{{ $iteration->id }}][iteration_id]"
                        value="{{ $iteration->id }}"
                >
                <input
                        type="hidden"
                        name="old_iterations[{{ class_basename(\App\Models\BlockTemplateRepeaterIteration::class) }}_{{ $iteration->id }}][lang_id]"
                        value="{{ $iteration->lang_id }}"
                >
                <input
                        type="hidden"
                        name="old_iterations[{{ class_basename(\App\Models\BlockTemplateRepeaterIteration::class) }}_{{ $iteration->id }}][order]"
                        class="order"
                        value="{{ $iteration->order }}"
                >
                @foreach($repeater->attrs as $attribute)
                    @include('admin.content.includes.attributes.saved_iteration_attribute')
                @endforeach

                @foreach($repeater->repeaters as $sub_repeater)
                    @include('admin.content.includes.repeater', [
                        'iterations' => $iteration['iterations'][$sub_repeater->id] ?? null,
                        'parent_u_id' => class_basename($iteration).'_'.$iteration->id,
                        'repeater' => $sub_repeater,
                    ])
                @endforeach
            </div>
        @endforeach
    </div>
@else
    {{--    @dd($content)--}}
    <div class="row iterations">
        <div class="border border-primary rounded new-iteration {{ $repeater->class }}" style="flex:1">
            @php
                $u_id = rand(10**10, 10**12);
            @endphp
            <input
                    type="hidden"
                    name="iterations[{{ $u_id }}][parent_id]"
                    value="{{ $parent_u_id }}"
                    {{--                        value="{{ class_basename($content) }}_{{ $parent_id }}"--}}
            >
            <input
                    type="hidden"
                    name="iterations[{{ $u_id }}][lang_id]"
                    value="{{ $language->id }}"
            >
            <input
                    type="hidden"
                    name="iterations[{{ $u_id }}][repeater_id]"
                    value="{{ $repeater->id }}"
            >
            <input
                    type="hidden"
                    name="iterations[{{ $u_id }}][order]"
                    value="0"
            >
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
{{--@dd($parent_type)--}}
            @foreach($repeater->repeaters as $sub_repeater)
                @include('admin.content.includes.repeater', [
                    'repeater' => $sub_repeater,
                    'parent_u_id' => $u_id,
                    'parent_type' => 'BlockTemplateRepeater',
                ])
            @endforeach
        </div>
    </div>
@endif
{{--    @php--}}
{{--    if($parent->id == 26){--}}

{{--        dd($parent)--}}
{{--}--}}
{{--    @endphp--}}
{{--    @dd($content)--}}
{{--@dd($repeater)--}}

<button
        type="button"
        class="btn btn-danger btn-icon add-iteration"
        {{--        data-template_url="{{ route('admin.block_template_repeators.template', ['block_template_repeator' => $repeator, 'parent_type' => class_basename($content),  'parent_id' => $content->id]) }}">--}}
        data-template_url="{{ route('admin.block_template_repeaters.template', [
            'block_template_repeater' => $repeater,
            'parent_type' => $parent_type,
            'parent_id' => $parent_u_id,
            'language' => $language
        ]) }}">
    <i class="fa fa-plus-square" aria-hidden="true"></i>
</button>
{{--@endforeach--}}
