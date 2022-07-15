<?php
$contents = $block->mappedByKey();
?>
<section class="method">
    <div class="method__container">
        <div class="method__left padding-left">
            <h2 class="method__title section-title">
                {!! $contents['title']['value'] !!}
            </h2>
            {!! $contents['content']['value'] !!}
            <div class="method__excerpt">
                {!! $contents['excerpt']['value'] !!}
            </div>
            <div class="method__desc">
                {!! $contents['desc']['value'] !!}
            </div>
            <div class="method__button">
                <div class="trainings-page__button button-bg js-try">
                    <span>НАЧАЛЬ ПРОБНЫЙ ПЕРИОД</span>
                </div>
            </div>

        </div>
        <div class="method__right padding-right">
            <h2 class="method__right-title">
                {!! $contents['wrapper']['value'] !!}
            </h2>
            <div class="trainings-page__button button-bg js-try">
                <span>ПРИСОЕДИНИТЬСЯ СЕЙЧАС</span>
            </div>
            <img src="{{  url('/') . '/uploads/contents/' . $contents['img']['value'] }}" alt="{{ $contents['title']['value'] }}">
        </div>
    </div>
</section>