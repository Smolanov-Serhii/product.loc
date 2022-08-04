<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="none"/>
    <title>{{ $page->seo->title }}</title>
    <link href="{{ url('/') }}/css/style.css?v={{ time() }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="/img/icons/favicon.png" sizes="32x32">
    <link rel="icon" type="image/svg" href="/img/icons/favicon.svg" sizes="32x32">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="{{ $page->seo->meta_description }}">
    <meta name="Keywords" content="{{ $page->seo->meta_keywords }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta property="og:url"                content="{{ url('/') . "/" . $page->seo->alias }}" />
    <meta property="og:site_name"          content="{{ env('APP_NAME') }}">
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $page->seo->title }}" />
    <meta property="og:description"        content="{{ $page->seo->meta_description }}" />
    <meta property="og:image"              content="{{ url('/') . '/uploads/seo/thumbs/' . $page->seo->thumbnail }}" />
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script src="/js/perfect-scrollbar.common.js?v={{ time() }}" defer></script>
{{--    <script src="/js/recaptcha__ru.js?v={{ time() }}" defer></script>--}}
    <script src="/js/common.min.js?v={{ time() }}" defer></script>
</head>
<script>
    window.onload = function () {
        document.body.classList.add('loaded_hiding');
        window.setTimeout(function () {
            document.body.classList.add('loaded');
            document.body.classList.remove('loaded_hiding');
        }, 500);

    }
</script>