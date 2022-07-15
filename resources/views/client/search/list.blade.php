@extends('client.layouts.main')
@section('content')
    <div class="breadcrumbs main-container">
        <div class="breadcrumbs__list">
            <ul class="breadcrumb">
                <a href="{{ url('/') }}">Главная</a>
                <span class="devider"> / </span>
                <span class="current-page">Результат поиска по запросу “{{ $query }}”</span>
            </ul>
        </div>
    </div>

    <section class="search-page">
        <div class="search-page__design">

        </div>
        <div class="search-page__content main-container">
            <h1 class="search-page__title section-title">
                Результат поиска по запросу “{{ $query }}”
            </h1>
            <div class="search-page__counter">
                Найдено <span>{{ $module_item_props->count() }}</span> результатов
            </div>
        </div>
        <div class="search-page__results main-container">
            @foreach($module_item_props as $prop)
{{--                @php--}}
{{--                    $owner = $prop->owner;--}}
{{--                    $prop_alias = $owner->seo->alias;--}}
{{--                    switch(class_basename($owner)) {--}}
{{--                        case 'Pages':--}}
{{--                            $owner_alias = '/';--}}
{{--                            break;--}}
{{--                        case 'Module_items':--}}
{{--                            $owner_alias = '/'.$owner->module->name . '/';--}}
{{--                            break;--}}
{{--                    }--}}
{{--                    $link = $owner_alias . $prop_alias;--}}
{{--                @endphp--}}
                <div class="search-page__result">
                    <a href="{{--  {{ $link }} --}}" class="search-page__result-permalink">
                        <h2 class="search-page__result-title">
                            {!! $prop->value !!}
                        </h2>
                    </a>
                    <div class="search-page__result-excerpt">
                        <img src="{{ '/uploads/additions/thumbs/' . $prop->thumbnail }}" alt="">
                        {{ $prop->title }}
                        {!! $prop->content !!}
                        {{ $prop->excerpt }}
                        {{ $prop->alias }}

                        {{--                                @foreach($prop->item->props as $item_property)--}}
                        {{--                                    @if($item_property->id == $prop->id)--}}
                        {{--                                        <strong>{!! $item_property->value  !!}</strong>--}}
                        {{--                                    @else--}}
                        {{--                                        {!! $item_property->value  !!}--}}
                        {{--                                    @endif--}}
                        {{--                                    <br>--}}
                        {{--                                @endforeach--}}
                        {{--                                @foreach($prop ->item->props as )--}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection