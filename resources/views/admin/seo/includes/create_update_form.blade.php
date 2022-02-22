<div>
    <div class="form-group">
        <label for="seo_title_{{ $lang->iso }}"> @lang('seo.title') </label>
        <input
            name="seo[{{ $lang->iso }}][title]"
            type="text"
            class="form-control seo-title"
            id="seo_title_{{ $lang->iso }}"
            data-lang_iso="{{ $lang->iso }}"
            data-id="{{ $lang->id }}"
            placeholder="{{ __('seo.title') }}"
            value="{{ $model->seo($lang->id)->first() ? $model->seo($lang->id)->first()->title : old('seo.'.$lang->iso.'.title') }}"
            required
        >
    </div>
    <div class="form-group">
        <label for="seo_alias_{{ $lang->id }}"> @lang('seo.alias') </label>
        <input
            name="seo[{{ $lang->iso }}][alias]"
            type="text"
            class="form-control seo-alias"
            id="seo_alias_{{ $lang->id }}"
            placeholder="{{ __('seo.alias') }}"
            value="{{ $model->seo($lang->id)->first() ? $model->seo($lang->id)->first()->alias : old('seo.'.$lang->iso.'.alias') }}"
            required
        >
    </div>
    <div class="form-group">
        <label for="seo_meta_keywords_{{ $lang->id }}"> @lang('seo.meta_keywords') </label>
        <input
            name="seo[{{ $lang->iso }}][meta_keywords]"
            type="text"
            class="form-control seo-alias"
            id="seo_meta_keywords_{{ $lang->id }}"
            placeholder="{{ __('seo.meta_keywords') }}"
            value="{{ $model->seo($lang->id)->first() ? $model->seo($lang->id)->first()->meta_keywords : old('seo.'.$lang->iso.'.meta_keywords') }}"
            required
        >
    </div>
    <div class="form-group">
        <label> @lang('seo.meta_description') </label>
        <textarea
            name="seo[{{ $lang->iso }}][meta_description]"
            class="form-control"
            rows="3"
            id="textarea"
            required
        >{{ $model->seo($lang->id)->first() ? $model->seo($lang->id)->first()->meta_description : old('seo.'.$lang->iso.'.meta_description') }}</textarea>
    </div>
    <div class="form-group field-image">

{{--        @dd($model->seo($lang->id)->first())--}}
        @if($model->seo($lang->id)->first())
            @if($model->seo($lang->id)->first()->thumbnail)
                <img
                        class="img-fluid pad"
                        src="{{ '/uploads/seo/thumbs/' . $model->seo($lang->id)->first()->thumbnail }}"
                        alt=""
                        id="img_seo_thumbnail_{{ $lang->id }}"
                >
            @endif

        @else
            <img
                class="img-fluid pad"
                src=""
                alt=""
                id="img_seo_thumbnail_{{ $lang->id }}"
            >
        @endif
        <div class="input-group">
            <div class="custom-file">
                <label class="custom-file-label" for="seo_thumbnail_{{ $lang->id }}"> @lang('system.select image') </label>
                <input
                    class="seo-thumbnail custom-file-input"
                    type="file"
                    id="seo_thumbnail_{{ $lang->id }}"
                    name="seo[{{ $lang->iso }}][thumbnail]"
                    data-id="{{ $lang->id }}"
                >
            </div>
            <div class="input-group-append">
                <span class="input-group-text" id=""> @lang('system.upload') </span>
            </div>
        </div>
    </div>

</div>
