<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'plan')->first();
$items = $module->items;
?>
<section class="plans">
    <div class="plans__rings">
        <img src="{{ url('/') }}/img/templates/plans/rings.png">
    </div>
    <div class="plans__container big-padding-left big-padding-right">
        <h2 class="plans__title section-title">
            {{ $contents['title']['value'] }}"
        </h2>
        <div class="plans__subtitle section-subtitle">
            {!! $contents['subtitle']['value'] !!}
        </div>
        <div class="plans__switch">

        </div>
        <div class="plans__items">
            @foreach($items as $item)
                @php
                    $properties = $item->props->mapWithKeys(function ($prop) {
                                    return [$prop->type->key => $prop->value];
                                    });
                @endphp
                <div class="plans__item">
                    <h3 class="plans__item-name">
                        {{ $properties['name'] }}
                    </h3>
                    <div class="plans__item-price">
                        $<span>{{ $properties['price'] }}</span>
                    </div>
                    @foreach($item->iterable as $iteration)
                        @php
                            $inner_properties = $iteration->props->mapWithKeys(function ($prop) {
                            return [$prop->type->key => $prop->value];
                            });
                        @endphp
                        <div class="plans__item-iteration">
                            <div class="plans__item-type">
                                {{ $inner_properties['name'] }}
                            </div>
                            <div class="plans__item-value">
                                {{ $inner_properties['value'] }}
                            </div>
                        </div>
                    @endforeach
                    <div class="plans__item-subs">
                        <div class="button-stroke plans__item-button">
                            <span>Subscribe</span>
                        </div>

                    </div>
                </div>
            @endforeach
                <div class="plans__design">
                    <img src="{{ url('/') }}/img/templates/plans/design.svg">
                </div>
        </div>
    </div>
</section>
