<?php
$counter = 0;
$contents = $block->mappedByKey();
?>
<section class="main-banner" data-aos="zoom-in">
    <div class="main-banner__play">
        <svg width="156" height="156" viewBox="0 0 156 156" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="78" cy="78" r="60.5" stroke="#F6E04F" stroke-width="3"/>
            <circle cx="78" cy="78" r="77.5" stroke="#F6E04F"/>
            <path d="M55.4951 78.1441C55.4951 69.4601 55.4668 60.7761 55.4951 52.0921C55.514 45.9878 58.8402 44.0318 64.0941 47.0556C79.2321 55.7585 94.3511 64.4803 109.47 73.221C114.648 76.2165 114.677 80.2892 109.536 83.2657C94.3322 92.0537 79.1187 100.832 63.8957 109.582C58.9725 112.417 55.5329 110.452 55.5046 104.801C55.4668 95.909 55.4951 87.0266 55.4951 78.1441Z" fill="#F6E04F"/>
        </svg>
    </div>
    <div class="main-banner__design">
        <img src="{{ url('/public/img/templates/banner/perf.png') }}" alt="Элемент дизайна">
    </div>
    <div class="main-banner__container padding-left swiper-container">
        <div class="main-banner__swiper swiper-wrapper">
            @foreach($block->localeIterations as $iteration)
                @php
                    $properties = $iteration->mappedByKey();

                @endphp

                <div class="main-banner__slide swiper-slide">
                    <div class="main-banner__left">
                        <div class="vert-img">
                            <img src="{{  url('/') . '/uploads/contents/' . $properties['vertimg']['value'] }}">
                        </div>
                        <div class="untitle">
                            {{ $properties['untitle']['value'] }}
                        </div>
                        <div class="title">
                            {!!   $properties['title']['value'] !!}
                        </div>
                        <div class="undertitle">
                            {!!   $properties['subtitle']['value'] !!}
                        </div>
                    </div>
                    <div class="main-banner__right">
                        <div class="left-img">
                            <img src="{{  url('/') . '/uploads/contents/' . $properties['bigimg']['value'] }}" alt="{{ $properties['title']['value'] }}">
                            <span class="img-text">{!! $properties['span']['value'] !!}</span>
                        </div>
                        <div class="right-img">
                            <img src="{{  url('/') . '/uploads/contents/' . $properties['smallimg']['value'] }}">
                        </div>
                    </div>
                </div>
                    @php
                        $counter++;
                    @endphp

            @endforeach
        </div>
        <div class="main-banner__controls">
                <span class="start">
                    01
                </span>
            <div class="pagination">

            </div>
            <span class="last">

                @if($counter < 10)
                    0{{$counter}}
                @else
                    {{$counter}}
                @endif
            </span>
        </div>
    </div>
</section>