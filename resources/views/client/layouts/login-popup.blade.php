<div class="login-popup" style="display: none">
    <div class="login-popup__close">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.90735e-06 1.06054L1.06054 0L9 7.93946L16.9395 0L18 1.06054L10.0605 9L18 16.9395L16.9395 18L9 10.0605L1.06054 18L1.90735e-06 16.9395L7.93946 9L1.90735e-06 1.06054Z" fill="#848484"/>
        </svg>
    </div>
    <div class="login-popup__wrapper">
        <form action="{{ route('login') }}" method="post" id="login_form" novalidate>
            <div class="form-header">
                <div class="title tub-login">
                    Войти
                </div>
            </div>
            @csrf
            <div class="group">
                <label for="email">
                    <input name="email" type="email" id="email" placeholder="Введите E-mail">
                    <span class="validate"></span>
                </label>
                <label class="label-password" for="password">
                    <input name="password" type="password" id="password" placeholder="Пароль">
                    <img class="show-pass" src="{{ url('/img/admin/show.svg') }}" alt="">
                    <span class="validate"></span>
                </label>
            </div>
            <button type="submit" class="button-bg"><span>Войти</span></button>
            <div class="bottom">Нет аккаунта? <span class="else">Зарегистрироваться</span></div>
        </form>
    </div>
</div>