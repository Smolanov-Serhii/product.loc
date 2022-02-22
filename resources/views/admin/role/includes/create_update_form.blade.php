@csrf

<div class="card-body">
    <div class="row">
        <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-right-tabContent">
                <div class="form-group">
                    <label for="key"> @lang('role.name') </label>
                    <input
                            name="name"
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="@lang('role.name')"
                            value="{{ $role->name ?? old('name') }}"
                            required
                    >
                </div>
                <div class="form-group">
                    <label for="key"> @lang('role.slug') </label>
                    <input
                            name="slug"
                            type="text"
                            class="form-control"
                            id="slug"
                            placeholder="@lang('role.slug')"
                            value="{{ $role->slug ?? old('slug') }}"
                            required
                    >
                </div>
                <div class="custom-control custom-switch" style="display: inline-block; width: 30px; margin: 10px;">
                    <input type="hidden" name="is_admin" value="0">
                    <input
                            name="is_admin"
                            type="checkbox"
                            id="is_admin"
                            class="custom-control-input enable-block-switcher"
                            value="1"
                            @if($role->is_admin) checked @endif
                    >
                    <label class="custom-control-label" for="is_admin"> @lang('role.is_admin') </label>
                </div>
                <div class="modules-synch-grpup">
                    @php
                        $role_permissions = array_flip($role->permissions->pluck('id')->toArray());
                    @endphp
                    @foreach($permission_groups as $permission_group)
                        <div class="form-group clearfix icheck-primary-items module-attributes-synch">
                            <label>{{ $permission_group->name }}</label>
                            @foreach($permission_group->permissions as $permission)
                                <div class="icheck-primary-synch">
                                    <label>
                                        <input
                                                type="checkbox"
                                                name="permissions[]"
                                                value="{{ $permission->id }}"
                                                data-group_id="{{ $permission_group->id }}"
                                                class="group-{{ $permission_group->id }} permission"
                                                @isset($role_permissions[$permission->id]) checked @endif
                                        >
                                        <span>{{ $permission->name }}</span>
                                    </label>
                                </div>
                            @endforeach
                            <div class="icheck-primary-synch">
                                <label>
                                    <input
                                            type="checkbox"
                                            data-group_id="{{ $permission_group->id }}"
                                            class="check-group"
                                            id="group_{{ $permission_group->id }}"
                                    >
                                    <span> @lang('permission.check_all_permissions_from_group') "{{ $permission_group->name }}" </span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <div class="icheck-primary-synch">
                        <label>
                            <input
                                    type="checkbox"
                                    id="check_all"
                            >
                            <span>{{ __('permission.check_all') }}</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>


@section('adminlte_js')
    {{--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
    <script src="{{ asset('/js/role/form.js') }}"></script>
@endsection