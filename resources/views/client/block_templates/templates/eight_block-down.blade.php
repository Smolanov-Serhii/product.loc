<?php
$contents = $block->mappedByKey();
?>

<div id="eight_block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="heading center" data-aos-once="true"
                     data-aos="fade-up">
                    <h2>{{  $contents['title']['value'] ?? '' }}</h2>
                </div>
                <div class="eight_block_down">
                    @foreach($block->localeIterations as $iteration)
                        @php
                            $properties = $iteration->mappedByKey();
                        @endphp
                        <div class="item" data-aos-once="true" data-aos="fade-in">
                            <div class="up">
                                <div class="img">
                                    <img src="{{  url('/') . '/uploads/contents/' . $properties['icon']['value'] ?? ''}}" alt="{{ $properties['title']['value'] ?? ''}}">
                                </div>
                                <p><strong>{{ $properties['title']['value'] ?? ''}}</strong><br>
                                    {{  $properties['content']['value'] ?? '' }}
                                </p>
                            </div>
                            <div class="down">
                                <span>{{ $properties['price']['value'] ?? ''}}</span>
                                <button class="btn" data-src="#popup-zakaz" data-fancybox=""><span>
                                    Заказать											</span></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
