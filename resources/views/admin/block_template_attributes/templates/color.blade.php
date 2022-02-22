<div class="input-group mb-3 rounded field-color" id="option_{{ $u_id }}">
    <h2>Текстовое поле</h2>
    <br>
    <div class="form-group" style="width:100%">
        <input type="hidden" name="attribute[{{ $u_id }}][type]" value="{{ $attribute_type_id }}">
        <input type="hidden" name="attribute[{{ $u_id }}][parent_id]" value="{{ $parent_id }}">

        <div class="input-group create-field-color">
            <input
                name="attribute[{{ $u_id }}][key]"
                type="text"
                class="form-control"
                {{--        id="key"--}}
                placeholder="{{ __('block_template_attributes.key') }}"
                {{--        value="{{ $block_template->name ?? old('key') }}"--}}
            >
            <input
                name="attribute[{{ $u_id }}][name]"
                type="text"
                class="form-control"
                {{--        id="name"--}}
                placeholder="{{ __('block_template_attributes.name') }}"
                {{--        value="{{ $block_template->name ?? old('name') }}"--}}
            >
            <input
                name="attribute[{{ $u_id }}][default_value]"
                type="color"
                class="form-control color"
                placeholder="{{ __('block_template_attributes.default_value') }}"
                autocomplete="off"
                value=""
            >
        </div>
        <div class="input-group-append">
            <button
                data-u_id="{{ $u_id }}"
                class="btn btn-danger remove-input"
                type="button"
                style="z-index:1"
            >Удалить</button>
        </div>

    </div>
</div>
