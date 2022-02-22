@foreach($commentable->comments()->approved()->get() as $comment)
    <div
            style="margin:20px"
            id="wrap_{{ class_basename($comment) }}_{{ $comment->id }}">

        user: {{ auth()->user()->name }}<br>
        text: {{ $comment->comment }}<br>
        data: {{ $comment->created_at->format('d.m.Y') }}

        <button
                type="button"
                id="button_{{ class_basename($comment) }}_{{ $comment->id }}"
                class="answer-button"
                data-type="{{ class_basename($comment) }}"
                data-id="{{ $comment->id }}"
                data-get_form_url="{{ route('client.comment.create', ['comment' => $comment]) }}"
        >@lang('comment.answer')</button>
        @include('client.includes.comments.items', ['commentable' => $comment])
    </div>



    {{--    @include('client.includes.comments.item', ['commentable' => $comment])--}}
@endforeach