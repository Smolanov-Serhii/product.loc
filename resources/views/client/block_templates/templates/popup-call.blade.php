<?php
$contents = $block->mappedByKey();
?>
<div id="popup-call" class="popup ct">
    <div class="form form-style-1 hideLabels">
        <div class="form-head">
            <div class="form-header animate-top">
                {{ $contents['title']['value'] ?? '' }}
            </div>
            <div class="form-desk animate-top">
                {{ $contents['subtitle']['value'] ?? '' }}
            </div>
        </div>
        <form id="call_order" action=""
              method="post" class="form_block form-template-send">
            <input type="hidden" name="to_email" value="{{ $contents['email']['value'] ?? '' }}">
            <input type="hidden" name="type" value="{{ $contents['title']['value'] ?? '' }}">
            <input type="hidden" name="formid" value="{{ $contents['theme']['value'] ?? '' }}">
            <input type="hidden" name="title" value="{{ $contents['title']['value'] ?? '' }}">
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
            <div class="button animate-top">
                <button type="submit" name="send" class="btn disabled"><span>{{ $contents['button']['value'] ?? '' }}</span>
                </button>
            </div>
            <div class="agreement-check lt animate-top">
                <input class="agreement" type="checkbox" checked="checked" value="Согласие на обработку данных"
                       name="Agreement" data-validation="valid">
                <label class="agreement-label">
                    <span class="check"></span>{{ $var['agry'] ?? ''}}
                </label>
            </div>
        </form>
    </div>
</div>

