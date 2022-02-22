@foreach($translate->options as $option)
    @switch($option->type)
        @case(0)
        <input type="hidden" name="option[image][{{ $option->id }}]" value="">
            <div class="input-group mb-3" id="option_image_{{ $option->id }}">
                <div class="custom-file">
                    <input type="hidden" name="option[image][{{ $option->id }}]" value="{{ $option->value }}">
                    <input id="optionFile_{{ $option->id }}" type="file" class="custom-file-input input"  name="option[image][{{ $option->id }}]">
                    <label class="custom-file-label" for="optionFile_{{ $option->id }}">{{ $option->value }}</label>
                </div>
                <div class="input-group-append">
                    <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>
                </div>
            </div>
            @break

        @case(1)
            <div class="input-group mb-3" id="option_input_{{ $option->id }}" style="">
                <input
                    name="option[input][{{ $option->id }}]"
                    type="text"
                    class="form-control input"
                    placeholder="{{ __('system.input') }}"
                    autocomplete="off"
                    value="{{ $option->value }}"
                >
                <div class="input-group-append">
                    <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>
                </div>
            </div>
            @break

        @case(2)
            <div class="input-group mb-3" id="option_textarea_{{ $option->id }}" style="">
                <textarea
                    class="form-control input"
                    rows="3"
                    placeholder="{{ __('block_contents.content') }}"
                    name="option[textarea][{{ $option->id }}]"
                >{{ $option->value }}</textarea>
                    <div class="input-group-append">
                        <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>
                    </div>
            </div>
            @break

    @endswitch
@endforeach
