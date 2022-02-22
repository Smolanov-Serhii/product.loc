@csrf

<div class="card-body">
    <div class="row">
        <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-right-tabContent">
                <div class="form-group">
                    <label for="key"> @lang('widget.slug') </label>
                    <input
                            name="slug"
                            type="text"
                            class="form-control"
                            id="slug"
                            placeholder="@lang('widget.slug')"
                            value="{{ $widget->slug ?? old('slug') }}"
                            required
                    >
                </div>
                <div class="custom-control custom-switch" style="display: inline-block; width: 30px; margin: 10px;">
                    <input type="hidden" name="enable" value="0">
                    <input
                            name="enable"
                            type="checkbox"
                            id="enable"
                            class="custom-control-input enable-block-switcher"
                            value="1"
                            @if($widget->enable) checked @endif
                    >
                    <label class="custom-control-label" for="enable"> @lang('widget.enable') </label>
                </div>
                @if($widget->exists)
                    @include('admin.block.includes.constructor', [
                        'model' => $widget,
                        'block_templates' => \App\Models\BlockTemplateGroup::pagesGroup()->templates
                    ])
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>


@section('adminlte_js')
    @parent('adminlte_js')
    {{--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
    <script src="{{ asset('/js/summernote.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/list.js') }}"></script>
@endsection