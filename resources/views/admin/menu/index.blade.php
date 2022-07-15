<?php
/**
 * @var $models \Illuminate\Database\Eloquent\Collection
 * @var $menu \Illuminate\Database\Eloquent\Collection
 * @var $sorted_items \Illuminate\Database\Eloquent\Collection
 */
//
////$menu_by_key = $menu;
//$menu_sorted = $menu
//    ->sortBy('order')
//    ->groupBy('model')
//    ->map(function ($model) {
//        return $model->keyBy('model_id');
//    });
//dd($menu_sorted)
?>

@extends('adminlte::page')
@section('title', __('menu.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => '/'
        ],
        [
            'label' => __('menu.list'),
        ]
    ])
@endsection

@section('content')
    {{--    <div class="modal fade" id="menuFormModal" tabindex="-1" role="dialog" aria-hidden="true">--}}
    {{--        <div class="modal-dialog modal-xs" id="modal_dialog" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h5 class="modal-title" id="exampleModalLabel"> @lang('menu.add') </h5>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true"></span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body" id="modal_body">--}}
    {{--                    --}}{{--                FORM BEGIN--}}

    {{--                    --}}{{--                   LEFT COLUMN--}}

    {{--                    --}}{{--                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contentForm">--}}
    {{--                    --}}{{--                    @lang('block.add_content')--}}
    {{--                    --}}{{--                </button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-footer">--}}
    {{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
    {{--                    --}}{{--                <button--}}
    {{--                    --}}{{--                    id="saveAndContinueContent"--}}
    {{--                    --}}{{--                    type="button"--}}
    {{--                    --}}{{--                    class="btn btn-primary"--}}
    {{--                    --}}{{--                > @lang('block_contents.submit_and_continue') </button>--}}
    {{--                    <button--}}
    {{--                        id="saveContent"--}}
    {{--                        type="button"--}}
    {{--                        class="btn btn-primary"--}}
    {{--                    > @lang('system.submit') </button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <form
        role="form"
        action="{{ route('admin.menu.save') }}"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf
        @if($menu_items->count() > 0)
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title"> @lang('menu.list') </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0" id="menu">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th> @lang('menu.show in menu') </th>
                                <th> @lang('menu.link_text') </th>
                                <th> @lang('menu.url') </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="menu_list">
                            {{--                            @dd($models)--}}
                            @foreach($menu_items as $id => $model)
                                @php
                                    //dd($model, $id)
                                @endphp
                                {{--                                @dd($menu_map[class_basename($model)][$model->id]->id)--}}
                                <tr
                                    id="{{ $id }}"
                                >
                                    <td>
                                        <div class="form-check">
                                            <input
                                                type="hidden"
                                                name="model[{{ $model['class_name'] }}][{{ $model['id'] }}]"
                                                value="false"
                                            >
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="model[{{ $model['class_name'] }}][{{ $model['id'] }}]"
                                                value="true"
                                                @if($model['checked']) checked @endif
                                            >
                                            {{--                                        <label class="form-check-label">Checkbox</label>--}}
                                        </div>
                                    </td>
                                    <td>
                                        {{ $model['title'] }}
                                    </td>
                                    <td>
                                        <a
                                            href="/{{ $model['alias'] }}"
                                            target="_blank"
                                        >
                                            /{{ $model['alias'] }}
                                        </a>
                                    </td>
                                    <td>
                                        @switch($model['type'])
                                            @case ('Pages')
                                            <span class="badge badge-danger">pages</span>
                                            @break
                                            @case ('Menu_items')
                                            <span class="badge badge-primary">custom</span>
                                            @break
                                        @endswitch
                                    </td>

                                </tr>
                            @endforeach
                            {{--                            @isset($menu_map['Menu_items'])--}}
                            {{--                                @foreach($menu_map['Menu_items'] as $model_id => $model )--}}
                            {{--                                    @php--}}
                            {{--                                        $item = $model->item;--}}
                            {{--                                    @endphp--}}
                            {{--                                    <tr id="{{$model->id}}">--}}
                            {{--                                        <td>--}}
                            {{--                                            <div class="form-check">--}}
                            {{--                                                <input--}}
                            {{--                                                    type="hidden"--}}
                            {{--                                                    name="model[{{class_basename($item)}}][{{ $item->id }}]"--}}
                            {{--                                                    value="false"--}}
                            {{--                                                >--}}
                            {{--                                                <input--}}
                            {{--                                                    class="form-check-input"--}}
                            {{--                                                    type="checkbox"--}}
                            {{--                                                    name="model[{{class_basename($item)}}][{{ $item->id }}]"--}}
                            {{--                                                    value="true"--}}
                            {{--                                                    @isset($menu_map[class_basename($item)][$item->id]) checked @endif--}}
                            {{--                                                >--}}
                            {{--                                                --}}{{--                                        <label class="form-check-label">Checkbox</label>--}}
                            {{--                                            </div>--}}
                            {{--                                        </td>--}}
                            {{--                                        <td>--}}
                            {{--                                            {{ $item->link_text }}--}}
                            {{--                                        </td>--}}
                            {{--                                        <td>--}}
                            {{--                                            <a--}}
                            {{--                                                href="{{ $item->alias }}"--}}
                            {{--                                                target="_blank"--}}
                            {{--                                            >--}}
                            {{--                                                {{ $item->alias }}--}}
                            {{--                                            </a>--}}
                            {{--                                        </td>--}}
                            {{--                                        <td>--}}
                            {{--                                            <span class="badge badge-primary">custom</span>--}}
                            {{--                                        </td>--}}

                            {{--                                    </tr>--}}
                            {{--                                @endforeach--}}
                            {{--                            @endisset--}}
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <button
                        id="add_menu_item"
                        type="button"
                        class="btn btn-xs btn-success float-left"
                        {{--                                            data-url="{{ route('admin.contents.edit', ['block' => $block]) }}"--}}
                        {{--                                            data-block_id="{{ $block->id }}"--}}
                    > @lang('menu.add') </button>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <button type="submit" class="btn btn-sm btn-info"> @lang('system.submit') </button>
                </div>
                <!-- /.card-footer -->
            </div>
        @else
            <div>Значений ещё не создано ...</div>
        @endif
    </form>
@endsection

@section('adminlte_js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('/js/menu.js') }}"></script>
    {{--    <script src="{{ asset('/js/form.js') }}"></script>--}}
@endsection
