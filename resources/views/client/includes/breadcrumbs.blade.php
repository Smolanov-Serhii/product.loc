<?php
/**
 * @var $breadcrumbs Array;
 * @var $model \App\Models\Page_properties;
 */
?>

@if($page->parent_page_id && $page->seo->alias != '404')
            <div class="breadcrumbs main-container">
                <div class="breadcrumbs__list">
                    <ul class="breadcrumb">
                        @if($page->seo->alias == 'main')
                                <span>{{ $page->seo->title }}</span>
                        @else
                            <a href="{{ url('/') }}">{{ $var['to-main'] }}</a>
                            <span class="devider"> / </span>
                            <span class="current-page">{{ $page->seo->title }}</span>
                        @endif
                </div>
            </div>
@endif
