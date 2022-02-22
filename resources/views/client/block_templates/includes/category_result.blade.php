{{--@dd($items)--}}
<div class="category__result" id="category_result">
    @foreach($items as $item)
        @php
            /**
             * @var $item
             */
                $properties = $item->props->mapWithKeys(function ($prop) {
                                return [$prop->type->key => $prop->value];
                                });
        @endphp
        <div class="category__result-item">
            <a
{{--                    href="{{ route('client.courses.item', ['alias' => $item->seo->alias]) }}"--}}
               class="category__result-img">
                <img src="{{ url('/uploads/module_items') }}/{{$properties['item-thumbnail']}}"
                     alt="{{  $properties['courcename'] }}">
            </a>
            <div class="category__result-content">
                <h3 class="category__result-title">
                    <a
{{--                            href="{{ route('client.courses.item', ['alias' => $item->seo->alias]) }}"--}}
                    >{{  $properties['courcename'] }}</a>
                </h3>
                <p class="category__result-exerpt">
                    {{  $properties['itemexerpt'] }}
                </p>
                <ul class="category__result-params">
                    <li><strong>Направление: </strong>Администратор сети</li>
                    <li><strong>Степень: </strong>магистр</li>
                    <li><strong>Сертификация: </strong>Cisco</li>
                    <li><strong>Зарплата: </strong>от 2000у.е.</li>
                </ul>
                <a
{{--                        href="{{ route('client.courses.item', ['alias' => $item->seo->alias]) }}"--}}
                   class="category__result-lnk">Подробнее...</a>
            </div>
        </div>
    @endforeach

    <div class="pagination" style="margin-right: 40px">
        @if(!$items->onFirstPage())
            <a href="{{ $items->url(1) }}">Начало</a>
        @endif
        <ul class="pagination__wrapper">
            @foreach(range(1, $items->lastPage()) as $page_num)
                <li>
                    @if($items->currentPage() == $page_num)
                        <a class="current">{{ $page_num }}</a>
                    @else
                        <a class="pagination__link" href="{{ $items->url($page_num) }}">{{ $page_num }}</a>
                    @endif
                </li>
            @endforeach
            {{--            <li><a href="#">2</a></li>--}}
            {{--            <li><a href="#">3</a></li>--}}
            {{--            <li><span>...</span></li>--}}
            {{--            <li><a href="#">25</a></li>--}}
        </ul>
        <a href="{{ $items->url($items->lastPage()) }}">Конец</a>
    </div>
</div>