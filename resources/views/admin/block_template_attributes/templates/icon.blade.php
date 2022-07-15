<div class="input-group mb-3 create-field-icon" id="option_image_{{ $u_id }}" >
    <input type="hidden" name="attribute[{{ $u_id }}][type]" value="{{ $attribute_type_id }}">
    <input type="hidden" name="attribute[{{ $u_id }}][parent_id]" value="{{ $parent_id }}">
    <img
            id="image_{{ $u_id }}"
            style="display:none;"
            class="img-fluid pad"
            alt="Preview">
    <input
        name="attribute[{{ $u_id }}][key]"
        type="text"
        class="form-control"
        placeholder="{{ __('block_template_attributes.key') }}"
    >
    <div class="custom-file">
        <input
            name="attribute[{{ $u_id }}][name]"
            type="text"
            class="form-control"
            placeholder="{{ __('block_template_attributes.name') }}"
        >
    </div>
    <div class="custom-file">
        <input
                data-id="{{ $u_id }}"
                type="file"
                class="custom-file-input input image-input"
                name="attribute[{{ $u_id }}][default_value]">
        <label class="custom-file-label" for="exampleInputFile"> @lang('system.select icon') </label>
    </div>
    <div class="input-group-append">
        <button class="btn btn-danger remove-input" type="button" style="z-index:1">Удалить</button>
    </div>
</div>
