@php
    $module = \App\Models\Module::where('name', 'gosdoc')->first();
    $items = $module->items;
@endphp
<section class="gosdoc blog">
    <div class="gosdoc__container main-container">
        <h1 class="gosdoc__title section-title">
            Справочная литература по защите информации
        </h1>
        <div class="gosdoc__list">
            <div class="blog__container">
                @foreach($items as $item)
                    @php
                        $properties = $item->props->mapWithKeys(function ($prop) {
                                        return [$prop->type->key => $prop->value];
                                        });
                    @endphp
                    <a href="{{ route('client.gosdoc.item', ['alias' => $item->seo->alias]) }}">{{ $properties['title'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>
