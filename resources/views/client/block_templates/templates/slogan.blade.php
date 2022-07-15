<?php
$contents = $block->mappedByKey();
?>
<section class="text-block" id="text-block">
    <div class="text-block__design">
        <img src="{{ url('/public/img/templates/slogan/perf.svg') }}" alt="Элемент дизайна">
    </div>
    <div class="text-block__header main-container">
        <h2 class="text-block__title" data-aos="fade-right">
            {!!  $contents['title']['value']  !!}
        </h2>
        <div class="text-block__desc" data-aos="fade-left">
            <p>{{ $contents['content']['value'] }}</p>
            <div class="text-block__buttons">
                <!--                    <a href="#" class="button-bg"><span>Наша методика</span></a>-->
                <div class="downloads">
                    <a href="#" class="isDisabled">
                        <img src="{{ url('/public/img/templates/slogan/gp.jpg') }}" alt="Google Play Market">
                    </a>
                    <a href="#" class="isDisabled" >
                        <img src="{{ url('/public/img/templates/slogan/as.jpg') }}" alt="AppStore">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-block__img main-container" data-aos="fade-up">
        <img src="{{ url('/public/img/templates/slogan/mask-group.png') }}" alt="{{ $contents['title']['value'] }}">
    </div>
</section>