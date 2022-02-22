<div class="input-group mb-3 create-field-widget">
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
    <input
            type="checkbox"
            name="attribute[{{ $u_id }}][default_value]"
            class="form-control"
            id=""
    >
    <div class="input-group-append">
        <button class="btn btn-danger remove-input" type="button" style="z-index:1">Удалить</button>
    </div>
</div>