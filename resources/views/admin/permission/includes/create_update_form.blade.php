@csrf

<div class="card-body">
    <div class="row">
        <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-right-tabContent">
                <div class="form-group">
                    <label for="key"> @lang('permission.name') </label>
                    <input
                            name="name"
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="@lang('permission.name')"
                            value="{{ $permission->name ?? old('name') }}"
                            required
                    >
                </div>
                <div class="form-group">
                    <label for="key"> @lang('permission.slug') </label>
                    <input
                            name="slug"
                            type="text"
                            class="form-control"
                            id="slug"
                            placeholder="@lang('permission.slug')"
                            value="{{ $permission->slug ?? old('slug') }}"
                            required
                    >
                </div>
                <div class="form-group">
                    <label for="key"> @lang('permission.group') </label>
                    <select
                            class="form-control select2bs4 select2-hidden-accessible"
                            name="permission_group_id"
                            aria-hidden="true"
                            required
                    >
                        <option value="-1" selected disabled hidden> @lang('permission.select_group') </option>
                        @foreach($permission_groups as $permission_group)
                            <option
                                    value="{{ $permission_group->id }}"
                                    @if( $permission->group && $permission_group->id == $permission->group->id ) selected @endif
                            >
                                {{ $permission_group->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>