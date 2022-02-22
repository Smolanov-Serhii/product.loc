@php
    $mapped = $module_item->mappedModuleItemsById();
@endphp
@foreach($module_item->module->modules as $neighbour_module)
    @include('admin.module_items.includes.module_items_tab')
@endforeach