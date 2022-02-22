<?php
/**
* @var $page \App\Models\Pages;
* @var $content \App\Models\Block_contents;
* @var $templates \Illuminate\Database\Eloquent\Collection;
*/
?>

<form
    id="contentForm"
    action="{{ route('admin.contents.create', ['block' => $block]) }}"
    class="@if($block->contents->count()) col-md-6 @else col-md-12 @endif"
    enctype="multipart/form-data">
    <!-- Default switch -->
{{--                        <input--}}
{{--                            name="properties[{{ $lang->iso }}][enabled]"--}}
{{--                            type="checkbox"--}}
{{--                            class="form-check-input"--}}
{{--                            id="enabled_{{ $lang->iso }}"--}}
{{--                            @if($lang->enabled) checked--}}
{{--                            @else disabled--}}
{{--                            @endif--}}
{{--                            value="{{ $model->property($lang->id) ? $model->property($lang->id)->enabled : old('properties.'.$lang->iso.'.enabled', true) }}"--}}
{{--                        >--}}
    <div class="custom-control custom-switch">
        <input name="enabled" type="checkbox" class="custom-control-input" id="customSwitches" checked>
        <label class="custom-control-label" for="customSwitches"> @lang('system.disable') </label>
    </div>
{{--                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 88px;"><div class="bootstrap-switch-container" style="width: 129px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 43px;">ON</span><span class="bootstrap-switch-label" style="width: 43px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 43px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch=""></div></div>--}}
{{--                    <div class="form-check form-switch">--}}
{{--                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" />--}}
{{--                        <label class="form-check-label" for="flexSwitchCheckDefault"--}}
{{--                        >Default switch checkbox input</label--}}
{{--                        >--}}
{{--                    </div>--}}
{{--                    <div class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 88px;">--}}
{{--                        <div class="bootstrap-switch-container" style="width: 129px; margin-left: 0px;">--}}
{{--                            <span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 43px;">ON</span>--}}
{{--                            <span class="bootstrap-switch-label" style="width: 43px;">&nbsp;</span>--}}
{{--                            <span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 43px;">OFF</span>--}}
{{--                            <input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
    <input
        type="hidden"
        name="block_id"
        id="block_id"
        value=""
    >
    <div class="alert alert-danger" style="display: none;">
    </div>
{{--                    INPUT--}}
    <div class="form-group">
        <label for="order"> @lang('block_contents.title') </label>
        <input
            id="title"
            name="title"
            type="text"
            class="form-control"
            placeholder="{{ __('block_contents.title') }}"
            autocomplete="off"
        >
    </div>
{{--                    INPUT--}}
    <div class="form-group">
        <label for="order"> @lang('block_contents.sub_title') </label>
        <input
            id="sub_title"
            name="sub_title"
            type="text"
            class="form-control"
            placeholder="{{ __('block_contents.sub_title') }}"
            autocomplete="off"
        >
    </div>
{{--                    INPUT--}}
    <div class="form-group">
        <label for="order"> @lang('block_contents.link') </label>
        <input
            id="link"
            name="link"
            type="text"
            class="form-control"
            placeholder="{{ __('block_contents.link') }}"
            autocomplete="off"
        >
    </div>
{{--                    INPUT--}}
    <div class="form-group" id="textarea">
        <label for="content"> @lang('block_contents.content') </label>
        <textarea
            class="form-control input"
            rows="3"
            placeholder="{{ __('block_contents.content') }}"
            name="content"
            id="content"
        ></textarea>
    </div>
{{--                    INPUT--}}
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input input"  name="image" id="file_{{ $block->id }}">
            <label class="custom-file-label" for="file_{{ $block->id }}"> @lang('system.select image') </label>
        </div>
    </div>

{{--                   OPTION INPUT TEMPLATE--}}
    <div class="form-group option-fields">

    </div>
{{--                    SELECT OPTION TYPE INPUT--}}
    <div class="form-group">
        <label for="selectType"> @lang('block_option_contents.add_value') </code></label>
        <select class="custom-select form-control-border" id="type">
            <option value="-1" selected disabled hidden> @lang('block_option_contents.select_type') </option>
            @foreach($input_types as $id => $type)
                <option
                    value="option_{{ $type }}"
                >{{ __('system.'.$type) }}</option>
            @endforeach
        </select>
    </div>

</form>

<div
    id="contentList"
    class="@if($block->contents->count()) col-md-6 @endif">
    @include('admin.content.content_list')
</div>

