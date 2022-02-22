@csrf

<div class="card-body">
    <div class="row">
        <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-right-tabContent">
                <div class="form-group">
                    <label for="key"> @lang('permission_group.name') </label>
                    <input
                            name="name"
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="@lang('permission_group.name')"
                            value="{{ $permission_group->name ?? old('name') }}"
                            required
                    >
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>