<?php
$contents = $block->mappedByKey();
?>
<section class="unique main-container">
    <div class="unique__container">
        <div class="unique__design">
            <img src="{{ url('/') }}/img/templates/unique/design.svg">
        </div>
        <div class="unique__text">
            <h2 class="unique__title">
                {{ $contents['title']['value'] }}
            </h2>
            <div class="unique__subtitle">
                {!! $contents['subtitle']['value'] !!}
            </div>
            <div class="unique__btn button-stroke">
                <span>{{  $contents['button-name']['value'] }}</span>
            </div>
        </div>
        <div class="unique__image">
            <div class="unique__ring">
                <img src="{{ url('/') }}/img/templates/unique/rings.png">
            </div>
            <img src="{{ '/uploads/contents/' . $contents['image']['value'] }}"
                 alt="{{ $contents['title']['value'] }}">
        </div>
    </div>
</section>