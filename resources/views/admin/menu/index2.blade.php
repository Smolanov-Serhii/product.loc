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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container-fluid">
        <div class="content info-box">
            @if(count($menus) > 0)
                Выбрать меню для редактирования:
                <form action="{{url('admin/menu/manage-menus')}}" class="form-inline">
                    <select name="id">
                        @foreach($menus as $menu)
                            @if($desiredMenu != '')
                                <option value="{{$menu->id}}" @if($menu->id == $desiredMenu->id) selected @endif>{{$menu->title}}</option>
                            @else
                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                            @endif
                        @endforeach
                    </select>
                    <button class="btn btn-sm btn-default btn-menu-select">Выбрать</button>
                </form>
                или
            @endif
            <a href="{{url('admin/menu/manage-menus?id=new')}}"> Создать новое меню</a>.
        </div>

        <div class="row" id="main-row">
            <div class="col-sm-3 cat-form @if(count($menus) == 0) disabled @endif">
                <h3 class="menu-all-items"><span>Добавить элемент</span></h3>
                <div class="panel-group" id="menu-items">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#categories-list" data-toggle="collapse" data-parent="#menu-items">Страницы<span class="caret pull-right"></span></a>
                        </div>
                        <div class="panel-collapse collapse in" id="categories-list">
                            <div class="panel-body">
                                <div class="item-list-body">
                                    @foreach($categories as $cat)
                                        <p><input type="checkbox" name="select-category[]" value="{{$cat->id}}"> {{$cat->title}}</p>
                                    @endforeach
                                </div>
                                <div class="item-list-footer">
                                    <label class="btn btn-sm btn-default"><input type="checkbox" id="select-all-categories">Выбрать все</label>
                                    <button type="button" class="pull-right btn btn-default btn-sm" id="add-categories">Добавить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($modules as $key => $module)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="#posts{{$key}}-list" data-toggle="collapse" data-parent="#menu-items">{{$module->name}}<span class="caret pull-right"></span></a>
                            </div>
                            <div class="panel-collapse collapse" id="posts{{$key}}-list">
                                <div class="panel-body">
                                    <div class="item-list-body">
                                        @foreach($module->items as $item)
                                            <p><input type="checkbox" name="select-post[]" value="{{$item->id}}"> {{$item->seo->title}}</p>
                                        @endforeach
                                    </div>
                                    <div class="item-list-footer">
                                        <label class="btn btn-sm btn-default"><input type="checkbox" id="select-all-posts">Выбрать все</label>
                                        <button type="button" class="pull-right btn btn-default btn-sm add-posts">Добавить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="#custom-links" data-toggle="collapse" data-parent="#menu-items">Ссылка<span class="caret pull-right"></span></a>
                        </div>
                        <div class="panel-collapse collapse" id="custom-links">
                            <div class="panel-body">
                                <div class="item-list-body">
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="url" id="url" class="form-control" placeholder="https://">
                                    </div>
                                    <div class="form-group">
                                        <label>Текст ссылки</label>
                                        <input type="text" id="linktext" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="item-list-footer">
                                    <button type="button" class="pull-right btn btn-default btn-sm" id="add-custom-link">Добавить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 cat-view">
                <h3  class="menu-all-items"><span>Структура меню</span></h3>
                @if($desiredMenu == '')
                    <h4>Создать новое меню</h4>
                    <form method="post" action="{{url('admin/menu/create-menu')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Название</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-sm btn-primary">Создать меню</button>
                            </div>
                        </div>
                    </form>
                @else
                    <div id="menu-content">
                        <div id="result"></div>
                        <div style="min-height: 240px;">
{{--                            <p>Выберите страницу, модуль или кастомную ссылку в меню.</p>--}}
                            @if($desiredMenu != '')
                                <ul class="menu ui-sortable" id="menuitems">
                                    @if(!empty($menuitems))
                                        @foreach($menuitems as $key=>$item)
                                            <li data-id="{{$item->id}}"><span class="menu-item-bar"><i class="fa fa-arrows"></i> @if(empty($item->name)) {{$item->title}} @else {{$item->name}} @endif <a href="#collapse{{$item->id}}" class="pull-right" data-toggle="collapse">+</a></span>
                                                <div class="collapse" id="collapse{{$item->id}}">
                                                    <div class="input-box">
                                                        <form method="post" action="{{url('/admin/menu/update-menuitem')}}/{{$item->id}}" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                                <label>Link Name</label>
                                                                <input type="text" name="name" value="@if(empty($item->name)) {{$item->title}} @else {{$item->name}} @endif" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Class</label>
                                                                <input type="text" name="class" value="@if(!is_null($item->class)) {{$item->class}} @endif" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Img</label>
                                                                @if(!is_null($item->img))
                                                                    <img width="100" src="{{url('/uploads/menu_items/'.$item->img)}}" alt="">
                                                                @endif
                                                                <input type="file" name="img" value="" class="form-control">
                                                            </div>
                                                            @if($item->type == 'custom')
                                                                <div class="form-group">
                                                                    <label>URL</label>
                                                                    <input type="text" name="slug" value="{{$item->slug}}" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="target" value="_blank" @if($item->target == '_blank') checked @endif> Open in a new tab
                                                                </div>
                                                            @endif
                                                            <div class="form-group">
                                                                <button class="btn btn-sm btn-primary">Save</button>
                                                                <a href="{{url('/admin/menu/delete-menuitem')}}/{{$item->id}}/{{$key}}" class="btn btn-sm btn-danger">Delete</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <ul>
                                                    @if(isset($item->children))
                                                        @include('admin.menu.children', ['item'=>$item])
                                                    @endif
                                                </ul>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            @endif
                            @if($desiredMenu != '')
                                <div class="text-right menu-buttons">
                                    <button class="btn btn-sm btn-primary" id="saveMenu">Сохранить меню</button>
                                    <p class=""><a class="delete-menu btn btn-sm" href="{{url('/admin/menu/delete-menu')}}/{{$desiredMenu->id}}">Удалить меню</a></p>
                                </div>

                            @endif
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
    <div id="serialize_output">@if($desiredMenu){{$desiredMenu->content}}@endif</div>
    <style>
        .item-list,.info-box{background: #fff;padding: 10px;}
        .item-list-body{max-height: 300px;overflow-y: scroll;}
        .panel-body p{margin-bottom: 5px;}
        .info-box{margin-bottom: 15px;}
        .item-list-footer{padding-top: 10px;}
        .panel-heading a{display: block;}
        .form-inline{display: inline;}
        .form-inline select{padding: 4px 10px;}
        .btn-menu-select{padding: 4px 10px}
        .disabled{pointer-events: none; opacity: 0.7;}
        .menu-item-bar{background: #eee;padding: 5px 10px;border:1px solid #d7d7d7;margin-bottom: 5px; width: 75%; cursor: move;display: block;}
        #serialize_output{display: block;opacity: 0}
        body.dragging, body.dragging * {cursor: move !important;}
        .dragged {position: absolute;z-index: 1;}
        ol.example li.placeholder {position: relative;}
        ol.example li.placeholder:before {position: absolute;}
        #menuitem{list-style: none;}
        #menuitem ul{list-style: none;}
        .input-box{width:75%;background:#fff;padding: 10px;box-sizing: border-box;margin-bottom: 5px;}
        .input-box .form-control{width: 50%}
    </style>
@stop

@section('adminlte_js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ url('js/sortable.js')}}"></script>
    <script src="{{ asset('/js/menu.js') }}"></script>
    @if($desiredMenu)
        <script>
            $('#add-categories').click(function(){
                var menuid = <?=$desiredMenu->id?>;
                var n = $('input[name="select-category[]"]:checked').length;
                var array = $('input[name="select-category[]"]:checked');
                var ids = [];
                for(i=0;i<n;i++){
                    ids[i] =  array.eq(i).val();
                }
                if(ids.length == 0){
                    return false;
                }
                $.ajax({
                    type:"get",
                    data: {menuid:menuid,ids:ids},
                    url: "{{url('/admin/menu/add-categories-to-menu')}}",
                    success:function(res){
                        location.reload();
                    }
                })
            })
            $('.add-posts').click(function(){
                var menuid = <?=$desiredMenu->id?>;
                var n = $('input[name="select-post[]"]:checked').length;
                var array = $('input[name="select-post[]"]:checked');
                var ids = [];
                for(i=0;i<n;i++){
                    ids[i] =  array.eq(i).val();
                }
                if(ids.length == 0){
                    return false;
                }
                $.ajax({
                    type:"get",
                    data: {menuid:menuid,ids:ids},
                    url: "{{url('admin/menu/add-post-to-menu')}}",
                    success:function(res){
                        location.reload();
                    }
                })
            })
            $("#add-custom-link").click(function(){
                var menuid = <?=$desiredMenu->id?>;
                var url = $('#url').val();
                var link = $('#linktext').val();
                if(url.length > 0 && link.length > 0){
                    $.ajax({
                        type:"get",
                        data: {menuid:menuid,url:url,link:link},
                        url: "{{url('admin/menu/add-custom-link')}}",
                        success:function(res){
                            location.reload();
                        }
                    })
                }
            })
        </script>
        <script>
            var group = $("#menuitems").sortable({
                group: 'serialization',
                onDrop: function ($item, container, _super) {
                    var data = group.sortable("serialize").get();
                    var jsonString = JSON.stringify(data, null, ' ');
                    $('#serialize_output').text(jsonString);
                    _super($item, container);
                }
            });
        </script>
        <script>
            $('#saveMenu').click(function(){
                var menuid = <?=$desiredMenu->id?>;
                var newText = $("#serialize_output").text();
                var data = JSON.parse($("#serialize_output").text());
                $.ajax({
                    type:"get",
                    data: {menuid:menuid,data:data},
                    url: "{{url('admin/menu/update-menu')}}",
                    success:function(res){
                        window.location.reload();
                    }
                })
            })
        </script>
        <script>
            $('#select-all-categories').click(function(event) {
                if(this.checked) {
                    $('#categories-list :checkbox').each(function() {
                        this.checked = true;
                    });
                }else{
                    $('#categories-list :checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });
        </script>
        <script>
            $('#select-all-posts').click(function(event) {
                if(this.checked) {
                    $('#posts-list :checkbox').each(function() {
                        this.checked = true;
                    });
                }else{
                    $('#posts-list :checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });
        </script>
    @endif
    {{--    <script src="{{ asset('/js/form.js') }}"></script>--}}
@endsection
