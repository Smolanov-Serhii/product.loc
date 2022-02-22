<?php
/**
* @var $block \App\Models\Block;
* @var $templates \App\Models\Block_templates;
*/
?>

<div class="col-md-12 template-item" style="
box-shadow: 0 4px 12px 0 rgb(0 23 46 / 14%);
padding: 0;
border-radius: 6px;
cursor:pointer;
margin-bottom: 1rem;" data-template_id="{{ $template->id }}">
    <img
        src="{{ '/uploads/block_templates/thumbs/' . $template->image_path }}"
        alt=""
        style="max-width: 100%;"
    >
</div>
