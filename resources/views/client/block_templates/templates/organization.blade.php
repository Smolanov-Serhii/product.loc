<?php
$contents = $block->mappedByKey();
?>
<section class="organization" id="organization">
    <div class="organization__container main-container">
        <div class="organization__img" data-aos="fade-right">
            <img src="{{  url('/') . '/uploads/contents/' . $contents['img']['value'] }}" alt="{{ $contents['title']['value'] }}">
        </div>
        <div class="organization__content" data-aos="fade-left">
            <h2 class="organization__title">
                {{ $contents['title']['value'] }}
            </h2>
            <div class="organization__desc">
                {!! $contents['desc']['value'] !!}
            </div>
            @if($contents['lnk']['value'])
                <div class="organization__button">
                    <a href="{{ url('/') . $contents['lnk']['value'] }}" class="button-bg"><span>Наша методика</span></a>
                </div>
            @endif

        </div>
    </div>
</section>