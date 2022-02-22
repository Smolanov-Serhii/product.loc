<?php
$contents = $block->mappedByKey();
?>
<section class="about">
{{--    <div class="about__design">--}}
{{--        <img class="left-design" src="img/templates/about/design.svg" alt="">--}}
{{--    </div>--}}
    <div class="about__container main-container">
        @widget('blocks.'.$contents["widget"]->default_value)
    </div>
</section>