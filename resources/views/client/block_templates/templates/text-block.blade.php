<?php
$contents = $block->mappedByKey();
?>
<section class="text-block-2c main-container">
    <div class="text-block-2c__container">
        <h1 class="text-block-2c__title">
        {!! $contents['title']['value'] !!}
    </h1>
    <div class="text-block-2c__content">
        {!! $contents['content']['value'] !!}
        </div>
    </div>
</section>