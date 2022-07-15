<footer id="footer" class="footer">
    <div class="footer__container main-container">
        <div class="footer__brend">
            <a href="{{ url('/') }}">
                <img src="{{ url('/public/img/header/logo-desktop.svg') }}" alt="">
            </a>
            <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста</p>
            <div class="footer__callback button-stroke js-callback">
                <span>обратный звонок</span>
            </div>
        </div>
        <nav id="footer__nav" class="footer__nav">
            <ul class="left-column">
                <li ><a href="{{ url('/methods') }}" class="mobile-menu__link">Методика</a></li>
                <li ><a href="{{ url('/trainings') }}" class="mobile-menu__link">Тренировки</a></li>
                <li ><a href="{{ url('/treners') }}" class="mobile-menu__link">Тренера</a></li>
                <li ><a href="{{ url('/schedule') }}" class="mobile-menu__link">Расписание</a></li>
                <li ><a href="{{ url('/reviews') }}" class="mobile-menu__link">Отзывы</a></li>
                <li ><a href="{{ url('/blog') }}" class="mobile-menu__link">Блог</a></li>
                <li ><a href="{{ url('/subscriptions') }}" class="mobile-menu__link">Подписки</a></li>
            </ul>
            <ul class="right-column">
                <li><a href="#">Методика</a></li>
                <li><a href="#">Стать инвестором</a></li>
                <li><a href="#">Политика возврата</a></li>
                <li><a href="#">Партнерская программа</a></li>
            </ul>
        </nav>
{{--        <div class="footer__contacts">--}}
{{--            <a href="tel:+7 (495) 748-97-38">+7 (495) 748-97-38</a>--}}
{{--            <a href="mailto:NAITRE@GMAIL.COM">NAITRE@GMAIL.COM</a>--}}
{{--            <a href="#">Instagram</a>--}}
{{--            <a href="#">Vkontakte</a>--}}
{{--            <a href="#">Facebook</a>--}}
{{--            <a href="#">Telegram</a>--}}
{{--        </div>--}}
        <div class="footer__subscribe">
            <h3 class="footer-widget">
                ПРИСОЕДИНЯЙТЕСЬ К ДВИЖЕНИЮ NAITRE
            </h3>
            <p class="footer-widget-text">
                Подпишитесь, чтобы получать советы по фитнесу, приемы и мотивации прямо в Ваш почтовый ящик каждую неделю
            </p>
            <form action="" method="get">
                <input class="tnp-email" type="email" placeholder="Введите e-mail">
                <button class="tnp-submit">ПОДПИСАТЬСЯ</button>
            </form>
        </div>
    </div>
</footer>