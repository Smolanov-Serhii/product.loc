<!DOCTYPE html>
<html lang="en">
@include('client.layouts.head')
<body class="page-{{ $page->seo->alias }}">
<div class="preloader">
    <div class="preloader__row">
        <div class="preloader__item"></div>
        <div class="preloader__item"></div>
    </div>
</div>

{{--header section--}}
@if($page->seo->alias == "user-login" || $page->seo->alias == "user-register")

@else
    @include('client.layouts.header')
@endif
{{--end header section--}}

<main class="main" id="main">
    <article>
    {{--content section--}}
        @if($page->seo->alias == "user-login" || $page->seo->alias == "user-register")

        @else
            @yield('breadcrumbs')
        @endif
    @yield('content')
    {{--end content section--}}
    </article>
</main>

{{--modal section--}}
{{--@include('client.block_templates.templates.modal')--}}
{{--end modal section--}}

{{--footer section--}}
@if($page->seo->alias == "user-login" || $page->seo->alias == "user-register")

@else
    @include('client.layouts.footer')
    <div class="body-fade" style="display: none">
        @include('client.layouts.login-popup')
        @include('client.layouts.search-popup')
    </div>

@endif

@yield('client_scripts')

{{--end footer section--}}
</body>
</html>
