<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $model->title }}</title>
    <link href="{{ url('/') }}/css/fonts.css?v={{ time() }}" rel="stylesheet">
    <link href="{{ url('/') }}/css/style.css?v={{ time() }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ url('/') }}/img/icons/favicon.png" sizes="32x32">
    <link rel="icon" type="image/svg" href="{{ url('/') }}/img/icons/favicon.svg" sizes="32x32">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="{{ $model->meta_description }}">
    <meta name="Keywords" content="{{ $model->meta_keywords }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta property="og:url"                content="{{ url('/') . "/" . $model->alias }}" />
    <meta property="og:site_name"          content="{{ env('APP_NAME') }}">
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $model->title }}" />
    <meta property="og:description"        content="{{ $model->meta_description }}" />
    <meta property="og:image"              content="{{ url('/') . '/uploads/seo/thumbs/' . $model->thumbnail }}" />
    <script src="{{ url('/') }}/js/common.min.js?v={{ time() }}" defer></script>
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;800&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
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