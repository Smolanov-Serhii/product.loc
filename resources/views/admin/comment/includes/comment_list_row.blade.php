<tr>
    <td>
        {{ $comment->commentator->name }}
    </td>
    <td>
        @foreach(range(0, $level) as $space)
            ----
        @endforeach
        @include('admin.comment.includes.parent_link')
    </td>
    <td>
        {{ $comment->comment }}
    </td>
    <td>
        {{ $comment->created_at }}
    </td>
    <td>
        <div class="custom-control custom-switch"
             style="display: inline-block; width: 30px; margin: 10px; position: absolute">
            <input
                    name="enabled"
                    type="checkbox"
                    class="custom-control-input moderate-comment-switcher"
                    data-comment_id="{{ $comment->id }}"
                    id="moderate_comment_{{ $comment->id }}"
                    data-url="{{ route('admin.comment.moderate', ['comment' => $comment]) }}"
                    @if($comment->is_approved) checked="" @endif
            >
            <label class="custom-control-label" for="moderate_comment_{{ $comment->id }}"></label>
        </div>
    </td>
    <td>
        <div class="btn-group">
            <form method="POST"
                  action="{{ route('admin.comment.destroy', [ 'comment' => $comment ]) }}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-icon"
                        onclick="return confirm('Вы уверены?')">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </td>
</tr>

@foreach($comment->comments as $sub_comment)
    @include('admin.comment.includes.comment_list_row', ['comment' => $sub_comment, 'level' => $level+1])
@endforeach