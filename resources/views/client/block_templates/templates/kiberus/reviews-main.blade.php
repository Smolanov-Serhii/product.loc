<?php
$contents = $block->mappedByKey();

$module = \App\Models\Module::where('name', 'feedback')->first();

$items  = $module->items;

$attributes = $module->attrs->mapWithKeys(function ($attr){
    return [$attr->key => $attr->id];
});
?>
<section class="reviews-main">
    <div class="reviews-main_container main-container">
        <div class="reviews-main__untitle section-untitle" data-aos="fade-right" data-aos-delay="100">
            Отзывы
        </div>
        <h2 class="reviews-main__title section-title" data-aos="fade-right" data-aos-delay="300">
            Отзывы о программах обучения
        </h2>
    </div>
    <div class="reviews-main__slider swiper-container" data-aos="fade-up" data-aos-delay="300">
        <div class="swiper-wrapper">
            @foreach($items as $item)
                <div class="reviews-main__slide swiper-slide">
                    <div class="reviews-main__img">
                        <img src="/uploads/module_items/{{ $item->props()->where('module_attribute_id', $attributes['image'])->first()->value }}" alt="{{ $item->props()->where('module_attribute_id', $attributes['fio'])->first()->value }}">
                    </div>
                    <div class="reviews-main__desc">
                        <h3 class="reviews-main__name">
                            {{ $item->props()->where('module_attribute_id', $attributes['fio'])->first()->value }}
                        </h3>
                        <div class="reviews-main__about">
                            {{ $item->props()->where('module_attribute_id', $attributes['direction'])->first()->value }}
                        </div>
                    </div>
                    <div class="reviews-main__rev">
                        {{ $item->props()->where('module_attribute_id', $attributes['content'])->first()->value }}
                    </div>
                    <div class="reviews-main__rate">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.9555 6.42334C16.8436 6.06413 16.5383 5.80982 16.1785 5.77585L11.2711 5.31094L9.33166 0.57278C9.18847 0.224673 8.86266 0 8.50001 0C8.13736 0 7.81142 0.224673 7.66914 0.57278L5.72971 5.31094L0.821541 5.77585C0.461748 5.81049 0.157079 6.06481 0.044498 6.42334C-0.0674346 6.78254 0.0359376 7.17653 0.308052 7.42556L4.01765 10.8199L2.92388 15.8469C2.84385 16.2165 2.98133 16.5987 3.27524 16.8204C3.43321 16.9402 3.61882 17 3.80507 17C3.96512 17 4.1253 16.9556 4.26836 16.8663L8.50001 14.226L12.7309 16.8663C13.0413 17.0598 13.4315 17.0421 13.7248 16.8204C14.0187 16.5987 14.1562 16.2165 14.0761 15.8469L12.9824 10.8199L16.692 7.42556C16.964 7.17653 17.0675 6.78335 16.9555 6.42334Z" fill="#F5A623"/>
                        </svg>
                        <span class="current-rate"><strong>{{ $item->props()->where('module_attribute_id', $attributes['rate'])->first()->value }}</strong>/5</span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>