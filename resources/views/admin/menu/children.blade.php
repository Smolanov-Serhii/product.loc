@if(isset($item->children))
    @foreach($item->children as $m)
        @foreach($m as $in=>$data)
            <li data-id="{{$data->id}}" class="menu-item"> <span class="menu-item-bar"><i class="fa fa-arrows"></i> @if(empty($data->name)) {{$data->title}} @else {{$data->name}} @endif <a href="#collapse{{$data->id}}" class="pull-right" data-toggle="collapse">+</a></span>
                <div class="collapse" id="collapse{{$data->id}}">
                    <div class="input-box">
                        <form method="post" action="{{url('update-menuitem')}}/{{$data->id}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Link Name</label>
                                <input type="text" name="name" value="@if(empty($data->name)) {{$data->title}} @else {{$data->name}} @endif" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Class</label>
                                <input type="text" name="class" value="@if(!is_null($data->class)) {{$data->class}} @endif" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Img</label>
                                @if(!is_null($item->img))
                                    <img width="100" src="{{url('/uploads/menu_items/'.$data->img)}}" alt="">
                                @endif
                                <input type="file" name="img" value="" class="form-control">
                            </div>
                            @if($data->type == 'custom')
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" name="slug" value="{{$data->slug}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="target" value="_blank" @if($data->target == '_blank') checked @endif> Open in a new tab
                                </div>
                            @endif
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary">Save</button>
                                <a href="{{url('/admin/menu/delete-menuitem')}}/{{$data->id}}/{{$key}}/{{$in}}" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </form>
                    </div>
                </div>
                <ul>
                    @if(isset($data->children))
                        @include('admin.menu.children', ['item'=>$data, 'qwe'=>true])
                    @endif
                </ul>
            </li>
        @endforeach
    @endforeach
@endif