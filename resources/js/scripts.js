$( document ).ready(function() {
    function setCookie(name, value, expires, path, domain, secure) {
        document.cookie = name + "=" + escape(value) +
            ((expires) ? "; expires=" + expires : "") +
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            ((secure) ? "; secure" : "");
    }
    function getCookie(name) {
        var cookie = " " + document.cookie;
        var search = " " + name + "=";
        var setStr = null;
        var offset = 0;
        var end = 0;
        if (cookie.length > 0) {
            offset = cookie.indexOf(search);
            if (offset != -1) {
                offset += search.length;
                end = cookie.indexOf(";", offset)
                if (end == -1) {
                    end = cookie.length;
                }
                setStr = unescape(cookie.substring(offset, end));
            }
        }
        return(setStr);
    }
    AOS.init({
        // Global settings:
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 200, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1200, // values from 0 to 3000, with step 50ms
        easing: 'ease', // default easing for AOS animations
        once: true, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });
    if ($(".main-banner__container").length){
        var swiper = new Swiper(".main-banner__container", {
            scrollbar: {
                el: ".main-banner__controls .pagination",
                hide: true,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
        });
    };
    if ($(".quize").length){
        function quizeslider(){
            var quize = new Swiper(".quize__container .swiper-container", {
                autoHeight: true,
                scrollbar: {
                    el: ".quize .pagination",
                    hide: true,
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                navigation: {
                    nextEl: ".quize__navigation .next",
                    prevEl: ".quize__navigation .prev",
                },
            });
        }
    };

    if ($(".popup-fade").length){
        if(getCookie('quize') == "true"){
            $('.video').fadeIn(300);
        }
        $(".js-try").click( function(e) {
            var CurrentAbonement = $(this).closest('.best__item').find('.best__item-title').html();
            $('input.zakaz').val(CurrentAbonement);
            $('body').addClass('locked');
            $('.popup-fade').fadeIn(300);
            $('.quize').fadeIn(300);
            quizeslider();
        });
        $(".close-quize").click( function(e) {
            $('body').removeClass('locked');
            $('.popup-fade').fadeOut(300);
            $('.quize').fadeOut(300);
        });
        $(".get-result").click( function(e) {
            var CurrentLevel = $('#start-level input:checked').val();
            var CurrentCel = $('#cel input:checked').val();
            var chackedbox = $("input.agree:checked").length;
            var CurrentMail = $('.quize-main').val();
            $('input.level').val(CurrentLevel);
            $('input.cel').val(CurrentCel);
            $('input.quize-mail').val(CurrentMail);
            var counter = 0;
            if(!CurrentMail){
                $('.mail-row .error').fadeIn(300);
            } else {
                counter++;
            }
            if (chackedbox == 0) {
                $('.agree-error').fadeIn(300);
            } else {
                counter++;
            }
            if(counter == 2){
                $( ".quize-send" ).trigger( "click" );
                setCookie('quize', 'true');
                $('.video').fadeIn(300);
                $('html, body').animate({
                    scrollTop: $("#video").offset().top  // класс объекта к которому приезжаем
                }, 1000); // Скорость прокрутки
            } else {

            }


        });
        $(".js-zapisatsia").click( function(e) {
            var CurrentAbonement = $(this).closest('.best__item').find('.best__item-title').html();
            $('input.zakaz').val(CurrentAbonement);
            $('body').addClass('locked');
            $('.popup-fade').fadeIn(300);
            $('.popup-zapisatsa').fadeIn(300);
        });
        $(".close-zapisatsa").click( function(e) {
            $('body').removeClass('locked');
            $('.popup-fade').fadeOut(300);
            $('.popup-zapisatsa').fadeOut(300);
        });
        $(".js-callback").click( function(e) {
            $('body').addClass('locked');
            $('.popup-fade').fadeIn(300);
            $('.popup-callback').fadeIn(300);
        });
        $(".close-callback").click( function(e) {
            $('body').removeClass('locked');
            $('.popup-fade').fadeOut(300);
            $('.popup-callback').fadeOut(300);
        });
        // $(".js-try").click( function(e) {
        //     $('body').addClass('locked');
        //     $('.popup-fade').fadeIn(300);
        //     $('.popup-try').fadeIn(300);
        // });
        // $(".close-try").click( function(e) {
        //     $('body').removeClass('locked');
        //     $('.popup-fade').fadeOut(300);
        //     $('.popup-try').fadeOut(300);
        // });
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            $('body').removeClass('locked');
            $('.popup-fade > div').fadeOut(300);
            $('.popup-fade').fadeOut(300);
            $('.wpcf7-response-output').empty();
            setTimeout(function (){
                $('#success-send').removeClass('active-popup');
                console.log('send');
                $('.quize').fadeOut(300);
            }, 2000);
        }, false );
    };
    if ($(".header").length){
        $(".mobile-burger").click( function(e) {
            $('.mobile-menu').fadeToggle().css('display', 'flex');
            $('body').toggleClass('locked');
        });
        $(".mobile-menu li a").click( function(e) {
            $('.mobile-menu').fadeOut(300);
            $('body').toggleClass('locked');
        });
    };

    if ($(".login-popup").length){
        $(".js-try").click( function(e) {
            $('body').toggleClass('locked');
            $('.body-fade').fadeToggle(300);
            $('.login-popup').fadeToggle(300);
        });
        $(".login-popup__close").click( function(e) {
            $('body').toggleClass('locked');
            $('.body-fade').fadeToggle(300);
            $('.login-popup').fadeToggle(300);
        });
    };

    if ($(".js-search").length){
        $(".js-search").click( function(e) {
            $('body').toggleClass('locked');
            $('.body-fade').fadeToggle(300);
            $('.search-popup').fadeToggle(300);
        });
        $(".search-popup__close").click( function(e) {
            $('body').toggleClass('locked');
            $('.body-fade').fadeToggle(300);
            $('.search-popup').fadeToggle(300);
        });
    };



    $('.blog-page__rubrik').on('click', function() {
        console.log('change');
        $('.blog-page__rubriks input[type="checkbox"]').prop('checked', false);
        $(this).find('input[type="checkbox"]').prop('checked', true);
    });

    $(".timetable__table-show").click( function(e) {
        $(this).closest('.timetable__table-item').toggleClass('active');
        $(this).toggleClass('active');
    });

    function submitFromAuthForm(e) {
        e.preventDefault();

        var formData = new FormData(this);

        for (var key of formData.keys()) {

            if (validation_title = $(`label[for=${key}] .validate`)[0]) {
                validation_title.innerHTML = '';
            }
        }

        $.ajax({
            method: this.method,
            url: this.action,
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {
                console.log(data, textStatus, jqXHR)
                if(jqXHR.status == 204) {
                    console.log(data)
                    return ;
                }
                document.location.href = data.redirectTo;
            }
        })
            .catch(function (data) {

                $.each(data.responseJSON.errors, function (key, value) {
                    $(`label[for=${key}] .validate`)[0].innerHTML = value[0];
                })
            })

        return false;
    }

    $('#register_form').submit(submitFromAuthForm)
    $('#login_form').submit(submitFromAuthForm)

    if($('.tabs-elements').length){
        $(".tabs-elements .tabs-nav-item").click(function() {
            $(".tabs-elements .tabs-nav-item").removeClass("active").eq($(this).index()).addClass("active");
            $(".tabs-elements .tabs-content-item").hide().eq($(this).index()) .css("display", "flex")
                .hide()
                .fadeIn();
        }).eq(0).addClass("active");
        $(".tabs-elements .tabs-content-item").eq(0).addClass("active");
    }

    if ($(".faq-block1").length){
        $(".faq-block1__item-header").click( function(e) {
            $(this).closest('.faq-block1__item').toggleClass('active');
            $(this).closest('.faq-block1__item').find('.faq-block1__item-content').fadeToggle(300);
        });

    };
});




