<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'faq')->first();
$items = $module->items;
?>

<section class="faq">
    <div class="faq__container main-container">
        <h1 class="faq__title blog-page__title section-title">
            {{ $contents['title']['value'] ?? ''}}
        </h1>
        <div class="faq__main tabs-elements">
            <div class="faq__main-tabs">
                @foreach($items as $item)

                    @php
                        $properties = $item->props->mapWithKeys(function ($prop) {
                                        return [$prop->type->key => $prop->value];
                                        });
                    @endphp
                        <div class="faq__main-tab tabs-nav-item">
                            {{ $properties['item-title'] ?? ''}}
                        </div>
                @endforeach
                <a href="{{'/subscriptions'}}" class="faq__main-tab">
                    Подписки
                </a>
            </div>
            <div class="faq__main-contents">
                @foreach($items as $item)
                    <div class="faq__main-content tabs-content-item">
                        @foreach($item->blocks as $block)
                            @if($block->enabled)
                                <?php $view = explode('.', $block->template->path)[0]; ?>
                                @includeIf('client.block_templates.templates.'.$view)
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>