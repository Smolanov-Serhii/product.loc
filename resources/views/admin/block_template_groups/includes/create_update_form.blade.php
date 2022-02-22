@csrf

<div class="card-body">
    <div class="row">
        <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-right-tabContent">
                <div class="form-group">
                    <label for="key"> @lang('block_template_group.key') </label>
                    <input
                        name="key"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="@lang('block_template_group.key')"
                        value="{{ $blockTemplateGroup->key ?? old('key') }}"
                        required
                    >
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>