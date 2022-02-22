<form
        action="{{ route('client.comment.store') }}"
        method="post"
        id="{{ class_basename($commentable) }}_{{ $commentable->id }}"
        class="comment-form">
    @csrf
    <input type="hidden" name="commentable_type" value="{{ get_class($commentable) }}">
    <input type="hidden" name="commentable_id"  value="{{ $commentable->id }}">
    <label class="error"></label>
    <textarea name="comment" id="" rows="10" placeholder="@lang('comment.leave_comment')..."></textarea>
    <button type="submit">@lang('system.send')</button>
</form>