<?php
$contents = $block->mappedByKey();
?>
<div id="popup-podbor" class="popup ct fancybox-content"><button data-fancybox-close="" class="fancybox-close-small" title="Close"><svg viewBox="0 0 32 32"><path d="M10,10 L22,22 M22,10 L10,22"></path></svg></button>
    <div class="form form-style-1 hideLabels">
        <div class="form-head">
            <div class="form-header animate-top">
                {{ $contents['title']['value'] ?? '' }}
            </div>
            <div class="form-desk animate-top">
                {{ $contents['subtitle']['value'] ?? '' }}
            </div>
        </div>
        <form id="auto_select_order" action="send.php" onsubmit="call($(this).attr('id'))" method="post" class="form_block form-template-send">
            <input type="hidden" name="to_email" value="{{ $contents['email']['value'] ?? '' }}">
            <input type="hidden" name="type" value="{{ $contents['title']['value'] ?? '' }}">
            <input type="hidden" name="title" value="{{ $contents['theme']['value'] ?? '' }}">
            <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
            <div class="hidden"><input type="text" name="e-mail"></div>
            <div class="form-group animate-top">
                <input type="text" name="name" class="form-control required" data-validation="invalid">
                <label>{{ $var['name'] ?? ''}}</label>
            </div>
            <div class="form-group animate-top">
                <input type="tel" name="phone" class="form-control required  inp" data-validation="invalid">
                <label>{{ $var['phone-input'] ?? ''}}</label>
            </div>
{{--            <div class="form-captcha">--}}
{{--                <div class="g-recaptcha" style="display: none;" data-sitekey="6LdvznAfAAAAALIBliKaYPMtmyWCqCeLjeZ51XTJ"><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LdvznAfAAAAALIBliKaYPMtmyWCqCeLjeZ51XTJ&amp;co=aHR0cHM6Ly9jb3B5bHNkLnN1OjQ0Mw..&amp;hl=ru&amp;v=4rwLQsl5N_ccppoTAwwwMrEN&amp;size=normal&amp;cb=6ryt7e33q5v" width="304" height="78" role="presentation" name="a-us5lph3fb19h" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response-3" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div></div>--}}
{{--                <div class="g-recaptcha" id="QC8X553ag3"><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LdvznAfAAAAALIBliKaYPMtmyWCqCeLjeZ51XTJ&amp;co=aHR0cHM6Ly9jb3B5bHNkLnN1OjQ0Mw..&amp;hl=ru&amp;v=4rwLQsl5N_ccppoTAwwwMrEN&amp;size=normal&amp;cb=7ygxet6h7ygx" width="304" height="78" role="presentation" name="a-4qz4bc636th" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response-8" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div></div></div>--}}
            <div class="button animate-top">
                <button type="submit" name="send" class="btn disabled" ><span>{{ $contents['button']['value'] ?? '' }}</span></button>
            </div>
            <div class="agreement-check lt animate-top">
                <input class="agreement" type="checkbox" checked="checked" value="Согласие на обработку данных" name="Agreement" data-validation="valid">
                <label class="agreement-label">
                    <span class="check"></span>{{ $var['agry'] ?? ''}}
                </label>
            </div>
        </form>
    </div>
</div>