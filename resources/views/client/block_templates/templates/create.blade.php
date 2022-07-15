<?php
$contents = $block->mappedByKey();
?>
<section class="create" id="create">
    <div class="create__container padding-right">
        <div class="create__content">
            <h2 class="create__title padding-left" data-aos="fade-up-right">
                {{ $contents['title']['value'] }}
            </h2>
            <div class="create__desc padding-left" data-aos="fade-up-right">
                {{ $contents['desc']['value'] }}
            </div>
            <div class="create__look padding-left" data-aos="fade-up-right">
                {{ $contents['anchor']['value'] }}
            </div>
            <div class="create__why padding-left" data-aos="fade-up-right">
                {{ $contents['anchor2']['value'] }}
            </div>
        </div>
        <div class="create__img" data-aos="fade-up-left">
            <img src="{{  url('/') . '/uploads/contents/' . $contents['img']['value'] }}" alt="{{ $contents['title']['value'] }}">
        </div>
    </div>
</section>