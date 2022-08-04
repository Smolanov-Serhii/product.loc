<?php
/**
 * @var $module_item \App\Models\ModuleItem;
 */

//$attributes = $program->attrs();
$properties = $module_item->props->mapWithKeys(function ($prop) {
    return [$prop->type->key => $prop->value];
});
?>


@extends('client.layouts.main')
@section('content')
    @foreach($properties as $item)
        <div class="faq__main-content tabs-content-item">
            @foreach($item->blocks as $block)
                @if($block->enabled)
                    <?php $view = explode('.', $block->template->path)[0]; ?>
                    @includeIf('client.block_templates.templates.'.$view)
                @endif
            @endforeach
        </div>
    @endforeach
@endsection
