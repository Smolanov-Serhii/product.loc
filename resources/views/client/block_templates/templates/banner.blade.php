<?php
$contents = $block->mappedByKey();
?>
<section class="banner main-container">
    <div class="banner__container">
        <div class="banner__bg">
            <picture>
                <source srcset="{{ url('/') }}/img/templates/banner/bg-desktop.svg" media="(min-width: 768px)">
                <img src="mdn-logo-narrow.png" alt="{{ $contents['title']['value'] ?? $contents['title']['default_value'] }}">
            </picture>
        </div>
        <div class="banner__ring">
            <img src="{{ url('/') }}/img/templates/banner/rings.svg" alt="MDN">
        </div>
        <div class="banner__design-note">
            <img src="{{ url('/') }}/img/templates/banner/design.svg">
        </div>
        <div class="banner__note">
            <img src="{{ url('/') }}/img/templates/banner/laptop.png" alt="MDN">
        </div>
        <div class="banner__content">
            <div class="banner__text">
                <h1 class="banner__title">
                    {{ $contents['title']['value'] ?? $contents['title']['default_value'] }}
                </h1>
                <p class="banner__subtitle">
                    {{ $contents['subtitle']['value'] ?? $contents['subtitle']['default_value'] }}
                </p>
                <label class="banner__button button-blue" >
                    <span>{{ $contents['button-name']['value'] ?? $contents['button-name']['default_value'] }}</span>
                    <input type="file" style="display: none">
                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.1111 0.888916H1.8889C1.50581 0.888916 1.13841 1.0411 0.867526 1.31198C0.59664 1.58287 0.444458 1.95027 0.444458 2.33336V19.6667C0.444458 20.0498 0.59664 20.4172 0.867526 20.6881C1.13841 20.959 1.50581 21.1111 1.8889 21.1111H22.1111C22.4942 21.1111 22.8616 20.959 23.1325 20.6881C23.4034 20.4172 23.5556 20.0498 23.5556 19.6667V2.33336C23.5556 1.95027 23.4034 1.58287 23.1325 1.31198C22.8616 1.0411 22.4942 0.888916 22.1111 0.888916ZM5.44224 3.7778C5.87076 3.7778 6.28966 3.90488 6.64597 4.14295C7.00228 4.38103 7.27998 4.71942 7.44397 5.11532C7.60796 5.51123 7.65087 5.94688 7.56727 6.36717C7.48367 6.78746 7.27731 7.17352 6.9743 7.47654C6.67129 7.77955 6.28522 7.98591 5.86493 8.06951C5.44464 8.15311 5.009 8.1102 4.61309 7.94621C4.21718 7.78222 3.87879 7.50451 3.64072 7.14821C3.40264 6.7919 3.27557 6.373 3.27557 5.94447C3.27557 5.36984 3.50384 4.81874 3.91017 4.41241C4.3165 4.00608 4.8676 3.7778 5.44224 3.7778ZM3.33335 17.5V14.5389L7.66668 10.1478C7.802 10.0133 7.98505 9.93779 8.17585 9.93779C8.36665 9.93779 8.5497 10.0133 8.68501 10.1478L10.5556 11.975L5.0089 17.5H3.33335ZM20.6667 17.5H7.05279L11.5522 13.0006L15.4522 9.10058C15.5876 8.96607 15.7706 8.89057 15.9614 8.89057C16.1522 8.89057 16.3353 8.96607 16.4706 9.10058L20.6667 13.2967V17.5Z" fill="white"/>
                    </svg>
                </label>
            </div>
            <div class="banner__design">
                <img src="{{ url('/') }}/img/templates/banner/design.svg">
            </div>
        </div>
        <div class="banner__brands">
            <div class="banner__brands-item">
                <img src="{{ url('/') }}/img/templates/banner/iphone.svg" alt="Apple">
            </div>
            <div class="banner__brands-item">
                <img src="{{ url('/') }}/img/templates/banner/samsung.svg" alt="Samsung">
            </div>
            <div class="banner__brands-item">
                <img src="{{ url('/') }}/img/templates/banner/pixel.svg" alt="Pixel">
            </div>
            <div class="banner__brands-item">
                <img src="{{ url('/') }}/img/templates/banner/huawei.svg" alt="Huawei">
            </div>
        </div>
    </div>
</section>