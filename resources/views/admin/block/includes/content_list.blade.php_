@foreach($content->translations as $translate)
    <table class="table table-bordered">
        <tbody>
        @if($translate->title)
            <tr>
                <td><small> @lang('block_contents.title') </small></td>
                <td>{{ $translate->title }}</td>
{{--                <td></td>--}}
            </tr>
        @endif

        @if($translate->sub_title)
            <tr>
                <td><small> @lang('block_contents.sub_title') </small></td>
                <td>{{ $translate->sub_title }}</td>
{{--                <td></td>--}}
            </tr>
        @endif

        @if($translate->content)
            <tr>
                <td> <small> @lang('block_contents.content')  </small></td>
                <td> {{ $translate->content }} </td>
{{--                <td></td>--}}
            </tr>
        @endif

        @if($translate->link)
            <tr>
                <td><small> @lang('block_contents.link') </small></td>
                <td><a href="{{ $translate->link }}">{{ $translate->link }}</a></td>
{{--                <td></td>--}}
            </tr>
        @endif
        @if($translate->img_path)
            <tr>
                <td><small> @lang('block_contents.image') </small></td>
                <td><a href="{{ $translate->img_path }}">{{ $translate->img_path }}</a></td>
{{--                <td></td>--}}
            </tr>
        @endif
        @if($translate->options)
            @foreach($translate->options as $option)
                <tr>
                    <td><small> {{ __('system.' . $flipedTypes[$option->type]) . "[$option->id]" }}</small></td>
                    <td>{{ $option->value }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endforeach


