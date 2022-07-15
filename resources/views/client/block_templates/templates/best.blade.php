<?php
$contents = $block->mappedByKey();
?>
<section class="best" id="best">
    <div class="best__container  main-container" data-aos="fade-up">
        <h2 class="best__title">
            {{ $contents['title']['value'] }}
        </h2>
        <div class="best__list">
            <div class="best__item best__item-image">
                <img src="{{  url('/') . '/uploads/contents/' . $contents['img']['value'] }}" alt="{{ $contents['title']['value'] }}">
            </div>
            @foreach($block->localeIterations as $iteration)
                @php
                    $properties = $iteration->mappedByKey();
                @endphp
                <div class="best__item">
                    <div class="best__item-title">
                        {{ $properties['name']['value'] }}
                    </div>
                    <div class="best__item-about">
                        {!! $properties['desc']['value'] !!}
                    </div>
                    <div class="best__item-tip">
                        {!!  $properties['exerpt']['value'] !!}
                    </div>
                    <div class="best__item-button button-stroke js-zapisatsia"><span>записаться</span></div>
                </div>
            @endforeach
        </div>
    </div>
</section>