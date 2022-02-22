<?php
/**
 * @var $module \App\Models\Module;
 * @var $taxonomies \App\Models\Taxonomy;
 */
?>
@csrf

<div class="card-body module-create-items">
    <div class="form-group">
        <label for="key"> @lang('modules.name') </label>
        <input
                name="name"
                type="text"
                class="form-control"
                id="name"
                placeholder="@lang('modules.name')"
                value="{{ $module->name ?? old('name') }}"
        >
    </div>
    <div class="form-group">
        <label for="type_selector_{{ $module->id }}"> @lang('block_option_contents.add_value') </code></label>
        <select
                class="custom-select form-control-border type-selector"
                id="type_selector_{{ $module->id }}"
                data-id="{{ $module->id }}"
        >
            <option value="0" selected disabled hidden> @lang('variables.select_type') </option>
            @foreach(\App\Models\ModuleAttribute::TYPE_LIST as $id => $type)
                <option
                        value="{{ $type }}"
                > @lang('system.'.$type) </option>
            @endforeach
        </select>
    </div>
    <div
            id="module_attributes_{{ $module->id }}"
            class="module-attributes"
    >
        <div class="input-group"></div>
        @isset($module)
            @foreach($module->attrs as $attribute)
                <div class="input-group mb-3" id="attribute">
                    <label for=""></label>
                    <input
                            name="old_attributes[{{ $attribute->id }}][key]"
                            type="text"
                            class="form-control input"
                            placeholder="@lang('module_attributes.key')"
                            autocomplete="off"
                            value="{{ $attribute->key }}"
                    >
                    <input
                            name="old_attributes[{{ $attribute->id }}][name]"
                            type="text"
                            class="form-control input"
                            placeholder="@lang('module_attributes.name')"
                            autocomplete="off"
                            value="{{ $attribute->name }}"
                    >
                    <div class="input-group-append">
                        <a
                                data-id="{{ $attribute->id }}"
                                href="#"
                                class="btn btn-danger remove-input"
                        >
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            @endforeach
            @include('admin.modules.includes.repeaters', [$repeaters = $module->repeaters])
        @endif
    </div>
    <div class="form-group clearfix icheck-primary-items module-attributes">
        <label>@lang('module_attributes.group')</label>
        @php
            $mapped = $module->mappedTaxonomiesById();
        @endphp
        @foreach($taxonomies as $taxonomy)
            <div class="icheck-primary d-inline">
                <label style="cursor:pointer">
                    <input
                            type="checkbox"
                            name="taxonomies[]"
                            value="{{ $taxonomy->id }}"
                            @isset($mapped[$taxonomy->id]) checked @endif
                    >
                    <span>
                        {{ $taxonomy->name }}
                    </span>
                </label>
            </div>
        @endforeach
    </div>
    <div class="form-group clearfix icheck-primary-items module-attributes">
        <label>@lang('modules.related')</label>
        @php
            $mapped = $module->mappedModulesById();
        @endphp
        @foreach($modules as $neighbour_module)
            <div class="icheck-primary d-inline">
                <label style="cursor:pointer">
                    <input
                            type="checkbox"
                            name="modules[]"
                            value="{{ $neighbour_module->id }}"
                            @isset($mapped[$neighbour_module->id]) checked @endif
                    >
                    <span>
                        {{ $neighbour_module->name }}
                    </span>
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>


@section('adminlte_js')
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/summernote.js') }}"></script>
    <script src="{{ asset('/js/modules.js') }}"></script>
@endsection
