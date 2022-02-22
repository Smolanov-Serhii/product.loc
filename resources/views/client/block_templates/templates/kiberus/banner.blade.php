<?php
$contents = $block->mappedByKey();
?>
<section class="banner full-cover" style="background-image: url('/uploads/contents/{{ $contents['image']['value'] ?? $contents['image']['default_value'] }}')">
    <div class="banner__content main-container">
        <div class="banner__design">
            <div class="big-ball">
                <img src="{{ url('/') }}/img/design/big-ball.jpg">
            </div>
            <img class="middle-ball" src="{{ url('/') }}/img/design/midle-ball.png">
            <img class="more-middle-ball" src="{{ url('/') }}/img/design/more-midle-ball.png">
            <img class="small-ball" src="{{ url('/') }}/img/design/small-ball.png">
        </div>
        <div class="banner__text">
            <h1 class="banner__title" data-aos="fade-down" data-aos-delay="300">
                {{ $contents['title']['value'] ?? $contents['title']['default_value'] }}
            </h1>
            <div class="banner__subtitle" data-aos="fade-right" data-aos-delay="600">
                {!! $contents['content']['value'] ?? $contents['content']['default_value']  !!}
            </div>
            @if($contents['button']['value'])
                <a href="{!! $contents['lnk']['value'] ?? $contents['lnk']['default_value']  !!}" class="banner__btn border-button" data-aos="fade-up" data-aos-delay="900">
                    {{ $contents['button']['value'] }}
                </a>
            @endif
        </div>
        <div class="banner__form" data-aos="flip-left">
            <form action="{{ route('client.page.show', ['alias' => 'user-register']) }}" method="get">
                <h3 class="banner__form-title">
                    Присоединяйся!
                </h3>
                <span>Присоединяйтесь профессионалам в области кибербезопасности.</span>
                <input type="email" name="email" class="user-name" placeholder="Введите ваш Е-mail" required>
                <input type="submit" class="banner-submit green-button" value="Создать Бесплатный Аккаунт">
            </form>
            <h3 class="banner__form-sectitle">
                Или войди
            </h3>
            <a class="transparent-button" href="#"><img src="{{ url('/') }}/img/admin/google-login.svg" alt="Войти с помощью Google">Войти с помощью Google</a>
            <a class="transparent-button" href="#"><img src="{{ url('/') }}/img/admin/facebook-login.svg" alt="Войти с помощью Facebook">Войти с помощью Facebook</a>
            <p>Уже зарегистрировались? <a href="{{ url('/') }}/user-login">Войти</a></p>
        </div>
    </div>
</section>