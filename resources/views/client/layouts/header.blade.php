<header id="header" class="header">
    <div class="header__container main-container">
        <a class="custom-logo-link" rel="home" aria-current="page" href="{{ url('/') }}">
            <img class="custom-logo lazyloaded" src="{{ url('/public/img/header/logo-desktop.svg') }}" alt="">
        </a>
        <nav id="header__nav" class="header__nav">
            <ul class="mobile-menu__list">
                <li class="mobile-menu__item @if($page->seo->alias == 'methods'){{'active'}}@endif"><a href="{{ url('/methods') }}" class="mobile-menu__link">Методика</a></li>
                <li class="mobile-menu__item @if($page->seo->alias == 'trainings'){{'active'}}@endif"><a href="{{ url('/trainings') }}" class="mobile-menu__link">Тренировки</a></li>
                <li class="mobile-menu__item @if($page->seo->alias == 'treners'){{'active'}}@endif"><a href="{{ url('/treners') }}" class="mobile-menu__link">Тренера</a></li>
                <li class="mobile-menu__item @if($page->seo->alias == 'schedule'){{'active'}}@endif"><a href="{{ url('/schedule') }}" class="mobile-menu__link">Расписание</a></li>
                <li class="mobile-menu__item @if($page->seo->alias == 'reviews'){{'active'}}@endif"><a href="{{ url('/reviews') }}" class="mobile-menu__link">Отзывы</a></li>
                <li class="mobile-menu__item @if($page->seo->alias == 'blog'){{'active'}}@endif"><a href="{{ url('/blog') }}" class="mobile-menu__link">Блог</a></li>
                <li class="mobile-menu__item @if($page->seo->alias == 'questions'){{'active'}}@endif"><a href="{{ url('/questions') }}" class="mobile-menu__link">FAQ</a></li>
            </ul>
        </nav>
        <div class="header__personal">
            @if($contacts['telegram'] ?? '')
                <a href="{{ $contacts['telegram'] ?? ''}}" class="social">
                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.02438 7.43107L20.5348 0.0898489C21.4403 -0.229406 22.2312 0.305429 21.9378 1.64169L21.9395 1.64005L18.6175 16.9133C18.3713 17.9961 17.7119 18.2594 16.7895 17.7493L11.7307 14.1107L9.29059 16.4048C9.02079 16.6681 8.79314 16.8902 8.27038 16.8902L8.62957 11.8661L18.0054 3.60001C18.4134 3.24949 17.9143 3.05201 17.3764 3.40089L5.78985 10.5199L0.795043 8.99937C-0.289244 8.66366 -0.312852 7.94122 1.02438 7.43107V7.43107Z" fill="#949597"/>
                    </svg>
                </a>
            @endif
            @guest
                <div class="js-try">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.73405 12.5647C5.00594 10.3805 5.21383 5.99544 7.25389 3.86668C9.4076 1.61872 13.011 1.51894 15.2035 3.72254C16.5063 5.03362 17.0301 6.63019 16.7585 8.45405C16.4924 10.2613 15.4862 11.5862 13.8481 12.5342C14.1807 12.67 14.4274 12.7587 14.6685 12.8696C17.5956 14.2167 19.3141 16.473 19.7604 19.6744C19.8463 20.2925 19.4028 20.7139 18.9455 20.4478C18.7542 20.3369 18.6018 20.0375 18.5657 19.8047C18.1943 17.396 16.9996 15.5361 14.8709 14.3442C10.3473 11.808 4.75648 14.6297 4.06906 19.777C4.02471 20.1124 3.94987 20.4034 3.58122 20.4976C3.1211 20.6168 2.78571 20.262 2.84946 19.7077C3.10169 17.5235 4.07461 15.7162 5.71553 14.2638C6.58034 13.5016 7.5782 12.9666 8.73405 12.5647ZM11.3035 3.35112C8.91976 3.35112 7.00997 5.26091 7.01274 7.63914C7.01829 9.98133 8.93362 11.8994 11.2869 11.9105C13.654 11.9216 15.5971 9.99519 15.5999 7.63359C15.6026 5.25536 13.6901 3.35112 11.3035 3.35112Z" fill="#181818"/>
                    </svg>
                </div>
            @endguest
            @auth

                    <a href="{{ url('/') . '/cabinet' }}" class="header__login">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.73405 12.5647C5.00594 10.3805 5.21383 5.99544 7.25389 3.86668C9.4076 1.61872 13.011 1.51894 15.2035 3.72254C16.5063 5.03362 17.0301 6.63019 16.7585 8.45405C16.4924 10.2613 15.4862 11.5862 13.8481 12.5342C14.1807 12.67 14.4274 12.7587 14.6685 12.8696C17.5956 14.2167 19.3141 16.473 19.7604 19.6744C19.8463 20.2925 19.4028 20.7139 18.9455 20.4478C18.7542 20.3369 18.6018 20.0375 18.5657 19.8047C18.1943 17.396 16.9996 15.5361 14.8709 14.3442C10.3473 11.808 4.75648 14.6297 4.06906 19.777C4.02471 20.1124 3.94987 20.4034 3.58122 20.4976C3.1211 20.6168 2.78571 20.262 2.84946 19.7077C3.10169 17.5235 4.07461 15.7162 5.71553 14.2638C6.58034 13.5016 7.5782 12.9666 8.73405 12.5647ZM11.3035 3.35112C8.91976 3.35112 7.00997 5.26091 7.01274 7.63914C7.01829 9.98133 8.93362 11.8994 11.2869 11.9105C13.654 11.9216 15.5971 9.99519 15.5999 7.63359C15.6026 5.25536 13.6901 3.35112 11.3035 3.35112Z" fill="#181818"/>
                        </svg>
                    </a>

