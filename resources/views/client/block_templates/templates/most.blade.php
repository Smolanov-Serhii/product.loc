<?php
$contents = $block->mappedByKey();
?>
<section class="most">
{{--    <div class="most__design">--}}
{{--        <img src="{{ url('/') }}/img/templates/most/design.svg">--}}
{{--    </div>--}}
    <div class="most__container">
        <div class="most__image">
            <div class="most__ring">
                <img src="{{ url('/') }}/img/templates/most/rings.png">
            </div>
            <img src="{{ '/uploads/contents/' . $contents['image']['value'] }}"
                 alt="{{ $contents['title']['value'] }}">
        </div>
        <div class="most__text">
            <h2 class="most__title section-title">
                {{ $contents['title']['value'] }}
            </h2>
            <div class="most__subtitle">
                @foreach($block->iterations as $iteration)
                    @php
                        $properties = $iteration->mappedByKey();
                    @endphp
                    <div class="most__subtitle-header">
                        {{ $properties['header'] }}
                    </div>
                    <p class="most__subtitle-desc">
                        {{ $properties['subtitle'] }}
                    </p>
                @endforeach
            </div>
            <div class="most__btn button-stroke">
                <span>{{  $contents['button-name']['value'] }}</span>
            </div>
        </div>
    </div>
</section>