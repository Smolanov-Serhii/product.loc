<div class="header__language">
    @foreach($links as $iso => $locale)
        @if(!$locale['link'])
            <div class="header__language-current">
                @php
                    $langs = Cache::get('languages')->count();
                @endphp
                @if($langs)
                            @foreach($links as $iso => $locale)
                                @if($locale['link'])
                                    <a rel="alternate" hreflang="{{$iso}}" href="{{ url($locale['link']) }}"><img src='{{ url("/img/header/{$iso}.svg") }}' alt="{{ $locale['text'] }}"></a>
                                @endif
                            @endforeach
                @endif
            </div>
        @endif
    @endforeach

</div>
