<?php
$contents = $block->mappedByKey();
?>
<div class="background_4" style="background-image: url({{  url('/') . '/uploads/contents/' . $contents['bg']['value'] ?? ''}})">
    <div id="six_block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="heading center" data-aos-once="true" data-aos="fade-up"
                         style="box-shadow: 0 0 15px -5px rgb(0 0 0 / 20%);border-radius: 1rem;padding: 20px;background: #fff;">
                        {!! $contents['content']['value'] ?? ''!!}
                    </div>
                    <strong style="font-weight: 600;"><strong style="font-weight: 600;">
                            <div class="six_block">
                                <div class="text" data-aos-once="true" data-aos="fade-right">
                                </div>
                                <button class="btn" data-src="#popup-podbor" data-fancybox=""><span>
                              {{  $contents['button']['value'] ?? '' }}							</span></button>
                            </div>
                        </strong></strong>
                </div>
                <strong style="font-weight: 600;"><strong style="font-weight: 600;">
                    </strong></strong>
            </div>
            <strong style="font-weight: 600;"><strong style="font-weight: 600;">
                </strong></strong>
        </div>
        <strong style="font-weight: 600;"><strong style="font-weight: 600;">
            </strong></strong>
    </div>
    <strong style="font-weight: 600;"><strong style="font-weight: 600;">
        </strong></strong>
</div>

