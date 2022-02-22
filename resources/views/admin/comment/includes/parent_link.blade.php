@switch( class_basename($comment->commentable) )


    @case ('ModuleItem')
        <a
                href="{{ route("client.{$comment->commentable->module->name}.item", ['alias' => $comment->commentable->seo->alias]) }}"
                target="_blank"
        >
            {{ $comment->commentable->addition->title }}
        </a>
    @break

    @case ('Comment')

{{--        <a href="{{ route("client.{$comment->commentable->module->name}.item", ['alias' => $comment->commentable->seo->alias]) }}">2</a>--}}
    @break

@endswitch
