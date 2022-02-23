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
        <div class="list__button">
            <a href="#" class="button-stroke">
                <span>
                    {{ $var['browse_all_templates'] }}
                    <svg width="22" height="8" viewBox="0 0 22 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9216 0.464441L21.1036 3.64642C21.2988 3.84168 21.2988 4.15827 21.1036 4.35353L17.9216 7.53551C17.7263 7.73077 17.4097 7.73077 17.2145 7.53551C17.0192 7.34025 17.0192 7.02366 17.2145 6.8284L19.5429 4.49998L0.75 4.49997L0.75 3.49997L19.5429 3.49998L17.2145 1.17155C17.0192 0.976286 17.0192 0.659703 17.2145 0.464441C17.4097 0.269179 17.7263 0.269179 17.9216 0.464441Z" fill="#00BBFF"/>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>