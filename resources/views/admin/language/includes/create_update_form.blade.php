@csrf

<div class="card-body">
    <div class="row">
        <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-right-tabContent">
                <div class="form-group">
                    <label for="iso"> @lang('language.iso') </label>
                    <select
                            class="form-control select2-hidden-accessible"
                            name="iso"
                            id="iso">
                        @foreach(Languages::lookup() as $iso => $lang)
                            <option
                                    value="{{ $iso }}"
                                    @if(Arr::exists(Cache::get('languages'), $iso)) disabled @endif
                            >{{ $lang }}</option>
                        @endforeach
                    </select>
{{--                    <input--}}
{{--                            name="name"--}}
{{--                            type="text"--}}
{{--                            class="form-control"--}}
{{--                            id="name"--}}
{{--                            placeholder="@lang('language.name')"--}}
{{--                            --}}{{--                            value="{{ $language->name ?? old('name') }}"--}}
{{--                            required--}}
{{--                    >--}}
                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="key"> @lang('language.name') </label>--}}
{{--                    <input--}}
{{--                            name="name"--}}
{{--                            type="text"--}}
{{--                            class="form-control"--}}
{{--                            id="name"--}}
{{--                            placeholder="@lang('language.name')"--}}
{{--                            value="{{ $language->name ?? old('name') }}"--}}
{{--                            required--}}
{{--                    >--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="key"> @lang('language.slug') </label>--}}
{{--                    <input--}}
{{--                            name="slug"--}}
{{--                            type="text"--}}
{{--                            class="form-control"--}}
{{--                            id="slug"--}}
{{--                            placeholder="@lang('language.slug')"--}}
{{--                            value="{{ $language->slug ?? old('slug') }}"--}}
{{--                            required--}}
{{--                    >--}}
{{--                </div>--}}
{{--                <div class="custom-control custom-switch" style="display: inline-block; width: 30px; margin: 10px;">--}}
{{--                    <input type="hidden" name="is_admin" value="0">--}}
{{--                    <input--}}
{{--                            name="is_admin"--}}
{{--                            type="checkbox"--}}
{{--                            id="is_admin"--}}
{{--                            class="custom-control-input enable-block-switcher"--}}
{{--                            value="1"--}}
{{--                            @if($language->is_admin) checked @endif--}}
{{--                    >--}}
{{--                    <label class="custom-control-label" for="is_admin"> @lang('language.is_admin') </label>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>


@section('adminlte_js')
    {{--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
{{--    <script src="{{ asset('/js/language/form.js') }}"></script>--}}
@endsection