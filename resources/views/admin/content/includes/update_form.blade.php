<?php
/**
 * @var $content BlockContent;
 * @var $block Block;
 */

use App\Models\Block;
use App\Models\BlockContent;

?>

<form
    id="contentForm"
    method="POST"
    action="{{ route('admin.contents.update', ['block' => $block]) }}"
    enctype="multipart/form-data"
    class="card"
>
    <div class="overlay dark" style="display:none" id="form_spiner">
        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
    </div>
    <input
        type="hidden"
        name="id"
        value="{{ class_basename($block) }}_{{ $block->id }}"
    >

    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active @endif"
                           id="addition_tab_link"
                           data-toggle="pill"
                           href="#content_tab_{{ $language->iso }}"
                           role="tab"
                           aria-controls="custom-tabs-two-home"
                           aria-selected="false"
                        >
                            {{ $language->iso }}
                        </a>
                    </li>
                @endforeach

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link"--}}
{{--                       id="seo_tab_link"--}}
{{--                       data-toggle="pill"--}}
{{--                       href="#seo_tab_"--}}
{{--                       role="tab"--}}
{{--                       aria-controls="custom-tabs-two-profile"--}}
{{--                       aria-selected="false"--}}
{{--                    >--}}
{{--                        @lang('seo.form_tab')--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
                @foreach(\App\Models\Language::enabled()->get() as $language)
                    <div class="tab-pane fade show @if($loop->first) active @endif" id="content_tab_{{ $language->iso }}" role="tabpanel"
                         aria-labelledby="content_tab_{{ $language->iso }}">
                        @php
                            $block_fillings = $block->fillings($language);
                        @endphp

                        @foreach($block->template->attrs as $attribute)
                            @include('admin.content.includes.attributes.block_attribute')
                        @endforeach

                        @foreach($block->template->repeaters as $repeater)
{{--                            {{ dd($block_fillings['iterations'][$repeater->id]) }}--}}
                            @include('admin.content.includes.repeater', [
                                'iterations' => $block_fillings['iterations'][$repeater->id] ?? null,
                                'content' => $block,
                                'parent_u_id' => "Block_{$block->id}",
                                'parent_type' => class_basename($block),
                            ])
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /.card -->
    </div>

{{--</pre>--}}

{{--    @foreach($block->fillings()['contents'] as $content)--}}
{{--        {{ $content->translate->value }} <br>--}}
{{--        @dd($content)--}}
{{--        C{{ $content->id }} <br>--}}
{{--        __translate {{ $content->translate->value }}--}}
{{--    @endforeach--}}
{{--    ______________ <br>--}}
{{--    @foreach($block->fillings()['iterations'] as $repeater_id => $iterations)--}}
{{--        repeater {{ $repeater_id }} <br>--}}
{{--        @foreach($iterations as $iteration)--}}
{{--            __________I {{ $iteration->id }} <br>--}}
{{--            @foreach($iteration['iterations'] as $repeater_id => $iterations)--}}
{{--                _____________repeater- {{ $repeater_id }} <br>--}}
{{--                @foreach($iterations as $iteration)--}}
{{--                    ____________________I {{$iteration->id}}<br>--}}
{{--                @endforeach--}}
{{--            @endforeach--}}
{{--        @endforeach--}}
{{--        {{ $iteration->id }} <br>--}}
{{--    @endforeach--}}
{{--    @foreach($block->fillings() as $filling_type => )--}}
{{--        @foreach($filling_type as $filling_type)--}}

{{--            {{ $propery->id }}--}}
{{--        @endforeach--}}
{{--        {{ $propery->id }}--}}
{{--    @endforeach--}}
{{--    @include('admin.content.includes.content', [$content = $block, $template = $block->template])--}}

    {{--    <div class="custom-control custom-switch">--}}
    {{--        <input name="enabled" type="checkbox" class="custom-control-input" id="customSwitches" checked>--}}
    {{--        <label class="custom-control-label" for="customSwitches"> @lang('system.disable') </label>--}}
    {{--    </div>--}}
    <div class="alert alert-danger" style="display: none;">
    </div>
</form>


    <style>
        .movable-placeholder {
            background: #ccc;
            /*width: 400px;*/
            /*height: 100px;*/
            display: block;
            /*padding: 20px;*/
            /*margin: 0 0 15px 0;*/
            border-style: dashed;
            border-width: 0;
            border-color: #000;
        }
        .move {
            background: #ff0000;
            width: 30px;
            height: 30px;
            float: right;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
            line-height: 30px;
            font-family: Arial;
            cursor: move;
        }
    </style>
