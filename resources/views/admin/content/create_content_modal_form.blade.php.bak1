<?php
/**
 * @var $page \App\Models\Pages;
 * @var $templates \Illuminate\Database\Eloquent\Collection;
 */
?>

<div class="modal fade" id="contentForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="modal_dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> @lang('block.content') </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_body">
{{--                FORM BEGIN--}}
                <form id="createContentForm" action="{{ route('admin.contents.create') }}" class="">
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
                            <input type="file" class="custom-file-input input"  name="image_path">
                            <label class="custom-file-label" for="exampleInputFile"> @lang('system.select image') </label>
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
                            @foreach($types as $type => $id)
                                <option
                                    value="option_{{ $type }}"
                                >{{ __('system.'.$type) }}</option>
                            @endforeach
                        </select>
{{--                        <button--}}
{{--                            id="saveAndContinueContent"--}}
{{--                            type="button"--}}
{{--                            class="btn btn-primary"--}}
{{--                        > - </button>--}}
                    </div>

                </form>
{{--                   LEFT COLUMN--}}
                <div id="showContentList" class=""></div>
{{--                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contentForm">--}}
{{--                    @lang('block.add_content')--}}
{{--                </button>--}}
            </div>
            <div class="modal-footer">
{{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                <button
                    id="saveAndContinueContent"
                    type="button"
                    class="btn btn-primary"
                > @lang('block_contents.submit_and_continue') </button>
                <button
                    id="saveContent"
                    type="button"
                    class="btn btn-primary"
                > @lang('system.submit') </button>
            </div>
        </div>
    </div>
</div>

{{--*********--}}
{{--*********--}}
{{--Templates--}}
{{--*********--}}
{{--*********--}}



<div class="input-group mb-3" id="option_image" style="display: none">
    <div class="custom-file">
        <input type="file" class="custom-file-input input"  name="option[image_path][]">
        <label class="custom-file-label" for="exampleInputFile"> @lang('system.select image') </label>
    </div>
    <div class="input-group-append">
        <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>
    </div>
</div>
{{--                   OPTION INPUT TEMPLATE--}}
{{--                    <div class="input-group mb-3">--}}
{{--                        <input type="text" class="form-control" placeholder="Something clever.." style="z-index:0">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <button class="btn btn-danger" type="button" style="z-index:1">Удалить</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
<div class="input-group mb-3" id="option_input" style="display: none">
    <input

        name="option[input][]"
        type="text"
        class="form-control input"
        placeholder="{{ __('system.input') }}"
        autocomplete="off"
    >
    <div class="input-group-append">
        <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>
    </div>
</div>
{{--                   OPTION INPUT TEMPLATE--}}
<div class="input-group mb-3" id="option_textarea" style="display: none">
    <textarea
        class="form-control input"
        rows="3"
        placeholder="{{ __('block_contents.content') }}"
        name="option[textarea][]"
    ></textarea>
    <div class="input-group-append">
        <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>
    </div>
</div>
