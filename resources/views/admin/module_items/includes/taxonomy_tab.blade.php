@php
    $mapped = $module_item->mappedTaxonomyItemsById();
@endphp
@foreach($module_item->module->taxonomies as $taxonomy)
    @include('admin.module_items.includes.taxonomy_items_tab')
@endforeach