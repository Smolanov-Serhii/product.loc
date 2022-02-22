<div style="border:1px solid green">
    <div class="form-group">
        <label for="addition_title_{{ $lang->iso }}"> @lang('additions.title') </label>
        <input
            name="additions[{{ $lang->iso }}][title]"
            type="text"
            class="form-control addition-title"
            id="addition_title_{{ $lang->iso }}"
            data-lang_iso="{{ $lang->iso }}"
            data-id="{{ $lang->id }}"
            placeholder="{{ __('additions.title') }}"
            value="{{ $model->addition($lang->id)->first() ? $model->addition($lang->id)->first()->title : old('additions.'.$lang->iso.'.title') }}"
        >
    </div>
    <div class="form-group">
        <label for="addition_alias_{{ $lang->id }}"> @lang('additions.alias') </label>
        <input
            name="additions[{{ $lang->iso }}][alias]"
            type="text"
            class="form-control addition-alias"
            id="addition_alias_{{ $lang->id }}"
            placeholder="{{ __('additions.alias') }}"
            value="{{ $model->addition($lang->id)->first() ? $model->addition($lang->id)->first()->alias : old('additions.'.$lang->iso.'.alias') }}"
        >
    </div>
    <div class="form-group">
        <label> @lang('additions.excerpt') </label>
        <textarea
            name="additions[{{ $lang->iso }}][excerpt]"
            class="form-control"
            rows="3"
            id="textarea"
        >{{ $model->addition($lang->id)->first() ? $model->addition($lang->id)->first()->excerpt : old('additions.'.$lang->iso.'.excerpt') }}</textarea>
    </div>
{{--    @dd($lang->id)--}}
{{--    @dd($model->addition)--}}
    <div class="form-group">
        <label for=""> @lang('additions.content') </label>
        <input
            type="hidden"
            id="hidden_addition_content_{{ $lang->id }}"
            name="additions[{{ $lang->iso }}][content]"
        >
        <div
            class="addition-content"
            id="addition_content_{{ $lang->id }}"
        >{{ $model->addition($lang->id)->first() ? $model->addition($lang->id)->first()->content : old('additions.'.$lang->iso.'.excerpt') }}</div>
    </div>

    <div class="form-group">
        @if($model->addition($lang->id)->first())
            <img
                class="img-fluid pad"
                src="{{ '/uploads/additions/' . $model->addition($lang->id)->first()->thumbnail }}"
                alt=""
                id="img_addition_thumbnail_{{ $lang->id }}"
            >
        @else
            <img
                class="img-fluid pad"
                src=""
                alt=""
                id="img_addition_thumbnail_{{ $lang->id }}"
            >
        @endif
        <div class="input-group">
            <div class="custom-file">
                <label class="custom-file-label" for="addition_thumbnail_{{ $lang->id }}"> @lang('system.select image') </label>
                <input
                    class="addition-thumbnail custom-file-input"
                    type="file"
                    id="addition_thumbnail_{{ $lang->id }}"
                    name="additions[{{ $lang->iso }}][thumbnail]"
                    data-id="{{ $lang->id }}"
                >
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id=""> @lang('system.upload') </span>
            </div>
        </div>
    </div>

</div>
