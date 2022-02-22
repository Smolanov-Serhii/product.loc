$(document ).ready(function() {

    $(".faq__item-header").click( function(e) {
        $(this).closest('.faq__item').toggleClass('active');
        $(this).closest('.faq__item').find('.faq__item-content').fadeToggle(300);
    });

    var BannerSlider = new Swiper(".banner .swiper-container", {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".banner .swiper-pagination",
            clickable: true,
        },
    });

    var BlogSlider = new Swiper(".blog .swiper-container", {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".blog .swiper-pagination",
            clickable: true,
        },
    });

    var AnouncwsSlider = new Swiper(".announces .swiper-container", {
        loop: true,
        slidesPerView: 4,
        spaceBetween: 20,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".announces .swiper-pagination",
            clickable: true,
        },
    });

    $(".footer__to-top").click(function() {
        var elementClick = $(this).attr("href")
        var destination = $(elementClick).offset().top;
        jQuery("html:not(:animated),body:not(:animated)").animate({
            scrollTop: destination
        }, 800);
        return false;
    });

    $(function() {
        var marquee = $(".partners__list");
        marquee.wrapInner("<span>");
        marquee.find("span").css({ "width": "50%", "display": "inline-flex", "justify-content": "space-between" });
        marquee.append(marquee.find("span").clone());
        marquee.wrapInner("<div>");
        marquee.find("div").css("width", "200%");
        var reset = function() {
            if ($(window).width() <= '800'){
                $(this).stop();
            } else {
                $(this).css("margin-left", "0%");
                $(this).animate({ "margin-left": "-100%" }, 13000, 'linear', reset);
            }
        };
        reset.call(marquee.find("div"));
    });
});