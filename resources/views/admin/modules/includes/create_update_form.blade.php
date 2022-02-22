
<?php
/**
 * @var $model \App\Models\Page;
 * @var $pages \Illuminate\Database\Eloquent\Collection;
 * @var $languages \Illuminate\Database\Eloquent\Collection;
 */
?>
@csrf

{{--<link rel="stylesheet" href="/lib/codemirror.css">--}}
{{--<script src="/lib/codemirror.js"></script>--}}
{{--<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">--}}
{{--<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-ko-KR.min.js"></script>--}}
<!-- include libraries(jQuery, bootstrap) -->
{{--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
{{--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" />--}}
{{--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}

<!-- include summernote css/js-->
{{--<link href="summernote.css" rel="stylesheet">--}}
{{--<script src="summernote.js"></script>--}}


{{--*********--}}
{{--*********--}}
{{--Templates--}}
{{--*********--}}
{{--*********--}}


{{--                   INPUT TEMPLATE--}}
<div class="input-group mb-3" id="attribute" style="display: none">
    <label for=""></label>
    <input type="hidden" name="attribute[type][]">
    <input
        name="attribute[name][]"
        type="text"
        class="form-control input"
        placeholder="{{ __('module_attributes.name') }}"
        autocomplete="off"
    >
    <div class="input-group-append">
        <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>
    </div>
</div>


<div class="card-body">
    <div class="form-group">
        <label for="key"> @lang('modules.name') </label>
        <input
            name="name"
            type="text"
            class="form-control"
            id="name"
            placeholder="{{ __('modules.name') }}"
            value=""
        >
    </div>
    <div class="form-group">
        <label for="selectType"> @lang('block_option_contents.add_value') </code></label>
        <select
            class="custom-select form-control-border"
            id="type"
            >
            <option value="-1" selected disabled hidden> @lang('variables.select_type') </option>
            @foreach(\App\Models\ModuleAttribute::TYPE_LIST as $id => $type)
                <option
                    value="{{ $type }}"
                >{{ __('system.'.$type) }}</option>
            @endforeach
        </select>
    </div>
    <div class="module-attributes">
        <div class="input-group"></div>
{{--        <div class="form-group">--}}
{{--            <label for="value"> @lang('variables.value') </label>--}}
{{--            <input--}}
{{--                name="value"--}}
{{--                type="text"--}}
{{--                class="form-control"--}}
{{--                id="value"--}}
{{--                placeholder="value"--}}
{{--                value=""--}}
{{--            >--}}
{{--        </div>--}}
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>


@section('adminlte_js')
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/summernote.js') }}"></script>
    <script src="{{ asset('/js/modules.js') }}"></script>
@endsection
