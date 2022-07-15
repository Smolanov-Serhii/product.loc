<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'treners')->first();
$items = $module->items;
?>
<section class="treners-page">
    <div class="treners-page__container main-container">
        <h1 class="treners-page__title section-title">
            {{ $contents['title']['value'] }}
        </h1>
        <div class="treners-page__content">
            @foreach($items as $item)
                @php
                    $properties = $item->props->mapWithKeys(function ($prop) {
                    return [$prop->type->key => $prop->value];
                    });
                @endphp
                <div class="treners-page__item">
                    <a href="{{ route('client.treners.item', ['alias' => $item->seo->alias]) }}"
                       class="treners-page__item-img">
                        <img src="{{  url('/') . '/uploads/module_items/' . $properties['photo-roxv'] }}"
                             alt="{{ $properties['fio'] }}">
                    </a>
                    <a href="{{ route('client.treners.item', ['alias' => $item->seo->alias]) }}"
                       class="treners-page__item-lnk">
                        <h2 class="treners-page__item-title">
                            {{ $properties['fio'] }}
                        </h2>
                    </a>
                    <div class="treners-page__item-skils">
                        {!! $properties['skils'] !!}
                    </div>
                    <div class="treners-page__item-desc">
                        {!! $properties['about'] !!}
                    </div>
                    <div class="treners-page__item-more">
                        <a href="{{ route('client.treners.item', ['alias' => $item->seo->alias]) }}">
                            Узнать больше
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>