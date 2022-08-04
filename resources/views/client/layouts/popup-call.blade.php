<div id="popup-call" class="popup ct">
    <div class="form form-style-1 hideLabels">
        <div class="form-head">
            <div class="form-header animate-top">
                Заказать звонок
            </div>
            <div class="form-desk animate-top">
                Оставьте свой номер - наш специалист перезвонит в течение 15 минут (в рабочее время)
            </div>
        </div>
        <form id="call_order" action=""
              method="post" class="form_block form-template-send">
            <input type="hidden" name="to_email" value="artemka.relit@gmail.com">
            <input type="hidden" name="type" value="Замовити дзвінок">
            <input type="hidden" name="formid" value="Заказать звонок">
            <input type="hidden" name="title" value="Заказать звонок">
            <input type="hidden" name="ip" value="&lt;?php echo $_SERVER[&#39;REMOTE_ADDR&#39;]; ?&gt;">
            <div class="hidden"><input type="text" name="e-mail"></div>
            <div class="form-group animate-top">
                <input type="text" name="name" class="form-control required" data-validation="invalid">
                <label>Ваше имя</label>
            </div>
            <div class="form-group animate-top">
                <input type="tel" name="phone" class="form-control required  inp" data-validation="invalid">
                <label>Номер телефона</label>
            </div>
            <div class="button animate-top">
                <button type="submit" name="send" class="btn disabled"><span>Перезвоните мне</span>
                </button>
            </div>
            <div class="agreement-check lt animate-top">
                <input class="agreement" type="checkbox" checked="checked" value="Согласие на обработку данных"
                       name="Agreement" data-validation="valid">
                <label class="agreement-label">
                    <span class="check"></span>Я даю свое согласие на обработку персональных данных и соглашаюсь с
                    <a href="https://copylsd.su/privacy-policy.html">политикой конфиденциальности</a>
                </label>
            </div>
        </form>
    </div>
</div>

