<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'mockup')->first();
$items = $module->items;
?>
<section class="list">
    <div class="list__container main-container">
        <h2 class="list__title section-title">
            {{ $contents['title']['value'] }}"
        </h2>
        <div class="list__subtitle section-subtitle">
            {!! $contents['subtitle']['value'] !!}
        </div>
        <div class="list__content">
            @foreach($items as $item)
                @php
                    $properties = $item->props->mapWithKeys(function ($prop) {
                                    return [$prop->type->key => $prop->value];
                                    });
                @endphp
{{--                {{ $contacts['phone'] }}--}}
{{--                {{ $var['email_text'] }}--}}
                <a href="{{ route('client.mockup.item', ['alias' => $item->seo->alias]) }}">
                    <picture class="list__content-img">
                        <source media="(min-width: 500px)"
                                srcset="{{ '/uploads/module_items/' . $properties['image'] }}">
                        <img src="{{ '/uploads/module_items/' . $properties['image'] }}"
                             alt="{{ $properties['title'] }}">
                    </picture>
                    <h3 class="list__content-title">
                        {{ $properties['title'] }}
                    </h3>
                </a>
            @endforeach
        </div>
    </div>
</section>