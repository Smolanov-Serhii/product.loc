@php
        $iterator_id = $iteration->id;
@endphp
<div class="field-iteration {{ $module_item->module->name }}-field" id="iteration_{{ $iterator_id }}">
    <h4>{{ $iteration->repeater->name }}</h4>
    @foreach($iteration->props as $prop)
        @php
            $attribute = $prop->type;
        @endphp
        <div class="form-group {{ $module_item->module->name }}-field field-{{ \App\Models\ModuleAttribute::TYPE_LIST[$attribute->type] }}">
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
                            name="old_iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $prop->id }}]"
                        >
                        <label class="custom-file-label" for="optionFile_{{ $prop->id }}">
                            {{--                                                        {{ $module_item_props_mapped_by_attr[$attribute->id]->value ?? 'NEW' }}--}}
                        </label>
                    </div>
                </div>
                @break

                @case(1)
                <label for="key"> {{ $attribute->name }} </label>
                <input
                    name="old_iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $prop->id }}]"
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="{{ $attribute->type }}"
                    value="{{ $prop->value }}"
                >

                @break

                @case(2)
                <label for=""> {{ $attribute->name }} </label>
                <textarea
                    class="form-control input textarea"
                    rows="3"
                    placeholder="{{ __('system.textarea') }}"
                    name="old_iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $prop->id }}]"
                    id="content_{{ $attribute->id }}"
                >{{ $prop->value }}</textarea>
                @break

                @case(3)
                <label for=""> {{ $attribute->name }} </label>
                <input
                    name="old_iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $prop->id }}]"
                    type="hidden"
                    id="hidden_attribute_{{ $attribute->id }}"
                    value="{{ $prop->value }}"
                >
                <textarea
                    class="form-control input editor"
                    rows="3"
                    placeholder="{{ __('system.textarea') }}"
                    name="iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $attribute->id }}]"
                    id="content_{{ $attribute->id }}"
                    required
                >
                    {{ $prop->value }}
                </textarea>
{{--                <div--}}
{{--                    class="form-control input editor"--}}
{{--                    rows="3"--}}
{{--                    placeholder="{{ $attribute->default_value }}"--}}
{{--                    id="attribute_{{ $attribute->id }}"--}}
{{--                ></div>--}}
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
                    name="old_iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $prop->id }}]"
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="{{ $attribute->type }}"
                    value="{{ $prop->value }}"
                >

                @break
            @endswitch
        </div>
    @endforeach
    <button
        type="button"
        class="btn btn-danger btn-icon module-item remove-iteration"
        data-iteration_id="{{ $iterator_id }}"
    >
        <i class="fa fa-trash" aria-hidden="true"></i>
    </button>
{{--    @php--}}
{{--        $parent = $parent_iteration_id ?? 'Module_items';--}}
{{--    @endphp--}}
    @if($iteration->iterations->count())
        @include('admin.module_items.includes.iterations', [
            'iterations' => $iteration->iterations,
            $parent_iteration_id = $iterator_id,
        ])
    @endif
</div>
