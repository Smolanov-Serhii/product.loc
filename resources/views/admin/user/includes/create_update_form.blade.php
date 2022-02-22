@csrf

<div class="card-body">
    <div class="row">
        <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-right-tabContent">
                <div class="form-group">
                    <label for="key"> @lang('user.name') </label>
                    <input
                        name="name"
                        type="text"
                        class="form-control"
                        id="key"
                        placeholder="@lang('user.name')"
                        value="{{ $user->name ?? old('name') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="key"> @lang('user.role') </label>
                    <select
                            class="form-control select2bs4 select2-hidden-accessible"
                            name="role"
                            aria-hidden="true"
                    >
                        @foreach($roles as $role)
                            <option
                                    value="{{ $role->id }}"
                                    @if( $user->hasRole($role->slug) ) selected @endif
                            >
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>