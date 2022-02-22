<!DOCTYPE html>
<html lang="en">
@include('client.layouts.head')
<body class="page-{{ $model->alias }}">
<div class="preloader">
    <div class="preloader__row">
        <div class="preloader__item"></div>
        <div class="preloader__item"></div>
    </div>
</div>

{{--header section--}}
@if($model->alias == "user-login" || $model->alias == "user-register")

@else
    @include('client.layouts.header')
@endif
{{--end header section--}}

<main class="main" id="main">
    <article>
    {{--content section--}}
        @if($model->alias == "user-login" || $model->alias == "user-register" || $model->alias == "courses" || $model->alias == "blog" || $model->alias == "knowledge"  || $model->alias == "career")

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
@if($model->alias == "user-login" || $model->alias == "user-register")

@else
    @include('client.layouts.footer')
@endif

@yield('client_scripts')

{{--end footer section--}}
</body>
</html>
