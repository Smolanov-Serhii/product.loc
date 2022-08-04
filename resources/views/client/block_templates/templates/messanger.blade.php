<?php
$contents = $block->mappedByKey();
?>
<div class="background_7" style="background-image: url({{  url('/') . '/uploads/contents/' . $contents['bg']['value'] ?? ''}})">
    <div id="twelve_block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="heading invert" data-aos-once="true" data-aos="fade-up">
                        {!!  $contents['title']['value'] ?? '' !!}
                    </div>
                    <div class="twelve_block">
                        @if($var['telegram'])
                            <a class="icon" data-aos-once="true" data-aos="fade-up"
                               data-aos-duration="800">
                                <img style="cursor: pointer"
                                     onclick="window.location.replace(&#39;tg://resolve?domain=copylsd1&#39;)"
                                     href="tg://resolve?domain={{ $var['telegram'] ?? ''}}" src="{{ url('/img/header/telegram.png') }}"
                                     alt="telegram">
                            </a>
                        @endif
                        @if($var['viber'])
                            <a class="icon" data-aos-once="true" data-aos="fade-up"
                               data-aos-duration="200">
                                <img style="cursor: pointer"
                                     onclick="window.location.replace(&#39;viber://chat?number=%2B380635351718&#39;)"
                                     href="viber://chat?number=%2B{{ $var['viber'] ?? ''}}"
                                     src="{{ url('/img/header/viber.png') }}" alt="viber">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="twelve_block_img" data-aos-once="true" data-aos="fade-up">
                        <img src="{{  url('/') . '/uploads/contents/' . $contents['img-clear']['value'] ?? ''}}" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
