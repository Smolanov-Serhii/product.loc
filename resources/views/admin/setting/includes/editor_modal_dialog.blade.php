<div
    class="modal fade"
    id="editorFormModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-xl" id="modal_dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> @lang('setting.property_editor') </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_body">
                {{--                Block content attr list here                --}}
                <div id="jsoneditor"></div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-primary save-setting"
                    id="save_settings"
                > @lang('system.submit') </button>
            </div>
        </div>
    </div>
</div>
