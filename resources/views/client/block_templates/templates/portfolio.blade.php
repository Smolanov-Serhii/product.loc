<?php
$contents = $block->mappedByKey();
?>
<div id="three_block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="heading center" data-aos-once="true" data-aos="fade-up">
                    {!!  $contents['title']['value'] ?? '' !!}
                </div>
                <div class="three_block">
                    <div class="arrows">
                        <button class="three_block_slider_prev"></button>
                        <button class="three_block_slider_next"></button>
                    </div>
                    <div class="three_block_slider" data-aos-once="true" data-aos="fade-in">
                        @foreach($block->localeIterations as $iteration)
                            @php
                                $properties = $iteration->mappedByKey();
                            @endphp
                            <div>
                                <div style="width: 100%; display: inline-block;">
                                    <div class="prokrutka">
                                        <div class="item">
                                            <div class="img" href="{{  url('/') . '/uploads/contents/' . $properties['img']['value'] ?? ''}}"
                                                 data-fancybox="slider1" data-caption="">
                                                @include('client.includes.image', ['image' => $properties['img']])
{{--                                                <img src="{{  url('/') . '/uploads/contents/' . $properties['img']['value'] ?? ''}}" alt="{{ $properties['title']['value'] ?? ''}}">--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <ul class="three_block_slider_dots" style="display: flex;" role="tablist">

                </ul>
            </div>
        </div>
        <button class="btn" data-src="#popup-podbor" data-fancybox="">
            <span>Заказать сайт</span>
        </button>
    </div>
</div>
</div>
</div>