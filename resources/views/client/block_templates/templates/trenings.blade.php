<?php
$contents = $block->mappedByKey();
$counter = 1;
?>
<section class="trenings" id="trenings">
    <div class="trenings__container main-container">
        <div class="trenings__list">
            @foreach($block->localeIterations as $iteration)
                @php
                    $properties = $iteration->mappedByKey();
                @endphp
                <div class="trenings__item" data-aos="fade-up">
                    <img class="design" src="{{ url('/public/img/templates/trenings/fon.png') }}" alt="{{ $properties['name']['value'] }}">
                    <div class="trenings__item-header">
                        <div class="container">
                            <img src="{{  url('/') . '/uploads/contents/' . $properties['icon']['value'] }}" alt="{{ $properties['name']['value'] }}">
                        </div>
                    </div>
                    <div class="trenings__item-content">
                        <h3 class="trenings__item-title">
                            {{ $properties['name']['value'] }}
                        </h3>
                        <div class="trenings__item-content">
                            <p>{!! $properties['content']['value'] !!}</p>
                        </div>
                        <span class="trenings__item-counter">0{{$counter}}</span>
                    </div>
                </div>
                @php
                    $counter++;
                @endphp
            @endforeach
        </div>
    </div>
    <div class="trenings__bottom main-container" style="background-image: url({{ url('/public/img/templates/trenings/niz.jpg') }})">
        <div class="trenings__title" data-aos="fade-up-right">
            {{ $contents['title']['value'] }}
        </div>
        <div class="trenings__desc" data-aos="fade-up-left">
            {!! $contents['desc']['value'] !!}
        </div>
    </div>
</section>