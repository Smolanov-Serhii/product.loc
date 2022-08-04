<?php
$contents = $block->mappedByKey();
?>

<header class="header_front_page" id="header_front_page"
        style="position: fixed; width: 100%;max-width: 100%;z-index: 9;background: #fff;box-shadow: 0 5px 20px rgb(0 0 0 / 15%);">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="header_front_page">
                    <div class="left">
                        @php
                            $langs = Cache::get('languages');

                        @endphp
{{--                        Language::where('iso', App::getLocale())->first()->id--}}
{{--                        @dd($langs)--}}
                        <a href="{{ local_url('/') }}" class="logo">
                            <img src="{{ url('/img/header/logo.svg') }}" alt="CopyLSD">
                        </a>
                        <div class="text">
                            <div class="header__cities">
                                <div class="header__cities-current">
                                    {{ $var['slogan'] ?? ''}} <span class="underline-city">{{ $contents['city']['value'] }}</span>
                                    <span class="corner"></span>
                                </div>
                                <div class="header__cities-else">
                                    @if($page->seo->alias != 'main')
                                        <a href="{{ local_url('/')}}">{{ $var['kyiv'] ?? ''}}</a>
                                    @endif
                                        @foreach(\App\Models\Menu::where('title', 'city-menu')->first()->getTree() as $item)
                                            <a href="{{local_url(''.$item->slug)}}"> {!! $item->title !!}</a>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="language_header">
                        @widget('localeLinks', ['page' => $page])
                    </div>
                    <div class="right_mobile">
                        <div class="phone_call_mobile">
                            <a href="tel:+380932765369">
                                <img src="{{ url('/img/header/phone.svg') }}" alt="phone">
                            </a>
                        </div>
                        <button class="mobile-show">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <nav class="menu" id="menu_scroll">
                        <ul class="text_menu">
                            @foreach($block->localeIterations as $iteration)
                                @php
                                    $properties = $iteration->mappedByKey();
                                @endphp
{{--                            @if($iteration->lang_id == )--}}
                                <li><a href="{{ local_url('/') . $properties['menu-lnk']['value'] ?? ''}}">{!!  $properties['menu-item']['value'] ?? '' !!}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                    <div class="right">
                        <div class="city">
                            <div class="up">
                                @if($var['telegram'])
                                    <img style="width: 25px;margin-right: 0px;cursor: pointer;"
                                         onclick='window.open("https://t.me/{{ $var['telegram'] ?? '' }}", "_blank")'
                                         href="https://t.me/{{ $var['telegram'] ?? '' }}" src="{{ url('/img/header/telegram-1.png') }}"
                                         alt="telegram">
                                @endif
                                @if($var['viber'])
                                    <img style="width: 25px;margin-right: 0px;cursor: pointer;"
                                         onclick="window.location.replace(&#39;viber://chat?number=%2B{{ $var['viber'] ?? '' }}&#39;)"
                                         href="viber://chat?number=%2B{{ $var['viber'] ?? '' }}"
                                         src="{{ url('/img/header/viber-1.png') }}" alt="viber">
                                @endif
                                <span><a class="header-phone" href="tel:{{ $contents['phone']['value'] ?? '' }}">{{ $contents['phone']['value'] ?? '' }}</a> </span>
                            </div>
                            <button data-src="#popup-call" data-fancybox="" style="display:none">{{ $var['zakaz'] ?? ''}}
                            </button>
                            <div class="right_phone">
                                <div class="city_phone">
                                    <div class="up_phone">
                                        @if($page->seo->alias != 'main')
                                            <a href="{{ local_url('/')}}">{{ $var['kyiv'] ?? ''}}</a>
                                        @endif
                                        @foreach(\App\Models\Menu::where('title', 'city-menu')->first()->getTree() as $item)
                                            <a href="{{local_url(''.$item->slug)}}"> {!! $item->title !!}</a>
                                        @endforeach
                                            @foreach($block->localeIterations as $iteration)
                                                @php
                                                    $properties = $iteration->mappedByKey();
                                                @endphp
                                                <a href="{{ local_url('/') . $properties['menu-lnk']['value'] ?? ''}}">{!!  $properties['menu-item']['value'] ?? '' !!}</a>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>