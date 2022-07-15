<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'blog')->first();
$items = $module->items;
?>
<section class="blog-page">
    <div class="blog-page__container main-container">
        <h1 class="blog-page__title section-title">
            {{ $contents['title-block']['value'] }}
        </h1>
        <div class="blog-page__rubriks">

            <?php            $module = \App\Models\Module::where('name', 'blog')
                ->with(['taxonomies', 'items.taxonomy_items'])
                ->first();
            $grouped_existed_taxonomy_items = \App\Models\TaxonomyItem::whereHas('module_items', function (\Illuminate\Database\Eloquent\Builder $query) use ($module) {
                $query->whereIn('id', $module['items']->pluck('id'));
            })->with('taxonomy')->get()->groupBy('taxonomy_id');
            ?>
            <form
                    class="category__search"
                    action="{{ route('client.module_items.filter') }}"
                    id="courses_filter"
                    method="get">


                <input type="hidden" value="blog" name="module">
            @foreach($module['taxonomies'] as $taxonomy)
                @isset($grouped_existed_taxonomy_items[$taxonomy->id])
                    <div class="category__group">
                        <label class="blog-page__rubrik" id="reset_button">
                            <input type="checkbox"
                                   class="category__group-input"
                                   form="courses_filter"
                                   style="display: none" checked>
                            <div class="blog-page__rubrik">
                                Все
                            </div>

                        </label>
                        @foreach($grouped_existed_taxonomy_items[$taxonomy->id] as $taxonomy_item)
                            <label class="blog-page__rubrik">
                                <input type="checkbox"
                                       class="category__group-input"
                                       {{--                                        value="{{ $taxonomy_item->id }}"--}}
                                       name="taxonomy_item[{{ $taxonomy_item->id }}]"
                                       form="courses_filter"
                                style="display: none">
                                <div class="blog-page__rubrik">
                                    {{ $taxonomy_item->name }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                @endif
            @endforeach
            </form>
        </div>
        @includeIf('client.block_templates.includes.category_result')
    </div>
</section>
@section('client_scripts')
    <script src="{{ asset('/js/modules/filter.js') }}"></script>
@endsection