<?php
/**
 * @var $page \App\Models\Pages;
 * @var $templates \Illuminate\Database\Eloquent\Collection;
 */
?>
<div class="modal fade" id="templateModalLoad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> @lang('block_template.load') </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @includeIf('admin.block_templates.includes.load_form')
{{--                <span class="badge badge-danger">--}}
{{--                    Серега, не используй ";" в тексте поля значение по-умолчанию, бо не спарсит н..я--}}
{{--                </span>--}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button
                    id="saveBlock"
                    type="button"
                    class="btn btn-primary"
                > @lang('system.submit') </button>
            </div>
        </div>
    </div>
</div>
