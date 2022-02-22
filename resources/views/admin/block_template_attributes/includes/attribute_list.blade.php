@isset($model->repeaters)
    @foreach($model->repeaters as $repeater)
        <div class="input-group mb-3" id="option_repeater_{{ $repeater->id }}">
            <div class="form-group" style="width:100%;">
                <div class="input-group mb-3">
                    <input
                            name="old_repeater[{{ $repeater->id }}][key]"
                            type="text"
                            class="form-control"
                            placeholder="{{ __('block_template_repeaters.key') }}"
                            value="{{ $repeater->key }}"
                    >
                    <input
                            name="old_repeater[{{ $repeater->id }}][name]"
                            type="text"
                            class="form-control"
                            placeholder="{{ __('block_template_repeaters.name') }}"
                            value="{{ $repeater->name }}"
                    >
                    <input
                            name="old_repeater[{{ $repeater->id }}][class]"
                            type="text"
                            class="form-control"
                            placeholder="{{ __('block_template_repeaters.class') }}"
                            value="{{ $repeater->class }}"
                    >
                    <div class="input-group-append">
                        <button data-id="{{ $repeater->id }}" class="btn btn-danger remove-input-repeater"
                                type="button" style="z-index:1">Удалить
                        </button>
                    </div>
                </div>
                <label for="selectType"> @lang('block_option_contents.add_value') </code></label>
                <select class="custom-select form-control-border select-type" data-u_id="{{ $repeater->id }}">
                    <option value="-1" selected disabled
                            hidden> @lang('block_template_attributes.select_type') </option>
                    @foreach($input_types as $id => $type)
                        <option
                                value="{{ $id }}"
                        >{{ __('system.'.$type) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group attribute-fields" id="attribute_fields_{{ $repeater->id }}" style="width:100%">
                @include('admin.block_template_attributes.includes.attribute_list',['model' => $repeater])
            </div>
        </div>
    @endforeach
@endisset

@isset($model->attrs)
    @foreach($model->attrs as $attribute)
        @switch($attribute->type)

            @case(0)
            <div class="input-group mb-3 field-image" id="">
                <img
                        id="image_{{ $attribute->id }}"
                        src="{{ '/uploads/block_template_attributes/' . $attribute->default_value }}"
                        style="width:20%;"
                        class="img-fluid pad"
                        alt="Preview">
                <input
                        name="old_attribute[{{ $attribute->id }}][key]"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="{{ __('block_template_attributes.key') }}"
                        value="{{ $attribute->key ?? old('key') }}"
                >
                <div class="custom-file">
                    <input
                            name="old_attribute[{{ $attribute->id }}][name]"
                            type="text"
                            class="form-control"
                            placeholder="{{ __('block_template_attributes.name') }}"
                            value="{{ $attribute->name ?? old('name') }}"
                    >
                </div>
                <div class="custom-file">
                    <input
                            data-id="{{ $attribute->id }}"
                            name="old_attribute[{{ $attribute->id }}][default_value]"
                            type="file"
                            class="custom-file-input input image-input"
                    >
                    <label class="custom-file-label" for="exampleInputFile"> @lang('system.select image') </label>
                </div>
                <div class="input-group-append">
                    <button
                            data-id="{{ $attribute->id }}"
                            class="btn btn-danger remove-input"
                            type="button"
                            style="z-index:1"
                    >Удалить
                    </button>
                </div>
            </div>
            @break

            @case(1)
            <div class="input-group mb-3 field-input" id="">
                <input
                        name="old_attribute[{{ $attribute->id }}][key]"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="{{ __('block_template_attributes.key') }}"
                        value="{{ $attribute->key ?? old('key') }}"
                >
                <input
                        name="old_attribute[{{ $attribute->id }}][name]"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="{{ __('block_template_attributes.name') }}"
                        value="{{ $attribute->name ?? old('name') }}"
                >
                <input
                        name="old_attribute[{{ $attribute->id }}][default_value]"
                        type="text"
                        class="form-control input"
                        placeholder="{{ __('block_template_attributes.default_value') }}"
                        autocomplete="off"
                        value="{{ $attribute->default_value }}"
                >

                <div class="input-group-append">
                    <button data-id="{{ $attribute->id }}" class="btn btn-danger remove-input" type="button"
                            style="z-index:1">Удалить
                    </button>
                </div>
            </div>
            @break

            @case(2)
            <div class="input-group mb-3 field-textarea" id="">
                <input
                        name="old_attribute[{{ $attribute->id }}][key]"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="{{ __('block_template_attributes.key') }}"
                        value="{{ $attribute->key ?? old('key') }}"
                >
                <input
                        name="old_attribute[{{ $attribute->id }}][name]"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="{{ __('block_template_attributes.name') }}"
                        value="{{ $attribute->name ?? old('name') }}"
                >
                <textarea
                        class="form-control input textarea"
                        rows="3"
                        placeholder="{{ __('block_template_attributes.default_value') }}"
                        name="old_attribute[{{ $attribute->id }}][default_value]"
                        id="attribute_{{ $attribute->id }}"
                >{{ $attribute->default_value }}</textarea>
                <div class="input-group-append">
                    <button data-id="{{ $attribute->id }}" class="btn btn-danger remove-input" type="button"
                            style="z-index:1">Удалить
                    </button>
                </div>
            </div>
            @break

            @case(3)
            <div class="input-group mb-3 field-editor" id="">
                <input
                        name="old_attribute[{{ $attribute->id }}][key]"
                        type="text"
                        class="form-control"
                        {{--                        id="key"--}}
                        placeholder="{{ __('block_template_attributes.key') }}"
                        value="{{ $attribute->key ?? old('key') }}"
                >
                <input
                        name="old_attribute[{{ $attribute->id }}][name]"
                        type="text"
                        class="form-control"
                        {{--                        id="name"--}}
                        placeholder="{{ __('block_template_attributes.name') }}"
                        value="{{ $attribute->name ?? old('name') }}"
                >
                <textarea
                        name="old_attribute[{{ $attribute->id }}][default_value]"
                        class="editor"
                        id="{{ $attribute->id }}"
                >{{ $attribute->default_value }}</textarea>
                <div class="input-group-append">
                    <button
                            data-id="{{ $attribute->id }}"
                            class="btn btn-danger remove-input"
                            type="button"
                            style="z-index:1"
                    >Удалить
                    </button>
                </div>
            </div>
            @break

            @case(5)
            <div class="input-group mb-3 field-image" id="">
                {{ $attribute->default_value }}
                <input
                        name="old_attribute[{{ $attribute->id }}][key]"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="{{ __('block_template_attributes.key') }}"
                        value="{{ $attribute->key ?? old('key') }}"
                >
                <div class="custom-file">
                    <input
                            name="old_attribute[{{ $attribute->id }}][name]"
                            type="text"
                            class="form-control"
                            id=""
                            placeholder="{{ __('block_template_attributes.name') }}"
                            value="{{ $attribute->name ?? old('name') }}"
                    >
                </div>
                <div class="custom-file">
                    <input
                            data-id="{{ $attribute->id }}"
                            name="old_attribute[{{ $attribute->id }}][default_value]"
                            type="file"
                            class="custom-file-input input"
                    >
                    <label class="custom-file-label" for="exampleInputFile"> @lang('system.select file') </label>
                </div>
                <div class="input-group-append">
                    <button
                            data-id="{{ $attribute->id }}"
                            class="btn btn-danger remove-input"
                            type="button"
                            style="z-index:1"
                    >Удалить
                    </button>
                </div>
            </div>
            @break

            @case(6)
            <div class="input-group mb-3 field-color" id="">
                <input
                        name="old_attribute[{{ $attribute->id }}][key]"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="{{ __('block_template_attributes.key') }}"
                        value="{{ $attribute->key ?? old('key') }}"
                >
                <input
                        name="old_attribute[{{ $attribute->id }}][name]"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="{{ __('block_template_attributes.name') }}"
                        value="{{ $attribute->name ?? old('name') }}"
                >
                <input
                        name="old_attribute[{{ $attribute->id }}][default_value]"
                        type="color"
                        class="form-control input"
                        placeholder="{{ __('block_template_attributes.default_value') }}"
                        autocomplete="off"
                        value="{{ $attribute->default_value }}"
                >

                <div class="input-group-append">
                    <button data-id="{{ $attribute->id }}" class="btn btn-danger remove-input" type="button"
                            style="z-index:1">Удалить
                    </button>
                </div>
            </div>
            @break

            @case(7)
            <div class="input-group mb-3 selector" id="">
                <input type="hidden" name="old_attribute[{{ $attribute->id }}][setting_properties]"
                       id="selector_{{ $attribute->id }}">
                <div class="input-group-prepend">
                    <button
                            class="btn btn-primary edit-setting"
                            type="button"
                            data-toggle="modal"
                            data-target="#editorFormModal"
                            data-u_id="{{ $attribute->id }}"
                            data-input_type="selector"
                    >
                        <i class="fas fa-wrench"></i>
                    </button>
                    {{--        <button class="btn btn-danger remove-input" type="button" style="z-index:1">Удалить</button>--}}
                </div>
                <input
                        name="old_attribute[{{ $attribute->id }}][key]"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="{{ __('block_template_attributes.key') }}"
                        value="{{ $attribute->key ?? old('key') }}"
                >
                <input
                        name="old_attribute[{{ $attribute->id }}][name]"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="{{ __('block_template_attributes.name') }}"
                        value="{{ $attribute->name ?? old('name') }}"
                >

                <div class="input-group-append">
                    <button data-id="{{ $attribute->id }}" class="btn btn-danger remove-input" type="button"
                            style="z-index:1">Удалить
                    </button>
                </div>
            </div>
            <script>
                {{--                var selector_{{ $attribute->id }} = {!! json_encode($attribute->setting->properties)  !!}--}}
                var selector_{{ $attribute->id }} = {!! $attribute->setting->properties !!}
            </script>
            @break

            @case(8)
            <div class="input-group mb-3 field-widget" id="">
                <input
                        name="old_attribute[{{ $attribute->id }}][key]"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="{{ __('block_template_attributes.key') }}"
                        value="{{ $attribute->key ?? old('key') }}"
                >
                <input
                        name="old_attribute[{{ $attribute->id }}][name]"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="{{ __('block_template_attributes.name') }}"
                        value="{{ $attribute->name ?? old('name') }}"
                >
{{--                @dd($attribute)--}}
                <select
                        name="old_attribute[{{ $attribute->id }}][default_value]"
                        class="form-control"
                        id=""
                >
                    @foreach($widgets as $widget)
                        {{--                    <option disabled selected>{{ __('block_template_attributes.default_value') }}</option>--}}
                        <option
                                value="{{ $widget->slug }}"
                                @if($attribute->default_value) selected @endif
                        >{{ $widget->slug }}</option>
                    @endforeach
                </select>

                <div class="input-group-append">
                    <button data-id="{{ $attribute->id }}" class="btn btn-danger remove-input" type="button"
                            style="z-index:1">Удалить
                    </button>
                </div>
            </div>
            @break

            @case(9)
            <div class="input-group mb-3 field-checkbox" id="">
                <input
                        name="old_attribute[{{ $attribute->id }}][key]"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="{{ __('block_template_attributes.key') }}"
                        value="{{ $attribute->key ?? old('key') }}"
                >
                <input
                        name="old_attribute[{{ $attribute->id }}][name]"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="{{ __('block_template_attributes.name') }}"
                        value="{{ $attribute->name ?? old('name') }}"
                >
                <input
                        type="hidden"
                        name="old_attribute[{{ $attribute->id }}][default_value]"
                        value="0"
                >
                <input
                        name="old_attribute[{{ $attribute->id }}][default_value]"
                        type="checkbox"
                        class="form-control input"
                        placeholder="{{ __('block_template_attributes.default_value') }}"
                        autocomplete="off"
                        @if($attribute->default_value == 'on') checked @endif
                >

                <div class="input-group-append">
                    <button data-id="{{ $attribute->id }}" class="btn btn-danger remove-input" type="button"
                            style="z-index:1">Удалить
                    </button>
                </div>
            </div>
            @break

        @endswitch
    @endforeach
@endisset
