<div class="form-group clearfix icheck-primary-items">
    <label>{{ $taxonomy->name }}</label>
    @foreach($taxonomy->items as $item)
        <div class="icheck-primary d-inline">
            <label>
                <input
                        type="checkbox"
                        name="taxonomy_items[]"
                        value="{{ $item->id }}"
                        @isset($mapped[$item->id]) checked @endif
                >
                <span>{{ $item->name }}</span>
            </label>
        </div>
    @endforeach
</div>