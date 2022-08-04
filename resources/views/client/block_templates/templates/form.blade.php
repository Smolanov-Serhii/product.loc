<?php
$contents = $block->mappedByKey();
?>
<div class="background_8"
     style="background: url({{  url('/') . '/uploads/contents/' . $contents['bg']['value'] ?? ''}});background-repeat: no-repeat;background-size: cover;background-position: center center;">
    <div class="thirteen_block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="thirteen_block">
                        <div class="left">
                            <div class="heading" data-aos-once="true" data-aos="fade-up">
                                <h2>{!! $contents['title']['value'] ?? '' !!}</h2>
                                <p>{!! $contents['subtitle']['value'] ?? '' !!}</p>
                            </div>
                            {!! $contents['content']['value'] ?? '' !!}
                        </div>
                        <div class="right" data-aos-once="true" data-aos="fade-left">
                            <div class="form form-style-1 hideLabels">
                                <div class="form-head">
                                    <div class="form-header animate-top">
                                        {!! $contents['title-form']['value'] ?? '' !!}
                                    </div>
                                </div>
                                <form id="auto_order" action=""
                                      onsubmit="call($(this).attr('id'))" method="post"
                                      class="form_block form-template-send">
                                    <input type="hidden" name="to_email" value="{{ $contents['email']['value'] ?? '' }}">
                                    <input type="hidden" name="formid" value="{{ $contents['theme']['value'] ?? '' }}">
                                    <input type="hidden" name="title" value="{{ $contents['mail-title']['value'] ?? '' }}">
                                    <input type="hidden" name="ip"
                                           value="&lt;?php echo $_SERVER[&#39;REMOTE_ADDR&#39;]; ?&gt;">
                                    <div class="hidden"><input type="text" name="e-mail"></div>
                                    <div class="form-group animate-top">
                                        <input type="text" name="name" class="form-control required"
                                               data-validation="invalid">
                                        <label>{{ $var['name'] ?? ''}}</label>
                                    </div>
                                    <div class="form-group animate-top">
                                        <input type="tel" name="phone" class="form-control required inp"
                                               data-validation="invalid">
                                        <input type="hidden" name="type" value="Заказать звонок">
                                        <label>{{ $var['phone-input'] ?? ''}}</label>
                                    </div>

                                    <div class="button animate-top">
                                        <button type="submit" name="send" class="btn disabled" disabled="">
                                            <span>{{ $contents['button']['value'] ?? '' }}</span></button>
                                    </div>
                                    <div class="agreement-check lt animate-top">
                                        <input class="agreement" type="checkbox" checked="checked"
                                               value="Согласие на обработку данных" name="Agreement"
                                               data-validation="valid">
                                        <label class="agreement-label">
                                            <span class="check"></span>{{ $var['agry'] ?? ''}}
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
