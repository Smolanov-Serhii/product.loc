$( document ).ready(function() {

    $('.three_block_slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        dots: true,
        dotsClass: 'three_block_slider_dots'
    });
    $('.three_block_slider_next').on('click', function() {
        $('.three_block_slider').slick('slickNext');
    });
    $('.three_block_slider_prev').on('click', function() {
        $('.three_block_slider').slick('slickPrev');
    });

    $('.four_block_slider').slick({
        centerMode: true,
        infinite: true,
        vertical: true,
        verticalSwiping: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        centerPadding: "90px",
        responsive: [
            {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    vertical: false,
                    verticalSwiping: false,
                    centerMode: true,
                    centerPadding: "0px"
                }
            }
        ]
    });
    $('.four_block_slider_next').on('click', function() {
        $('.four_block_slider').slick('slickNext');
    });
    $('.four_block_slider_prev').on('click', function() {
        $('.four_block_slider').slick('slickPrev');
    });


    $('.wrapper').on('click', '.open_or_close > button', function(){
        var button = $(this);
        var elem = $(this).parent().parent().parent();
        if($(elem).hasClass('active')){
            $(elem).removeClass('active');
            $(button).html('подробнее');
        }else{
            $(elem).addClass('active');
            $(button).html('закрыть');
        }
    });

    var items = $('.eight_block .item');
    for (var i = 0; i < items.length; i++) {
        if($(items[i]).find('ul').height() > $(items[i]).find('.main').height()){
            $(items[i]).find('ul').append('<div class="open_or_close"><button>подробнее</button></div>');
        }
    }

    $('.nine_block_slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        dots: true,
        dotsClass: 'nine_block_slider_dots',
        responsive: [
            {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 499,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.nine_block_slider_next').on('click', function() {
        $('.nine_block_slider').slick('slickNext');
    });
    $('.nine_block_slider_prev').on('click', function() {
        $('.nine_block_slider').slick('slickPrev');
    });


    $(".video:not(.dontplay)").on("click", function() {
        var t = $(this).children("img"),
            e = t.attr("data-src"),
            i = document.createElement("iframe"),
            r = "https://www.youtube.com/embed/" + e + "?rel=0&iv_load_policy=3&fs=1&autoplay=1&mute=1";
        var a = $(this).width() + "px",
            d = $(this).height() + "px";
        i.setAttribute("src", r),
            i.setAttribute("frameborder", "0"),
            i.setAttribute("autoplay", "1"),
            i.setAttribute("width", a),
            i.setAttribute("height", d),
            this.parentNode.replaceChild(i, this);
        i.style.width = a, i.style.height = d
    });

    $('.ten_block_slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        dots: true,
        dotsClass: 'ten_block_slider_dots'
    });
    $('.ten_block_slider_next').on('click', function() {
        $('.ten_block_slider').slick('slickNext');
    });
    $('.ten_block_slider_prev').on('click', function() {
        $('.ten_block_slider').slick('slickPrev');
    });

    var widthDotsTenBlock = $('.ten_block_slider_dots').innerWidth();
    $('.ten_block .arrows').width(widthDotsTenBlock);


    $('.eleven_block .asks > .item:eq(0)').addClass('active');
    $('.eleven_block').on('click', '.item', function(){
        if($(this).hasClass('active')){
            $(this).removeClass("active");
        } else {
            $('.eleven_block .item').removeClass('active');
            $(this).addClass('active');
        }
    });

    $('.wrapper').on("click", ".right_mobile > button", function(){
        if($(this).hasClass('active')){
            $(this).removeClass("active");
            $('.header_front_page > .right').removeClass('active');
            $('body').css('overflow','auto');
        } else {
            $('.header_front_page > .right').addClass('active');
            $(this).addClass('active');
            $('body').css('overflow','auto');
        }
    });

    $('.city_phone').click(function(event) {
        $('button.active, .right').removeClass('active');
        $('body').css('overflow','auto');
    });

    // $("#menu_scroll").on("click","a", function (event) {
    //     event.preventDefault();
    //     var id  = $(this).attr('href'),
    //         top = $(id).offset().top;
    //     $('body,html').animate({scrollTop: top}, 1000);
    // });
    //
    // $("#menu_scrol").on("click","a", function (event) {
    //     event.preventDefault();
    //     var id  = $(this).attr('href'),
    //         top = $(id).offset().top;
    //     $('body,html').animate({scrollTop: top}, 1000);
    // });
});


