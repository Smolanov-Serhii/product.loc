<div class="comments-block">
    <div class="comments-block__conatiner">
        @foreach($commentable->comments()->approved()->get() as $comment)
            <div class="comments-block__item" id="wrap_{{ class_basename($comment) }}_{{ $comment->id }}">
                <div class="comments-block__item-img">
                    <img src="{{ url('/public/img/templates/comments/cover.png') }}" alt="Элемент дизайна">
                </div>
                <div class="comments-block__item-content">
                    <div class="comments-block__item-header">
                        <div class="comments-block__item-name">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="comments-block__item-date">
                            {{ $comment->created_at->format('d.m.Y') }}
                        </div>
                    </div>
                    <div class="comments-block__item-comment">
                        {{ $comment->comment }}
                    </div>
                </div>
                <button
                        type="button"
                        id="button_{{ class_basename($comment) }}_{{ $comment->id }}"
                        class="answer-button"
                        data-type="{{ class_basename($comment) }}"
                        data-id="{{ $comment->id }}"
                        data-get_form_url="{{ route('client.comment.create', ['comment' => $comment]) }}"
                >@lang('comment.answer')
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.714 2.5829V0.428458C4.71393 0.191754 4.52199 -7.53134e-05 4.28528 2.21818e-08C4.16389 2.5134e-05 4.04822 0.0515547 3.96695 0.141731L0.109695 4.4275C-0.0313624 4.58459 -0.0370127 4.821 0.0964101 4.98465L3.95369 9.69897C4.10357 9.88216 4.37358 9.90919 4.5568 9.75932C4.65604 9.67813 4.71373 9.55677 4.714 9.42854V7.29296C8.09985 7.4031 10.2128 8.85039 11.1651 11.7073C11.2235 11.8821 11.3871 11.9999 11.5714 12C11.5945 12.0001 11.6176 11.9982 11.6404 11.9944C11.8477 11.9606 12 11.7815 12 11.5714C12 6.52451 8.96173 2.8169 4.714 2.5829ZM4.28541 6.42851C4.0487 6.42851 3.85681 6.62039 3.85681 6.85709V8.22852L0.992576 4.72748L3.85684 1.54531V2.99989C3.85684 3.23659 4.04872 3.42847 4.28543 3.42847C7.65413 3.42847 10.1751 5.7595 10.9183 9.31624C9.5386 7.39795 7.31724 6.42851 4.28541 6.42851Z" fill="#8D8D8D"/>
                    </svg>
                </button>
                @include('client.includes.comments.items', ['commentable' => $comment])
            </div>
        @endforeach
    </div>
</div>
