<?php
$module = \App\Models\Module::where('name', 'blog')->first();
$items = $module->items;
?>
@foreach($items as $item)
    @php
        $properties = $item->props->mapWithKeys(function ($prop) {
        return [$prop->type->key => $prop->value];
        });
    @endphp
    <div class="blog-sin__item">
        <a href="{{ route('client.treners.item', ['alias' => $item->seo->alias]) }}"
           class="blog-sin__item-img">
            <img src="{{  url('/') . '/uploads/module_items/' . $properties['thumbnail'] }}"
                 alt="{{ $properties['title'] }}">
        </a>
        <a href="{{ route('client.treners.item', ['alias' => $item->seo->alias]) }}"
           class="blog-sin__item-lnk">
            <div class="blog-sin__item-rubrik">
                Фитнес
            </div>
            <h2 class="blog-sin__item-title">
                {{ $properties['title'] }}
            </h2>
        </a>
        <div class="blog-sin__item-footer">
            <div class="blog-sin__item-count">
                <div class="wrapper">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_89_320)">
                            <path d="M18.9296 9.27494C18.78 9.05721 15.1842 3.95801 9.49995 3.95801C4.62241 3.95801 0.276089 9.02793 0.0932109 9.24406C-0.0310703 9.39131 -0.0310703 9.60744 0.0932109 9.75547C0.276089 9.9716 4.62241 15.0415 9.49995 15.0415C14.3775 15.0415 18.7238 9.9716 18.9067 9.75547C19.0215 9.61932 19.0318 9.42219 18.9296 9.27494ZM9.49995 14.2499C5.58986 14.2499 1.87211 10.5211 0.927665 9.49979C1.87056 8.47774 5.58433 4.74971 9.49995 4.74971C14.0751 4.74971 17.3043 8.47299 18.0928 9.47841C17.1824 10.4672 13.4433 14.2499 9.49995 14.2499Z" fill="#8D8D8D"/>
                            <path d="M9.49971 6.33301C7.75328 6.33301 6.33301 7.75328 6.33301 9.49971C6.33301 11.2461 7.75328 12.6664 9.49971 12.6664C11.2461 12.6664 12.6664 11.2461 12.6664 9.49971C12.6664 7.75328 11.2461 6.33301 9.49971 6.33301ZM9.49971 11.8748C8.19029 11.8748 7.12467 10.8092 7.12467 9.49975C7.12467 8.19032 8.19029 7.12471 9.49971 7.12471C10.8091 7.12471 11.8748 8.19032 11.8748 9.49975C11.8748 10.8092 10.8091 11.8748 9.49971 11.8748Z" fill="#8D8D8D"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_89_320">
                                <rect width="19" height="19" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    123
                </div>
                <div class="wrapper">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.43 1.07812H2.55441C1.41733 1.07812 0.492188 2.00308 0.492188 3.14035V9.79596C0.492188 10.9307 1.4133 11.8542 2.54709 11.8582V14.8784L6.88751 11.8582H13.43C14.567 11.8582 15.4922 10.933 15.4922 9.79596V3.14035C15.4922 2.00308 14.567 1.07812 13.43 1.07812ZM14.6133 9.79596C14.6133 10.4484 14.0825 10.9793 13.43 10.9793H6.61175L3.42599 13.1961V10.9793H2.55441C1.90192 10.9793 1.37109 10.4484 1.37109 9.79596V3.14035C1.37109 2.48776 1.90192 1.95703 2.55441 1.95703H13.43C14.0825 1.95703 14.6133 2.48776 14.6133 3.14035V9.79596Z" fill="#8D8D8D"/>
                        <path d="M4.50684 4.18359H11.4775V5.0625H4.50684V4.18359Z" fill="#8D8D8D"/>
                        <path d="M4.50684 6.05859H11.4775V6.9375H4.50684V6.05859Z" fill="#8D8D8D"/>
                        <path d="M4.50684 7.93359H11.4775V8.8125H4.50684V7.93359Z" fill="#8D8D8D"/>
                    </svg>
                    22
                </div>
            </div>
            <div class="blog-sin__item-desc">
                {!! $properties['date'] !!}
            </div>
        </div>
    </div>
    @if ($loop->iteration  == 5)
        @break
    @endif
@endforeach
