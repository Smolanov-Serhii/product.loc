
<form id="blockCreateForm" action="{{ route('admin.blocks.create', ['page' => $page]) }}">
    <div class="alert alert-danger" style="display: none;">
    </div>
    <div class="form-check">
        <input
            id="enabled"
            name="enabled"
            type="checkbox"
            class="form-check-input"
        >
        <label class="form-check-label" for="enabled"> @lang('system.disable') </label>
    </div>
    <div class="form-group">
        <label for="order"> @lang('block.order') </label>
        <input
            id="order"
            name="order"
            type="text"
            class="form-control"
            placeholder="{{ __('block.use_drag_and_drop') }}"
            disabled
        >
    </div>
    <div class="form-group">
        <label> @lang('block.template') </label>
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
                <option
                    value="{{ $template->id }}"
                >
                    {{ $template->name }}
                </option>
            @endforeach
        </select>
    </div>
</form>
