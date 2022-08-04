<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('client.layouts.head')
<body class="page-{{ $page->seo->alias }}">
<div class="preloader">
    <div class="preloader__row">
        <div class="preloader__item"></div>
        <div class="preloader__item"></div>
    </div>
</div>
{{--header section--}}
@if($page->seo->alias == "404")
@else
{{--    @include('client.layouts.header')--}}
@endif
{{--end header section--}}
<main class="main" id="main">
    <article>

    {{--content section--}}

        @if($page->seo->alias == "404")

        @else
{{--            @yield('breadcrumbs')--}}
        @endif
    @yield('content')
    {{--end content section--}}
    </article>
</main>

{{--modal section--}}
{{--@include('client.block_templates.templates.modal')--}}
{{--end modal section--}}

{{--footer section--}}
@if($page->seo->alias == "404")

@else
    @include('client.layouts.footer')
@endif
@section('client_scripts')
    <script>
        $('document').ready(function() {
            $('.form-template-send button').click(function(e) {
                e.preventDefault();
                var data = {};
                $('.form-template-send').find('input').each(function(){
                    var input = $(this);
                    data[input.attr('name')] = input.val();
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: '{{route('client.mail.sendToForm')}}',
                    data: data,
                    success: function (data) {
                        $('.fancybox-container').remove();
                    },
                    error: function (data) {
                        console.log('Error', data);
                    },
                    dataType: 'json'
                })
            });
        });
    </script>
@endsection
@yield('client_scripts')

{{--end footer section--}}
</body>
</html>
