<?php
/**
 * @var $block \App\Models\Block
 */
?>
@foreach($widget->blocks as $block)
    <?php $view = explode('.', $block->template->path)[0]; ?>
    @includeIf('client.block_templates.templates.'.$view)
@endforeach