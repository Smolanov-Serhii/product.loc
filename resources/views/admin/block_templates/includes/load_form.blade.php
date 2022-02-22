
<form
    role="form"
    method="post"
    enctype="multipart/form-data"
    id="blockTemplateLoadForm"
    action="{{ route('admin.block_templates.load') }}"
>
    <div class="alert alert-danger" style="display: none;">
    </div>
    <div class="form-group">
        <label for="template"> @lang('system.template') </label>
        @isset($block_template->image_path)
            <img class="img-fluid pad" src="{{ '/uploads/block_templates/thumbs/' . $block_template->image_path }}" alt="Preview">
        @endif
        <div class="input-group">
            <div class="custom-file">
                <input
                    type="file"
                    class="custom-file-input"
                    id="template"
                    name="template"
                    accept=".zip"
                >
                <label class="custom-file-label" for="exampleInputFile"> @lang('system.select template') </label>
            </div>
            <div class="input-group-append">
                <span
                    class="input-group-text"
                    id="loadBlockTemplate"
                    style="display: none;"
                >
                    @lang('system.upload')
                </span>
            </div>
        </div>
    </div>
</form>
