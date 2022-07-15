<?php
$contents = $block->mappedByKey();
?>
<section class="principles">
    <div class="principles__container main-container">
        <div class="principles__image">
            <img src="{{  url('/') . '/uploads/contents/' . $contents['img']['value'] }}" alt="{{ $contents['title']['value'] }}">
        </div>
        <div class="principles__content">
            <h2 class="principles__title section-title">
                {!! $contents['title']['value'] !!}
            </h2>
            <div class="principles__list">
                @foreach($block->localeIterations as $iteration)
                    @php
                        $properties = $iteration->mappedByKey();
                    @endphp
                    <div class="principles__item">
                        <div class="principles__item-dec">
                            <img src="{{  url('/') . '/img/templates/principles/dec.png' }}" alt="{{ $properties['name']['value'] }}">
                        </div>
                        <div class="principles__item-digit">
                          0{{$loop->iteration}}
                        </div>
                        <h3 class="principles__item-title">
                            {!! $properties['name']['value'] !!}
                        </h3>
                        <p class="principles__item-desc">{{ $properties['desc']['value'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</section>