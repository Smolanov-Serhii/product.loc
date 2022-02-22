<div class="input-group mb-3 field-repeater" id="option_repeater_{{ $u_id }}" style="border:1px solid #619200;padding:15px;box-shadow: -15px 0;">
    <h2>Это каждый элемент повторителя</h2>
    <br>
{{--    <input type="hidden" name="attribute[{{ $u_id }}][type]" value="{{ $attribute_type_id }}">--}}
    <input type="hidden" name="repeater[{{ $u_id }}][parent_id]" value="{{ $parent_id }}">
    <div class="form-group" style="width:100%">
        <div class="input-group mb-3">
            <input
                name="repeater[{{ $u_id }}][key]"
                type="text"
                class="form-control"
                placeholder="{{ __('block_template_repeaters.key') }}"
            >
            <input
                name="repeater[{{ $u_id }}][name]"
                type="text"
                class="form-control"
                placeholder="{{ __('block_template_repeaters.name') }}"
            >
            <input
                name="repeater[{{ $u_id }}][class]"
                type="text"
                class="form-control"
                placeholder="{{ __('block_template_repeaters.class') }}"
            >

            <div class="input-group-append">
                <button data-id="{{ $u_id }}" class="btn btn-danger remove-input-repeater" type="button" style="z-index:1">Удалить</button>
            </div>
        </div>
        <label for="selectType"> @lang('block_option_contents.add_value') </code></label>
        <select class="custom-select form-control-border select-type" data-u_id="{{ $u_id }}">
            <option value="-1" selected disabled hidden> @lang('block_template_attributes.select_type') </option>
            @foreach($input_types as $id => $type)
                <option
                    value="{{ $id }}"
                >{{ __('system.'.$type) }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group attribute-fields" id="attribute_fields_{{ $u_id }}" style="width:100%">
    </div>
</div>

