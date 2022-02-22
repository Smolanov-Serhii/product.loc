<?php
?>

<div class="input-group mb-3" id="">
    <input
        name="attribute[{{ $attribute->id }}][key]"
        type="text"
        class="form-control"
        id="key"
        placeholder="{{ __('block_template_attributes.key') }}"
        value="{{ $attribute->key ?? old('key') }}"
    >
    <input
        name="attribute[{{ $attribute->id }}][name]"
        type="text"
        class="form-control"
        id="name"
        placeholder="{{ __('block_template_attributes.name') }}"
        value="{{ $attribute->name ?? old('name') }}"
    >
    <input
        name="attribute[{{ $attribute->id }}][default_value]"
        type="text"
        class="form-control input"
        placeholder="{{ __('block_template_attributes.default_value') }}"
        autocomplete="off"
        value="{{ $attribute->default_value }}"
    >

    <div class="input-group-append">
        <button class="btn btn-danger remove-input" type="button" style="z-index:1">Удалить</button>
    </div>
</div>
