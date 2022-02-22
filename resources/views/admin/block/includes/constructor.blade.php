

<div class="row">
    <div class="col-md-3">
        <h3>Доступные шаблоны</h3>
    </div>
    <div class="col-md-9">
        <h3>Предварительный просмотр страницы</h3>
    </div>
</div>
<div class="row admin-template-row">
    @include('admin.block.template_list')
    @include('admin.block.block_list')
</div>
<div class="modal fade" id="confirmDeleteBlock">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title"> @lang('system.confirm') </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p> @lang('block.confirm_delete_block_question') </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal"> @lang('system.cancel') </button>
                <button type="button" class="btn btn-outline-light" id="deleteBlock"> @lang('system.delete') </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section('adminlte_js')
    @parent('adminlte_js')
    <script>
        var block_create_content_form_action = '{{ route('admin.blocks.create', ['model_name' => class_basename($model), 'model_id' => $model->id]) }}';
        var block_update_order_form_action = '{{ route('admin.blocks.order.update', ['model_name' => class_basename($model), 'model_id' => $model->id]) }}';
    </script>
@endsection