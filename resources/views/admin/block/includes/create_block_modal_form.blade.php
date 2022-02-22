<?php
/**
 * @var $page \App\Models\Pages;
 * @var $templates \Illuminate\Database\Eloquent\Collection;
 */
?>
<div class="modal fade" id="blockForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> @lang('block.add') </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createBlockForm" action="{{ route('admin.blocks.create') }}">
                    <div class="alert alert-danger" style="display: none;">
                    </div>
                    <input
                        id="page_id"
                        type="hidden"
                        name="page_id"
                        value="{{ $page->id }}">

                    <div class="form-check">
                        <input
                            id="enabled"
                            name="enabled"
                            type="checkbox"
                            class="form-check-input"
                        >
                        <label class="form-check-label" for="enabled"> @lang('system.status') </label>
                    </div>
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input
                            id="order"
                            name="order"
                            type="text"
                            class="form-control"
                            placeholder="order"
                        >
                    </div>
                    <div class="form-group">
                        <label> tamplate </label>
                        <select
                            id="block_template_id"
                            class="form-control select2bs4 select2-hidden-accessible"
                            name="block_template_id"
                            style="width: 100%;"
                            data-select2-id="17"
                            tabindex="-1"
                            aria-hidden="true"
                        >
                            @foreach($templates as $template)
                                <option value="{{ $template->id }}">
                                    {{ $template->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
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
