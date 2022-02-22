<div class="input-group mb-3 create-field-file" id="option_file_{{ $u_id }}" >
    <input type="hidden" name="attribute[{{ $u_id }}][type]" value="{{ $attribute_type_id }}">
    <input type="hidden" name="attribute[{{ $u_id }}][parent_id]" value="{{ $parent_id }}">
    <input
        name="attribute[{{ $u_id }}][key]"
        type="text"
        class="form-control"
        placeholder="{{ __('block_template_attributes.key') }}"
{{--        value="{{ $block_template->name ?? old('key') }}"--}}
    >
    <div class="custom-file">
        <input
            name="attribute[{{ $u_id }}][name]"
            type="text"
            class="form-control"
            placeholder="{{ __('block_template_attributes.name') }}"
{{--            value="{{ $block_template->name ?? old('name') }}"--}}
        >
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input input"  name="attribute[{{ $u_id }}][default_value]">
        <label class="custom-file-label" for="exampleInputFile"> @lang('system.select file') </label>
    </div>
    <div class="input-group-append">
        <button class="btn btn-danger remove-input" type="button" style="z-index:1">Удалить</button>
    </div>
</div>
