<?php
/**
 * @var $page \App\Models\Pages;
 * @var $templates \Illuminate\Database\Eloquent\Collection;
 */
?>

<div class="modal fade" id="contentFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" id="modal_dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> @lang('block.content') </h5>
                <div class="modal-header__buttons">
                    <button
                        type="button"
                        class="btn btn-primary save-content"
                    > @lang('system.submit') </button>
                    <button
                        type="button"
                        class="btn btn-primary save-content"
                        data-close_form="true"
                    > @lang('system.submit_and_close') </button>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body card" id="modal_body">
                <div class="overlay dark" id="form_spiner">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                {{--                Block content attr list here                --}}
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-primary save-content"
                > @lang('system.submit') </button>
                <button
                    type="button"
                    class="btn btn-primary save-content"
                    data-close_form="true"
                > @lang('system.submit_and_close') </button>
            </div>
        </div>
    </div>
</div>
