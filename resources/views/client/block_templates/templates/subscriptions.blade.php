<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'subscriptions')->first();
$items = $module->items;
?>
<section class="subscriptions">
    <div class="subscriptions__container main-container">
        <h1 class="subscriptions__title blog-page__title section-title">
            {{ $contents['title']['value'] ?? ''}}
        </h1>
        <p class="subscriptions__subtitle">
            {{ $contents['subtitle']['value'] ?? '' }}
        </p>
        <div class="subscriptions__list">

            @foreach($items as $item)

                @php
                    $properties = $item->props->mapWithKeys(function ($prop) {
                                    return [$prop->type->key => $prop->value];
                                    });
                @endphp
                <div class="subscriptions__item @if($loop->iteration == 1) {{'current-plan'}} @endif">
                    <div class="subscriptions__item-design">
                        <img src="{{ url('/public/img/templates/subscriptions/design.svg') }}" alt="{{ $properties['subscription-desc'] ?? ''}}">
                    </div>
                    <div class="subscriptions__item-digit">
                        {{ $properties['subscription-digit'] ?? ''}}
                    </div>
                    <h2 class="subscriptions__item-title">
                        {{ $properties['subscription-name'] ?? ''}}
                    </h2>
                    <div class="subscriptions__item-period">
                        {{ $properties['subscription-stroke'] ?? ''}}
                    </div>
                    <div class="subscriptions__item-price">
                        {{ $properties['price'] ?? ''}}
                        <svg width="27" height="47" viewBox="0 0 27 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.8162 25.8957C21.5344 25.8957 27 20.0867 27 12.9465C27 5.8077 21.5344 0 14.8162 0H3.04831V30.1684H0V33.373H3.04831V47H6.20172V33.373H16.9186V30.1684H6.20172V25.8957H14.8162ZM6.20172 3.20455H14.8163C19.7957 3.20455 23.8467 7.57469 23.8467 12.9465C23.8467 18.3197 19.7957 22.6912 14.8163 22.6912H6.20172V3.20455Z" fill="#0E6D8B"/>
                        </svg>
                    </div>
                    @if($properties['sale'] <> '0')
                        <div class="subscriptions__item-old">
                            {{ $properties['sale'] ?? ''}}
                        </div>
                    @endif
                    <div class="subscriptions__item-economi">
                        {{ $properties['subscription-desc'] ?? ''}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>