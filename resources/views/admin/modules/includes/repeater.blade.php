<div class="module-attributes" id="module_attributes_{{ $module_repeater->id }}">
    <div class="input-group mb-3" id="">
        <label for="">Название повторителя</label>
        <input
                name="old_repeaters[{{ $module_repeater->id }}][key]"
                type="text"
                class="form-control input"
                placeholder="@lang('module_repeaters.key')"
                autoComplete="off"
                value="{{ $module_repeater->key }}"
        >
        <input
                name="old_repeaters[{{ $module_repeater->id }}][name]"
                type="text"
                class="form-control input"
                placeholder="@lang('module_repeaters.name')"
                autoComplete="off"
                value="{{ $module_repeater->name }}"
        >
        <div class="input-group-append">
            <a
                    data-id="{{ $module_repeater->id }}"
                    href="#"
                    class="btn btn-danger module remove-repeater"
            ><i class="fas fa-trash"></i>
            </a>
        </div>
    </div>
    <div class="form-group">
        <label> Создать дополнительное поле </label>
        <select
                class="custom-select form-control-border type-selector"
                data-id="{{ $module_repeater->id }}"
        >
            <option value="0" selected disabled hidden> Выберите тип</option>
            <option value="image">Изображение</option>
            <option value="input">Текстовое поле</option>
            <option value="textarea">Текстовый редактор</option>
            <option value="editor">Html редактор</option>
            <option value="repeater">Повторитель</option>
            <option value="time">Время</option>
        </select>
    </div>
    {{--        <input type="hidden" name="old_repeaters[{{ $module_repeater->id }}][parent_id]" value="{{ $module_repeater->model_id }}">--}}
    @foreach($module_repeater->attrs as $attribute)
        <div class="input-group mb-3" id="attribute">
            <label for=""></label>
            <input
                    name="old_attributes[{{ $attribute->id }}][key]"
                    type="text"
                    class="form-control input"
                    placeholder="{{ __('module_attributes.key') }}"
                    autocomplete="off"
                    value="{{ $attribute->key }}"
            >
            <input
                    name="old_attributes[{{ $attribute->id }}][name]"
                    type="text"
                    class="form-control input"
                    placeholder="{{ __('module_attributes.name') }}"
                    autocomplete="off"
                    value="{{ $attribute->name }}"
            >
            <div class="input-group-append">
                <a
                        data-id="{{ $attribute->id }}"
                        href="#"
                        class="btn btn-danger remove-input"
                ><i class="fas fa-trash"></i>
                </a>
            </div>
        </div>
    @endforeach
    @include('admin.modules.includes.repeaters', [$repeaters = $module_repeater->repeaters])
</div>
