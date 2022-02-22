<div id="templateList" class="col-md-3 connectedSortable" style="height: 69vh;">
    @foreach($block_templates as $template)
        @include('admin.block.template_item')
    @endforeach
</div>
