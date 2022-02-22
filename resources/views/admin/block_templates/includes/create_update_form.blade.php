<?php
/**
 * @var $block_template \App\Models\BlockTemplate;
 */

$u_id = $block_template->id ?? rand(2e9, 2e12);

$mapped = $block_template->mappedGroupsById();
?>
@csrf
<input type="hidden" name="id" value="{{ $u_id }}">
<div class="form-check">
    <input
            name="enabled"
            type="checkbox"
            class="form-check-input"
            id="enabled"
    >
    <label class="form-check-label" for="enabled"> @lang('system.status') </label>
</div>
<div class="form-group">
    <label for="name"> @lang('block_templates.name') </label>
    <input
            name="name"
            type="text"
            class="form-control"
            id="name"
            placeholder="name"
            value="{{ $block_template->name ?? old('name') }}"
    >
</div>
<div class="form-group">
    <?php $templates = \App\Models\BlockTemplate::template_list() ?>
    <label> @lang('block_templates.path') </label>
    <select
            class="form-control select2bs4 select2-hidden-accessible"
            name="path"
            style="width: 100%;"
            data-select2-id="17"
            tabindex="-1"
            aria-hidden="true"
    >
        @foreach($templates as $template)
            <option
                    value="{{ $template->getFilename() }}"
                    @if(isset($block_template) && ($template->getBasename() === $block_template->path) ) selected @endif
            >
                {{ $template->getBasename() }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="image"> @lang('system.image') </label>
        <img
                class="img-fluid pad"
                id="image_block_template_{{ $u_id }}"
                @isset($block_template->image_path) src="{{ '/uploads/block_templates/thumbs/' . $block_template->image_path }}"
                @else style="display:none;" @endif
                alt="Preview">

    <div class="input-group">
        <div class="custom-file">
            <input
                    type="file"
                    class="custom-file-input image-input"
                    data-id="block_template_{{ $u_id }}"
                    name="image"
            >
            <label class="custom-file-label" for="exampleInputFile"> @lang('system.select image') </label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text" id=""> @lang('system.upload') </span>
        </div>
    </div>
</div>

<div class="form-group attribute-fields" id="attribute_fields_{{ $u_id }}" style="width:100%;">
    @isset($block_template)
        @include('admin.block_template_attributes.includes.attribute_list',['model' => $block_template])
    @endif
</div>


<div class="form-group ">
    <label for="selectType"> @lang('block_option_contents.add_value') </code></label>
    <select class="custom-select form-control-border select-type" data-u_id="{{ $u_id }}">
        <option value="-1" selected disabled hidden> @lang('block_template_attributes.select_type') </option>
        @foreach($input_types as $id => $type)
            <option
                    value="{{ $id }}"
            >{{ __('system.'.$type) }}</option>
        @endforeach
    </select>
</div>

<div class="form-group clearfix icheck-primary-items group-fields">
    <label> @lang('block_templates.parrent') </label>
    @foreach($block_template_groups as $group)
        <div class="icheck-primary d-inline">
            <label>
                <input
                        type="checkbox"
                        name="groups[]"
                        value="{{ $group->id }}"
                        @isset($mapped[$group->id]) checked @endif
                >
                <span>{{ $group->key }}</span>
            </label>
        </div>
    @endforeach
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>

<div class="overlay dark" style="display: none">
    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
</div>
