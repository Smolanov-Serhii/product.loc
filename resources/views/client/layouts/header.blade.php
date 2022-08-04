<header class="header_front_page" id="header_front_page"
     style="position: fixed; width: 100%;max-width: 100%;z-index: 9;background: #fff;box-shadow: 0 5px 20px rgb(0 0 0 / 15%);">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="header_front_page">
                    <div class="left">
                        @php
                            $langs = Cache::get('languages')->count();
                        @endphp
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ url('/img/header/logo.svg') }}" alt="CopyLSD">
                        </a>
                        <div class="text">
                            <div class="header__cities">
                                <div class="header__cities-current">
                                    {{ $var['slogan'] ?? ''}} {{ $page->addition->excerpt }}
                                    <span></span>
                                </div>
                                <div class="header__cities-else">
                                    @foreach($page->childTree as $item)
                                        @if($item->seo->alias != '404')
                                            <a href="{{ url('/') . '/' . app()->getLocale() . '/' . $item->seo->alias }}">{{ $item->addition->excerpt }}</a>
                                        @endif
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
                        <button>
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>

                    <nav class="menu" id="menu_scroll">
                        <ul class="text_menu">
                            <li><a style="margin-left: 0px;" href="https://copylsd.su/#eight_block">Тарифы</a></li>
                            <li> <a onclick="window.location.replace(&#39;calculator.html&#39;)"
                               href="https://copylsd.su/calculator.html">Калькулятор</a></li>
                            <li><a href="https://copylsd.su/#nine_block">Отзывы</a></li>
                            <li><a href="https://copylsd.su/#popup-faq">FAQ</a></li>
                        </ul>
                    </nav>
                    <div class="right">
                        <div class="city">
                            <div class="up">
                                @if($var['telegram'])
                                    <img style="width: 25px;margin-right: 0px;cursor: pointer;"
                                         onclick="window.location.replace(&#39;tg://resolve?domain=copylsd1&#39;)"
                                         href="tg://resolve?domain={{ $var['telegram'] ?? ''}}" src="{{ url('/img/header/telegram-1.png') }}"
                                         alt="telegram">
                                @endif
                                    @if($var['viber'])
                                        <img style="width: 25px;margin-right: 0px;cursor: pointer;"
                                             onclick="window.location.replace(&#39;viber://chat?number=%2B380635351718&#39;)"
                                             href="viber://chat?number=%2B{{ $var['viber'] ?? ''}}"
                                             src="{{ url('/img/header/viber-1.png') }}" alt="viber">
                                    @endif
                                <span><a class="header-phone" href="tel:{{ $var['phone'] ?? ''}}">{{ $var['phone'] ?? ''}}</a> </span>
                            </div>
                            <button data-src="#popup-call" data-fancybox="" style="display:none">{{ $var['zakaz'] ?? ''}}</button>
                            <!-- mobile phone menu-->
                            <!--								<div style="" class="menu_phone">
                                    <div class="text_menu">
                                        <a style="margin-left: 0px;" href="#eight_block">Цены</a>
                                        <a href="#popup-call">Отзывы</a>
                                        <a href="#popup-call">FAQ</a>
                                        <a href="calculator.html">Рассчитать стоимость</a> -->
                            <div class="right_phone">
                                <div class="city_phone">
                                    <div class="up_phone">
                                        <a href="https://copylsd.su/#eight_block">Тарифы</a>
                                        <a onclick="window.location.replace(&#39;calculator.html&#39;)"
                                           href="https://copylsd.su/calculator.html">Калькулятор</a>
                                        <a href="https://copylsd.su/#nine_block">Отзывы</a>
                                        <a href="https://copylsd.su/#popup-faq">FAQ</a>
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