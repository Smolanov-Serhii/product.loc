@php
    $iterator_id = 'i'.rand(2e9, 2e12);
@endphp

<div class="field-repeater {{ $module->name }}-field" id="repeater_{{ $iterator_id }}">
    <h4>{{ $moduleRepeater->name }}</h4>
    @foreach($moduleRepeater->attrs as $attribute)
        <div class="form-group field-{{ \App\Models\ModuleAttribute::TYPE_LIST[$attribute->type] }}">
            @switch($attribute->type)
                @case(0)
                <label for=""> {{ $attribute->name }} </label>
                {{--                @isset($module_item_props_mapped_by_attr[$attribute->id])--}}
                {{--                    <img class="img-fluid pad" src="/uploads/module_items/{{$module_item_props_mapped_by_attr[$attribute->id]->value}}" alt="Preview">--}}
                {{--                @endif--}}
                <div class="input-group mb-3" id="option_image_{{ $attribute->id }}">
                    <div class="custom-file">
                        <input
                            id="optionFile_{{ $attribute->id }}"
                            type="file"
                            class="custom-file-input input"
                            name="iterations[{{ $parent }}][{{ $moduleRepeater->id }}][{{ $iterator_id }}][{{ $attribute->id }}]"
                            required
                        >
                        <label class="custom-file-label" for="optionFile_{{ $attribute->id }}">
                            {{--                            {{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}--}}
                        </label>
                    </div>
                </div>
                @break

                @case(1)
                <label for="key"> {{ $attribute->name }} </label>
                <input
                    name="iterations[{{ $parent }}][{{ $moduleRepeater->id }}][{{ $iterator_id }}][{{ $attribute->id }}]"
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="{{ $attribute->type }}"
                    required
                    {{--                    value="{{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}"--}}
                >

                @break

                @case(2)
                <label for=""> {{ $attribute->name }} </label>
                <textarea
                    class="form-control input textarea"
                    rows="3"
                    placeholder="{{ __('system.textarea') }}"
                    name="iterations[{{ $parent }}][{{ $moduleRepeater->id }}][{{ $iterator_id }}][{{ $attribute->id }}]"
                    id="content_{{ $attribute->id }}"
                    required
                >
    {{--                    {{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}--}}
                    </textarea>
                @break

                @case(3)
                <label for=""> {{ $attribute->name }} </label>
                <textarea
                    class="form-control input editor"
                    rows="3"
                    placeholder="{{ __('system.textarea') }}"
                    name="iterations[{{ $parent }}][{{ $moduleRepeater->id }}][{{ $iterator_id }}][{{ $attribute->id }}]"
                    id="content_{{ $attribute->id }}"
                    required
                >
    {{--                    {{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}--}}
                    </textarea>
                {{--                <input--}}
                {{--                    name="iterations[{{ $parent }}][{{ $moduleRepeater->id }}][{{ $iterator_id }}][{{ $attribute->id }}]"--}}
                {{--                    type="hidden"--}}
                {{--                    id="hidden_attribute_{{ $attribute->id }}"--}}
                {{--                    required--}}
                {{--                >--}}
                {{--                <div--}}
                {{--                    class="form-control input editor"--}}
                {{--                    rows="3"--}}
                {{--                    placeholder="{{ $attribute->default_value }}"--}}
                {{--                    id="attribute_{{ $attribute->id }}"--}}
                {{--                    required--}}
                {{--                >--}}
                {{--                    --}}{{--                    {{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}--}}
                {{--                </div>--}}
                @break
                {{--                @case(4)--}}
                {{--                <label for=""> {{ $attribute->name }} </label>--}}
                {{--                <input--}}
                {{--                    name="attributes[{{ $attribute->id }}]"--}}
                {{--                    type="hidden"--}}
                {{--                    id="hidden_attribute_{{ $attribute->id }}"--}}
                {{--                >--}}
                {{--                <div--}}
                {{--                    class="form-control input editor"--}}
                {{--                    rows="3"--}}
                {{--                    placeholder="{{ $attribute->default_value }}"--}}
                {{--                    id="attribute_{{ $attribute->id }}"--}}
                {{--                >--}}
                {{--                    --}}{{--                    {{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}--}}
                {{--                </div>--}}
                {{--                @break--}}
                @case(5)
                <label for="key"> {{ $attribute->name }} </label>
                <input
                    name="iterations[{{ $parent }}][{{ $moduleRepeater->id }}][{{ $iterator_id }}][{{ $attribute->id }}]"
                    type="time"
                    class="form-control"
                    id="name"
                    step="300"
                    placeholder="{{ $attribute->type }}"
                    required
                    {{--                    value="{{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}"--}}
                >

                @break
            @endswitch
        </div>
    @endforeach
    <button
        type="button"
        class="btn btn-danger btn-icon module-item remove-repeater"
        data-iteration_id="{{ $iterator_id }}"
    >
        <i class="fa fa-trash" aria-hidden="true"></i>
    </button>
    @include('admin.module_items.includes.repeaters', [
        $repeaters = $moduleRepeater->repeaters,
        $parent_iteration_id = $iterator_id,
    ])
</div>
