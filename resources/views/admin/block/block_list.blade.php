<div
    id="blockList"
    class="col-md-9 connectedSortable blockList"
    style="
        box-shadow: 0 4px 12px 0 rgb(0 23 46 / 14%);
        padding: 0;
        border-radius: 6px;
        cursor: pointer;
        height: 69vh;
        overflow-y: scroll;
    ">

    @foreach($model->blocks as $block)
        @include('admin.block.block_item')
    @endforeach
</div>
