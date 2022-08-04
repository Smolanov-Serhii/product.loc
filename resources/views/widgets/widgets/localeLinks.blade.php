<div class="header__language">
    @foreach($links as $iso => $locale)
        @if(!$locale['link'])
            <div class="header__language-current">
                <img src='{{ url("/img/header/{$iso}.svg") }}' alt="{{ $locale['text'] }}">
{{--                <span class="active">{{ $locale['text'] }}</span>--}}
                <span class="active">{{ $iso }}</span>
                <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1.21895L1.26512 0L6 4.5621L10.7349 0L12 1.21895L6 7L0 1.21895Z" fill="#0D0E17"/>
                </svg>
            </div>
        @endif
    @endforeach
    @php
        $langs = Cache::get('languages')->count();
    @endphp
        @if($langs)
            <div class="header__language-else" style="display: none">
                <div class="header__language-else-wrapper">
                    @foreach($links as $iso => $locale)
                        @if($locale['link'])
                            <a href="{{ url($locale['link']) }}"><img src='{{ url("/img/header/{$iso}.svg") }}' alt="{{ $iso }}">{{ $locale['text'] }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
</div>