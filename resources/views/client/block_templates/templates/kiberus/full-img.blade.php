<?php
$contents = $block->mappedByKey();
?>
<section class="full-img full-cover" style="background-image: url('img/templates/full-img/bg.jpg')" data-aos="fade-up" data-aos-delay="100">
    <div class="full-img__container main-container">
        <div class="full-img__content">
            {!! $contents['content']['value'] ?? $contents['content']['default_value'] !!}
        </div>
    </div>
</section>