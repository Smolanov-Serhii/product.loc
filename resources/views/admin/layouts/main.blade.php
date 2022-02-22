<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Title</title>
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/vendor/fontawesome-free/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<div class="dashboard__wrapper">
    <nav class="dashboard__top-nav">

    </nav>
    <aside class="dashboard__nav">
        <div class="dashboard__header">
            <div class="dashboard__logo">
                <img src="/images/logo-px.svg" alt="Educato">
            </div>
            <div class="dashboard__lng">
                <span class="lang-current">Ru</span>
                <ul class="lang-list">
                    <li class="lang-item">
                        <a href="#">Ua</a>
                    </li>
                    <li class="lang-item">
                        <a href="#">IT</a>
                    </li>
                    <li class="lang-item">
                        <a href="#">ES</a>
                    </li>
                    <li class="lang-item">
                        <a href="#">De</a>
                    </li>
                    <li class="lang-item">
                        <a href="#">En</a>
                    </li>
                </ul>
            </div>
        </div>
        <nav class="dashboard__nav-list">
            <ul class="dashboard__nav-items">
                <li class="dashboard__nav-item dashboard__nav-item-active">
                    <a href="{{ route('admin.pages.list') }}"><img class="svg" src="/images/home-icon.svg" alt="Главная">Главная</a>
                </li>
                <li class="dashboard__nav-item">
                    <a href="{{ route('admin.pages.list') }}"><img class="svg" src="/images/pages-icon.svg" alt="Страницы сайта">Страницы сайта</a>
                </li>
                <li class="dashboard__nav-item">
                    <a href=""><img class="svg" src="/images/users-icon.svg" alt="Пользователи">Пользователи</a>
                </li>
                <li class="dashboard__nav-item">
                    <a href=""><img class="svg" src="/images/students-icon.svg" alt="Студенты">Студенты</a>
                </li>
                <li class="dashboard__nav-item">
                    <a href=""><img class="svg" src="/images/teachers-icon.svg" alt="Преподователи">Преподователи</a>
                </li>
                <li class="dashboard__nav-item">
                    <a href=""><img class="svg" src="/images/cources-icon.svg" alt="Курсы">Курсы</a>
                </li>
                <li class="dashboard__nav-item">
                    <a href=""><img class="svg" src="/images/statistics-icon.svg" alt="Статистика">Статистика</a>
                </li>
                <li class="dashboard__nav-item">
                    <a href=""><img class="svg" src="/images/vacancy-icon.svg" alt="Вакансии">Вакансии</a>
                </li>
            </ul>
        </nav>
        <div class="dashboard__time">
{{--            <div class="dashboard__time-img">--}}
{{--                <img src="/images/calendar-icon.svg" alt="календарь">--}}
{{--            </div>--}}
{{--            <div class="dashboard__time-current">--}}
{{--                <div class="date" id="Date">--}}

{{--                </div>--}}
{{--                <ul class="time">--}}
{{--                    <li id="hours"></li>--}}
{{--                    <li id="point">:</li>--}}
{{--                    <li id="min"></li>--}}
{{--                    <li id="point">:</li>--}}
{{--                    <li id="sec"></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
        </div>
    </aside>
    <div class="dashboard__content">
        <div class="dashboard__content-header admin-header">
            <div class="admin-header-main">
                <div class="days-left">
                    5 дней
                </div>
                <div class="money-left">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.6188 6.5H3.75C3.33562 6.5 3 6.16437 3 5.75C3 5.33562 3.33562 5 3.75 5H21.75C22.1644 5 22.5 4.66438 22.5 4.25C22.5 3.00734 21.4927 2 20.25 2H3C1.34297 2 0 3.34297 0 5V20C0 21.657 1.34297 23 3 23H21.6188C22.9322 23 24 21.9908 24 20.75V8.75C24 7.50922 22.9322 6.5 21.6188 6.5ZM19.5 16.25C18.6717 16.25 18 15.5783 18 14.75C18 13.9217 18.6717 13.25 19.5 13.25C20.3283 13.25 21 13.9217 21 14.75C21 15.5783 20.3283 16.25 19.5 16.25Z" fill="#E2E2E2"/>
                    </svg>
                    <span>2 450 грн</span>
                </div>
            </div>
            <div class="admin-header-user">
                <div class="alerts have-alerts"> <!-- have-alerts клас если есть уведомления -->
                    <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 27C13.6557 27 14.9986 25.657 14.9986 24H9.00144C9.00144 25.657 10.3444 27 12 27ZM22.0964 19.9823C21.1908 19.0092 19.4963 17.5453 19.4963 12.75C19.4963 9.10781 16.9425 6.19219 13.4991 5.47688V4.5C13.4991 3.67172 12.8278 3 12 3C11.1722 3 10.501 3.67172 10.501 4.5V5.47688C7.05753 6.19219 4.50378 9.10781 4.50378 12.75C4.50378 17.5453 2.80925 19.0092 1.90363 19.9823C1.62238 20.2847 1.49769 20.6461 1.50003 21C1.50519 21.7687 2.10847 22.5 3.00472 22.5H20.9953C21.8916 22.5 22.4953 21.7687 22.5 21C22.5024 20.6461 22.3777 20.2842 22.0964 19.9823Z" fill="#E2E2E2"/>
                        <circle cx="19.5" cy="6" r="5.25" fill="#E2E2E2" stroke="#F7F8FC" stroke-width="1.5"/>
                    </svg>
                </div>
                <div class="current-user">
                    <span class="brand">Educado</span>
                    <span class="role">Administrator</span>
                </div>
                <div class="user-avatar">
                    <img src="/images/admin-avatar.svg" alt="Administrator">
                </div>
                <div class="user-more">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="dashboard__content-block">
            @yield('content')
        </div>
    </div>
</div>

<script src="/js/jquery-3.5.1.js"></script>
<script src="/js/dashboard.js"></script>
<script src="/vendor/adminlte/dist/js/adminlte.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@yield('dashboard_js')
</body>
</html>
