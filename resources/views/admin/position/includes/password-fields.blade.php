<div class="form-group">
    <label>{{ __('admin/users.password') }}</label>
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-key"></i>
        </div>
        <input
            type="password"
            class="form-control pull-right"
            name="password"
            placeholder="{{ __('admin/users.type_password') }}"
            value="{{ old('password') }}"
            autocomplete="off"
        >
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-repeat"></i>
        </div>
        <input
            type="password"
            class="form-control pull-right"
            name="repeat_password"
            placeholder="{{ __('admin/users.repeat_password') }}"
            autocomplete="off"
        >
    </div>
</div>