{{--                <a href="{{ route('logout') }}" class="header__login header__buttons-item border-button">--}}
{{--                    Выйти--}}
{{--                </a>--}}
            @endauth
            <div class="header__search js-search">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.61719 0C11.8173 0 15.2344 3.41707 15.2344 7.61719C15.2344 9.29531 14.6885 10.8481 13.7655 12.1082L20 18.3427L18.3427 20L12.1082 13.7655C10.8481 14.6885 9.29531 15.2344 7.61719 15.2344C3.41707 15.2344 0 11.8173 0 7.61719C0 3.41707 3.41707 0 7.61719 0ZM7.61719 14.0625C11.1711 14.0625 14.0625 11.1711 14.0625 7.61719C14.0625 4.06324 11.1711 1.17188 7.61719 1.17188C4.06324 1.17188 1.17188 4.06324 1.17188 7.61719C1.17188 11.1711 4.06324 14.0625 7.61719 14.0625Z" fill="#181818"/>
                </svg>
            </div>
        </div>
        <div class="header__try js-try button-stroke js-try">
            <span>Попробовать бесплатно</span>
        </div>
        <div class="mobile-burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="mobile-menu">
            <nav id="mobile-menu__nav" class="mobile-menu__nav">
                <ul class="mobile-menu__list">
                    <li class="mobile-menu__item @if($page->seo->alias == 'methods'){{'active'}}@endif"><a href="{{ url('/methods') }}" class="mobile-menu__link">Методика</a></li>
                    <li class="mobile-menu__item @if($page->seo->alias == 'trainings'){{'active'}}@endif"><a href="{{ url('/trainings') }}" class="mobile-menu__link">Тренировки</a></li>
                    <li class="mobile-menu__item @if($page->seo->alias == 'treners'){{'active'}}@endif"><a href="{{ url('/treners') }}" class="mobile-menu__link">Тренера</a></li>
                    <li class="mobile-menu__item @if($page->seo->alias == 'schedule'){{'active'}}@endif"><a href="{{ url('/schedule') }}" class="mobile-menu__link">Расписание</a></li>
                    <li class="mobile-menu__item @if($page->seo->alias == 'reviews'){{'active'}}@endif"><a href="{{ url('/reviews') }}" class="mobile-menu__link">Отзывы</a></li>
                    <li class="mobile-menu__item @if($page->seo->alias == 'blog'){{'active'}}@endif"><a href="{{ url('/blog') }}" class="mobile-menu__link">Блог</a></li>
                    <li class="mobile-menu__item @if($page->seo->alias == 'subscriptions'){{'active'}}@endif"><a href="{{ url('/subscriptions') }}" class="mobile-menu__link">Подписки</a></li>
                </ul>
            </nav>
            <div class="wrapper">
                <div class="mobile-menu__try js-try button-stroke js-try">
                    <span>Попробовать бесплатно</span>
                </div>
                <div class="header__callback button-stroke js-callback">
                    <span>обратный звонок</span>
                </div>
            </div>
        </div>
    </div>
</header>
