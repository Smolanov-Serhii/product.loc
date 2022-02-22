{{--{{dd($content->translations)}}--}}
@foreach($block->contents as $content)
    <div class="col-md-4">
    @foreach($content->translations as $translate)
        <table class="table table-bordered shadow-lg block_content_id_{{ $content->id }}">
            <tbody>
            <tr>
                <td class="p-1">
                    <a
                        href="#"
                        class="btn-xs btn-danger remove-content"
                        data-content_id="{{ $content->id }}"
                        data-toggle="modal"
                        data-target="#confirmDeleteContent"
                    ><i class="fas fa-trash"></i></a>
                    <a
                        href="#"
                        class="btn-xs btn-primary edit-content"
                        data-block_id="{{ $block->id }}"
                        data-url="{{ route('admin.contents.edit', ['content' => $content]) }}"
                        data-toggle="modal"
                        {{--                        data-target="#confirmDelete"--}}
                    ><i class="fas fa-pen"></i></a>
                </td>
                <td class="p-1">
                </td>
            </tr>
            @if($translate->title)
                <tr>
                    <td class="p-1"><small> @lang('block_contents.title') </small></td>
                    <td class="p-1">{{ $translate->title }}</td>
    {{--                <td class=p-1></td>--}}
                </tr>
            @endif

            @if($translate->sub_title)
                <tr>
                    <td class="p-1"><small> @lang('block_contents.sub_title') </small></td>
                    <td class="p-1">{{ \Illuminate\Support\Str::limit($translate->sub_title, 25) }}</td>
    {{--                <td class=p-1></td>--}}
                </tr>
            @endif

            @if($translate->content)
                <tr>
                    <td class="p-1"> <small> @lang('block_contents.content')  </small></td>
                    <td class="p-1">{!!  \Illuminate\Support\Str::limit($translate->content, 25) !!} </td>
    {{--                <td class=p-1></td>--}}
                </tr>
            @endif

            @if($translate->link)
                <tr>
{{--                    <a href="{{ $translate->link }}">{{ $translate->link }}</a>--}}
                    <td class="p-1"><small> @lang('block_contents.link') </small></td>
                    <td class="p-1">{!! $translate->link !!}</td>
    {{--                <td class=p-1></td>--}}
                </tr>
            @endif
            @if($translate->image_path)
                <tr>
                    <td class="p-1"><small> @lang('block_contents.image') </small></td>
                    <td class="p-1"><img src="{{ '/uploads/contents/thumbs/' . $translate->image_path }}" class="img-fluid"></td>
    {{--                <td class=p-1></td>--}}
                </tr>
            @endif
            @if($translate->options)
                @foreach($translate->options as $option)
                    <tr>
                        <td class="p-1"><small> {{ __('system.' . $input_types[$option->type]) . "[$option->id]" }}</small></td>
                        <td class="p-1">
                            @switch($option->type)
                                @case(0)
                                    <img src="{{ '/uploads/content_options/thumbs/' . $option->value }}" class="img-fluid" alt="">
                                    @break

                                @case(1)
                                    {{ $option->value }}
                                    @break

                                @case(2)
                                    {!!  \Illuminate\Support\Str::limit($option->value, 25) !!}
                                    @break

                            @endswitch
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    @endforeach
    </div>
@endforeach
