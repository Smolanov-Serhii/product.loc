<section class="login">
    <div class="login__container">
        <div class="login__text padding-left">
            <a href="{{ url('/') }}">
                <img src="{{ url('/') }}/img/header/logo.svg" alt="Logo">
            </a>
            <div class="login__back">
                <a href="{{ url('/') }}">
                    <svg width="41" height="24" viewBox="0 0 41 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4853 22.6075L0.93934 13.0616C0.353555 12.4758 0.353555 11.5261 0.93934 10.9403L10.4853 1.39433C11.0711 0.808542 12.0208 0.808542 12.6066 1.39433C13.1924 1.98012 13.1924 2.92986 12.6066 3.51565L5.62132 10.5009L41 10.5009L41 13.5009L5.62132 13.5009L12.6066 20.4862C13.1924 21.072 13.1924 22.0217 12.6066 22.6075C12.0208 23.1933 11.0711 23.1933 10.4853 22.6075Z" fill="white"/>
                    </svg>Главная</a>
            </div>
            <div class="login__item">
                <h2 class="login__title">
                    Lorem Ipsum - это текст-"рыба"
                </h2>
                <div class="login__desc">
                    Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                </div>
            </div>
            <div class="login__item">
                <h2 class="login__title">
                    Lorem Ipsum - это текст-"рыба"
                </h2>
                <div class="login__desc">
                    Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.  Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                </div>
            </div>
            <div class="login__item">
                <h2 class="login__title">
                    Lorem Ipsum - это текст-"рыба"
                </h2>
                <div class="login__desc">
                    Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                </div>
            </div>
            <div class="login__license">
                © <?php echo date('Y')?> KIBERUS
            </div>
        </div>
        <div class="login__form padding-right" style="background-image: url('img/templates/login-page/bg.jpg')">
            <form action="{{ route('register') }}" method="post" autocomplete="off" id="register_form" novalidate>
                @csrf
                <div class="form-header">
                    <div class="title">
                        Регистрация
                    </div>
                    <div class="subtitle">
                        Присоединитесь к тысячам хакеров.
                    </div>
                    <div class="socials">
                        <span>Вход через соцсети</span>
                        {{--                        <a href="#"><img src="{{ url('/img/admin/login-vk.svg') }}" alt=""></a>--}}
                        <a href="#"><img src="{{ url('/img/admin/login-fb.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ url('/img/admin/login-goo.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ url('/img/admin/login-github.svg') }}" alt=""></a>
                        <a href="#"><img src="{{ url('/img/admin/login-tw.svg') }}" alt=""></a>
                    </div>
                </div>
                <div class="group">
                    <label for="name">
                        <input
                                type="text"
                                id="name"
                                autocomplete="username"
                                required
                                placeholder="Введите Имя"
                                name="name">
                        <span class="validate"></span>
                    </label>
                    <label for="email">
                        <input
                                type="email"
                                id="email"
                                autocomplete="email"
                                value="{{ request()->email }}"
                                required
                                placeholder="Введите E-mail"
                                name="email">
                        <span class="validate"></span>
                    </label>
                    <label class="label-password" for="password">
                        <input
                                name="password"
                                type="password"
                                id="password"
                                autocomplete="new-password"
                                placeholder="Придумайте пароль"
                                readonly
                                required
                                onfocus="this.removeAttribute('readonly');">
                        <img class="show-pass" src="{{ url('/img/admin/show.svg') }}" alt="">
                        <span class="validate"></span>
                    </label>
                    <label class="label-password">
                        <input
                                name="password_confirmation"
                                type="password"
                                id="password-confirm"
                                autocomplete="new-password"
                                placeholder="Повторите пароль"
                                readonly
                                required
                                onfocus="this.removeAttribute('readonly');">
                        <img class="show-pass" src="{{ url('/img/admin/show.svg') }}" alt="">
                        <span class="validate"></span>
                    </label>
                    <div class="label-role">
                        <label>
                            <input type="radio" name="role" value="{{ \App\Models\Role::STUDENT_ROLE_ID }}" checked>
                            <span class="radio-box"></span>
                            <span class="role-name">@lang('role.student')</span>
                        </label>
                        <label>
                            <input type="radio" name="role" value="{{ \App\Models\Role::INSTRUCTOR_ROLE_ID }}">
                            <span class="radio-box"></span>
                            <span class="role-name">@lang('role.instructor')</span>
                        </label>
                    </div>
                    <label for="accept">
                        <input type="checkbox" id="accept" name="accept">
                        <p>Я подтверждаю согласие на обработку <a href="#">персональных данных</a>  в соответствии с условиями <a href="#">Политики конфиденциальности</a>, ознакомился и согласен с условиями <a href="#">Пользовательского соглашения</a></p>
                        <span class="validate"></span>
                    </label>
                </div>
                <button type="submit" class="green-button">Зарегистрироваться</button>
                <div class="bottom">Имеешь аккаунт? <a href="{{ route('client.page.show', ['alias' => 'user-login']) }}">Войти</a></div>
            </form>
        </div>
    </div>
</section>