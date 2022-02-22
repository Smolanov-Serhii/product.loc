<div class="input-group mb-3 create-field-editor" id="option_editor_{{ $u_id }}">
    <input type="hidden" name="attribute[{{ $u_id }}][type]" value="{{ $attribute_type_id }}">
    <input type="hidden" name="attribute[{{ $u_id }}][parent_id]" value="{{ $parent_id }}">
    <input
        name="attribute[{{ $u_id }}][key]"
        type="text"
        class="form-control"
        placeholder="{{ __('block_template_attributes.key') }}"
    >
    <input
        name="attribute[{{ $u_id }}][name]"
        type="text"
        class="form-control"
        placeholder="{{ __('block_template_attributes.name') }}"
    >
{{--    <input--}}
{{--        type="hidden"--}}
{{--        id="hidden_option_editor_element_{{ $u_id }}"--}}
{{--        name="attribute[{{ $u_id }}][default_value]"--}}
{{--    >--}}
    <textarea
            name="attribute[{{ $u_id }}][default_value]"
            class="editor"
            id="{{ $u_id }}"
            cols="30"
            rows="10"
    >{{ __('block_contents.content') }}</textarea>
{{--    <div--}}
{{--        id="{{ $u_id }}"--}}
{{--        class="textarea"--}}
{{--    >--}}

{{--    </div>--}}
{{--    <textarea--}}
{{--        name="attribute[{{ $u_id }}][default_value]"--}}
{{--        class="form-control input"--}}
{{--        rows="3"--}}
{{--        placeholder="{{ __('block_contents.content') }}"--}}
{{--        id="option_editor_element_{{ $u_id }}"--}}
{{--    ></textarea>--}}
    <div class="input-group-append">
        <button
            data-u_id="{{ $u_id }}"
            class="btn btn-danger remove-input"
            type="button"
            style="z-index:1"
        >Удалить</button>
    </div>
</div>
