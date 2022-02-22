<?php
/**
 * @var $module_item \App\Models\Module_items;
 */

$properties = $module_item->props->mapWithKeys(function ($prop) {
    return [$prop->type->key => $prop->value];
});

$taxonomies = $module_item->module->taxonomies
?>


@extends('client.layouts.main')
@section('content')
    <div class="breadcrumbs main-container">
        <div class="breadcrumbs__list">
            <ul class="breadcrumb">
                <a href="{{ url('/') }}">
                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.6649 9.29429C20.3145 9.29429 20.9015 9.31172 21.4864 9.28313C21.6659 9.27476 21.9277 9.17505 21.9873 9.04954C22.0469 8.92403 21.9138 8.67301 21.7821 8.56633C18.404 5.78791 15.0201 3.01693 11.6303 0.253392C11.2139 -0.0868794 10.8895 -0.0854842 10.4533 0.263852C8.89469 1.51895 7.33783 2.77777 5.78269 4.0403C5.70177 4.10585 5.6157 4.16651 5.45827 4.28505V1.64307C4.72263 1.64307 4.05394 1.64307 3.38157 1.64307C3.09982 1.64307 3.16088 1.83551 3.16088 1.98752C3.16088 3.24262 3.15058 4.49772 3.16529 5.75282C3.17261 5.87188 3.14893 5.99081 3.09634 6.09916C3.04374 6.2075 2.96384 6.30191 2.86368 6.37409C1.98091 7.0895 1.09815 7.81467 0.238186 8.55517C0.105771 8.66883 -0.0420928 8.94495 0.0174939 9.0342C0.104299 9.17366 0.35736 9.27476 0.546419 9.28452C1.12978 9.3159 1.71608 9.29568 2.34505 9.29568V9.73776C2.34505 13.0254 2.3502 16.3131 2.33696 19.6007C2.33696 19.9299 2.44142 20.0045 2.77025 20.0024C4.69468 19.9884 6.61838 19.9954 8.54281 19.9954H8.9452V11.5305H13.0648V19.9717H19.6649V9.29429Z"
                              fill="black"/>
                    </svg>
                    {{ $var['to-main'] }}
                </a>
                <span class="devider"> | </span>
                <span class="current-page">Сведения</span>
                <span class="devider"> | </span>
                <span class="current-page">{{ $model->title }}</span>
        </div>
    </div>
    <section class="documents">
        <div class="documents__container main-container">
            <h1 class="documents__title">
                {!! $properties['item-title'] !!}
            </h1>
            <div class="documents__subtitle">
{{--                {!! $properties['item-subtitle'] !!}--}}
            </div>
            <div class="documents__content">
                <aside class="documents__aside">
                    <div class="documents__aside-title">
                        Сведения об образовательной организации
                    </div>
                    <div class="documents__aside-logo">
                        <svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M31 61.1162C47.6327 61.1162 61.1162 47.6327 61.1162 31C61.1162 14.3673 47.6327 0.88382 31 0.88382C14.3673 0.88382 0.88382 14.3673 0.88382 31C0.88382 47.6327 14.3673 61.1162 31 61.1162ZM31 62C48.1208 62 62 48.1208 62 31C62 13.8792 48.1208 0 31 0C13.8792 0 0 13.8792 0 31C0 48.1208 13.8792 62 31 62Z"
                                  fill="#191919"/>
                            <path d="M26.0078 28.6135L36.5215 14.5977H46.5456L34.9891 29.4564L49.9373 54.6201L46.8881 57.382L43.5075 58.752L29.1151 36.3198L26.0078 40.197V49.1315H17.5586V39.9244L26.0078 28.6135Z"
                                  fill="#191919"/>
                            <path d="M16.7656 13.3867H25.2149V15.0056L16.7656 26.3442V13.3867Z" fill="#191919"/>
                        </svg>
                    </div>
                    <div class="documents__aside-group">
                        @foreach($taxonomies as $taxonomy)
                            @foreach($taxonomy->items as $taxonomy_item)
                                @if($taxonomy_item->module_items->isNotEmpty())
                                    @if($taxonomy_item->key !== 'hidden')
                                        <div class="documents__aside-group">
                                            {{--                                        <h3 class="documents__aside-text">--}}
                                            {{--                                            {{ $taxonomy_item->name }}:--}}
                                            {{--                                        </h3>--}}
                                            @foreach($taxonomy_item->module_items as $list_module_item)
                                                @php
                                                    /**
                                                    * @var $list_module_item \App\Models\Module_items
                                                    */
                                                    $list_module_properties = $list_module_item->props->mapWithKeys(function ($prop) {
                                                        return [$prop->type->key => $prop->value];
                                                    });
                                                @endphp
                                                <a
                                                        href="{{ route('client.documents.item', ['alias' => $list_module_item->seo->alias]) }}"
                                                        class="documents__aside-lnk @if($module_item->seo->alias == $list_module_item->seo->alias) current @endif"
                                                >
                                                    {{ $list_module_properties['item-title'] }}
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </aside>
                <div class="documents__main intelligences__main">
{{--                    <div class="documents__date">--}}
{{--                        {!! $properties['properties'] !!}--}}
{{--                    </div>--}}
                    {!! $properties['content'] !!}
                </div>
            </div>
        </div>
    </section>
@endsection
