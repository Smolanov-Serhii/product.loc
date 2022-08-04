<?php
$contents = $block->mappedByKey();
?>
<div id="two_block">
    <div class="container-fluid">
        <div class="heading center" data-aos-once="true"
             data-aos="fade-up">
            <h2>{{ $contents['block-title']['value'] ?? '' }}</h2>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="two_block">
                    @foreach($block->localeIterations as $iteration)
                        @php
                            $properties = $iteration->mappedByKey();
                        @endphp
                        <div class="item" data-aos-once="true" data-aos="fade-in"
                             data-aos-duration="200">
                            <div class="img autoheight" style="height: 200px;">
                                <img src="{{  url('/') . '/uploads/contents/' . $properties['icon']['value'] ?? ''}}" alt="{{ $properties['title']['value'] ?? ''}}">
                            </div>
                            <h3>{{ $properties['title']['value'] ?? ''}}</h3>
                            <p>
                                {{ $properties['desc']['value'] ?? ''}}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .prokrutka {
        height: 500px; /* высота нашего блока */
        overflow-x: scroll; /* прокрутка по горизонтали */
        border: 3px solid #2A6BD2; /* размер и цвет границы блока */
    }
</style>