@php
    $module = \App\Models\Module::where('name', 'courses')
        ->with(['taxonomies', 'items.taxonomy_items'])
        ->first();


    $grouped_existed_taxonomy_items = \App\Models\TaxonomyItem::whereHas('module_items', function (\Illuminate\Database\Eloquent\Builder $query) use ($module) {
        $query->whereIn('id', $module['items']->pluck('id'));
    })->with('taxonomy')->get()->groupBy('taxonomy_id');

    $items = $module->items()->paginate(2);



@endphp
{{--dd($module->taxonomies);--}}
<section class="category">
    <div class="category__container main-container">
        <div class="category__header">
            <div class="category__tags">

            </div>
            <form
                    class="category__search"
                    action="{{ route('client.module_items.filter') }}"
                    id="courses_filter"
                    method="get">

                <input type="hidden" name="module" value="courses">
                <input name="category-search-text" id="category-search-text" type="text" placeholder="Поиск">
                <button type="submit" class="send-button green-button" id="search">Найти</button>
                <button type="reset" class="clear-button green-button" id="reset_button">Очистить</button>
            </form>
        </div>
        <aside class="category__aside">
            @foreach($module['taxonomies'] as $taxonomy)
                @isset($grouped_existed_taxonomy_items[$taxonomy->id])
                    <div class="category__group">
                        <h4 class="category__group-title">
                            {{ $taxonomy->name }}
                        </h4>
                        @foreach($grouped_existed_taxonomy_items[$taxonomy->id] as $taxonomy_item)
                            <label
                                    class="category__group-item"
                                    data-category="category-{{ $loop->parent->iteration }}_{{ $loop->iteration }}">
                                <input
                                        type="checkbox"
                                        class="category__group-input"
{{--                                        value="{{ $taxonomy_item->id }}"--}}
                                        name="taxonomy_item[{{ $taxonomy_item->id }}]"
                                        form="courses_filter"
                                >
                                <span>{{ $taxonomy_item->name }}</span>
                            </label>
                        @endforeach
                    </div>
                @endif
            @endforeach


        </aside>
        @includeIf('client.block_templates.includes.category_result')
    </div>
</section>

@section('client_scripts')
    <script src="{{ asset('/js/modules/filter.js') }}"></script>
{{--    <script>--}}
{{--        var filter_URL = '{{ route('client.modules.filter') }}';--}}
{{--    </script>--}}
@endsection