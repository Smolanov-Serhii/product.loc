<?php
$u_id = rand(2e9, 2e12);
?>
@csrf

<div class="card-body">
    <div class="row">
        <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-right-tabContent">
                <div class="form-group">
                    <label for="key"> @lang('taxonomy.key') </label>
                    <input
                        name="key"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="@lang('taxonomy.key')"
                        value="{{ $taxonomy->key ?? old('key') }}"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="key"> @lang('taxonomy.name') </label>
                    <input
                        name="name"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="@lang('taxonomy.name')"
                        value="{{ $taxonomy->name ?? old('name') }}"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="selectType"> @lang('block_option_contents.add_value') </code></label>
                    <select
                            class="custom-select form-control-border type-selector"
                            id="type"
                            data-id="{{ $u_id }}"
                    >
                        <option value="-1" selected disabled hidden> @lang('variables.select_type') </option>
                        @foreach(\App\Models\TaxonomyAttribute::TYPE_LIST as $id => $type)
                            <option
                                    value="{{ $type }}"
                            >{{ __('system.'.$type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="module-attributes" id="module_attributes">
                    @foreach($taxonomy->attrs as $attribute)
                        <div class="input-group mb-3">
                            <label for="">{{ \App\Models\TaxonomyAttribute::TYPE_LIST[$attribute->type] }}</label>
                            <input type="hidden" name="old_attributes[{{ $attribute->id }}][type]" value="{{ $attribute->type }}">
                            <input
                                    name="old_attributes[{{ $attribute->id }}][key]"
                                    type="text"
                                    class="form-control input"
                                    placeholder="Ключ аттрибута"
                                    autoComplete="off"
                                    value="{{ $attribute->key }}"
                                    required
                            >
                            <input
                                    name="old_attributes[{{ $attribute->id }}][name]"
                                    type="text"
                                    class="form-control input"
                                    placeholder="Название аттрибута"
                                    autoComplete="off"
                                    value="{{ $attribute->name }}"
                                    required
                            >
                            <div class="input-group-append">
                                <a
                                        href="#"
                                        class="btn btn-danger remove-input"
                                        data-id="{{ $attribute->id }}"
                                >
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="input-group"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>

@section('adminlte_js')
    <script src="{{ asset('/js/taxonomies/add_remove_attributes.js') }}"></script>
@endsection