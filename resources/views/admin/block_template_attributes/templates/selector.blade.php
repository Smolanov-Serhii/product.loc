<div class="input-group mb-3 create-field-selector">
    <input type="hidden" name="attribute[{{ $u_id }}][type]" value="{{ $attribute_type_id }}">
    <input type="hidden" name="attribute[{{ $u_id }}][parent_id]" value="{{ $parent_id }}">
    <input type="hidden" name="attribute[{{ $u_id }}][setting_properties]" id="selector_{{ $u_id }}">
    <div class="input-group-prepend">
        <button
            class="btn btn-primary edit-setting"
            type="button"
            data-toggle="modal"
            data-target="#editorFormModal"
            data-u_id="{{ $u_id }}"
            data-input_type="selector"
        >
            <i class="fas fa-wrench"></i>
        </button>
{{--        <button class="btn btn-danger remove-input" type="button" style="z-index:1">Удалить</button>--}}
    </div>
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
{{--    <select --}}
{{--        name="attribute[{{ $u_id }}][default_value]"--}}
{{--        class="form-control input"--}}
{{--    >--}}
{{--        <option value=""></option>--}}
{{--    </select>--}}
{{--    <textarea--}}
{{--        name="attribute[{{ $u_id }}][default_value]"--}}
{{--        class="form-control input"--}}
{{--        rows="2"--}}
{{--        id=""--}}
{{--        placeholder="{{ __('block_template_attributes.default_value') }}"--}}
{{--    ></textarea>--}}
    <div class="input-group-append">
        <button class="btn btn-danger remove-input" type="button" style="z-index:1">Удалить</button>
    </div>
</div>

<script>
    var selector_{{ $u_id }} = {
        options_list: {
            0: {value: 'пункт 1', selected:true},
            1: {value:'пункт 2', selected:false},
        },
        hideLabel: true,
        class_list: [
            'form-control',
            'selector'
        ],
        id: 'u_id',
        size: 2,
        multiple: false
    }
</script>
