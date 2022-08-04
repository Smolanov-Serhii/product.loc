<footer id="footer_block" style="background-image: url({{ url('/img/footer/background_footer.jpg') }})">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="footer_block">
                    <div class="left">
                        <a href="{{ local_url('/') }}" class="logo">
                            <img src="{{ url('/img/footer/logo.svg') }}" alt="CopyLSD">
                        </a>
                        <div class="text">
                        </div>
                    </div>
                    <div class="right">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="last_footer_block">
                    <div class="left">
                        @foreach($page->childTree as $item)
                            @if($item->seo->alias != '404')
                                <a href="{{ url('/') . '/' . app()->getLocale() . '/' . $item->seo->alias }}" target="_blank">{{ $item->addition->excerpt }}</a>
                                @if($loop->last)
                                    @else
                                    /
                                @endif
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>