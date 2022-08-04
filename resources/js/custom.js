//Форма
$(function(){
    $('form').validate({
        //hideLabels: false
        hideLabels: true
    });

    //Для сброса фокуса с поля в попапе, при клике по контенту
    if ($.fancybox) {
	var oldfunc = $.fancybox.defaults.clickContent;
	$.fancybox.defaults.clickContent = function(current, event) {
		if (current.$content[0].contains(document.activeElement)) {
			document.activeElement.blur();
		}
		oldfunc(current, event);
	}
    }
        
    //Измение label для input[type=file]
    var $label = $('label[for=attachment] span');
    var labelOrig = $label.html();
    $('#attachment').change(function(){
        var fileNames = [];
        for (var i = 0; i < this.files.length; i++) {
            fileNames.push(this.files[i].name);
        }
        if (fileNames.length) {
            $label.html(fileNames.join('; '));
        } else {
            $label.html(labelOrig);
        }
    });
});



// Анимация кнопки при наведении
//==============
[].map.call(document.querySelectorAll('[anim="ripple"]'), el=> {
    el.addEventListener('mouseover',e => {
        e = e.touches ? e.touches[0] : e;
        const r = el.getBoundingClientRect(), d = Math.sqrt(Math.pow(r.width,2)+Math.pow(r.height,2)) * 2;
        el.style.cssText = `--s: 0; --o: 1;`;  el.offsetTop; 
        el.style.cssText = `--t: 1; --o: 0; --d: ${d}; --x:${e.clientX - r.left}; --y:${e.clientY - r.top};`
    })
})

// Споллер
//==============
$(document).ready(function(){
	/*
	$('.spoiler-head').on('click', function(){
		if (!$(this).hasClass('opened')) {
			$('.spoiler-head').removeClass('opened');
			$('.spoiler').children('.spoiler-content').hide(300);
			$(this).toggleClass('opened').next('.spoiler-content').slideToggle(300);
		}
	})
	*/
	$(".spoiler").on('click', function(){
		$(".spoiler").removeClass("active"); 
		$(this).toggleClass("active"); 
	});
	/*
	$(".treb").on('click', function(){
		$(this).toggleClass("active"); 
	});*/
});

// Вкладки
//==============
$('#wrapper .tabs_nav').click(function() {
    var tab_id=$(this).attr('id');
    tabClick(tab_id)
});
function tabClick(tab_id) {
    if (tab_id != $('#wrapper .tabs_nav.active').attr('id') ) {
        $('#wrapper .tabs').removeClass('active');
        $('#'+tab_id).addClass('active');
        $('#con_' + tab_id).addClass('active');
    }    
}


// Слайдер
//==============
$(document).ready(function(){
	$('#team .slider').slick({
		lazyLoad: 'ondemand',
		slidesToShow: 4,
		slidesToScroll: 2,
		//autoplay: true,
		//autoplaySpeed: 4000,
		//fade: true,
		//cssEase: 'linear',
		dots: false,
		focusOnSelect: true,
		infinite: true,
		adaptiveHeight: false,
		//appendArrows: $(".slider_controls"),
		//appendDots: $(".slider_controls"),
		responsive: [
		{
		  breakpoint: 1150,
		  settings: {
			slidesToShow: 3,
		  }
		},
		{
		  breakpoint: 1023,
		  settings: {
			slidesToShow: 2,
		  }
		},
		{
		  breakpoint: 769,
		  settings: {
			slidesToShow: 1,
		  }
		},
		]
	});
	$('#building .gallery .slider').slick({
		lazyLoad: 'ondemand',
		slidesToShow: 3,
		slidesToScroll: 1,
		dots: false,
		//focusOnSelect: true,
		infinite: true,
		//adaptiveHeight: false,
		centerMode: true,
		responsive: [
		{
		  breakpoint: 769,
		  settings: {
			slidesToShow: 1,
		  }
		},
		]
	});
});
// Слайдер отзывы
//==============
$( function () {
    
    var $slider = $('#building .reviews .slider');
    if (! $slider.length) {
        return;
    }

    //init    
    var $slides = $slider.find('.item');
    var slidesCount = $slides.length;
    var curSlide = 0;
    changePosition();
    
    //height
    $('#building .reviews .item .review').matchHeight({
        byRow: false,
        property: 'min-height',
    });
    $('#building .reviews .item .leftbar').matchHeight({
        byRow: false,
        property: 'min-height',
    });
    
    var oldf = $.fn.matchHeight._afterUpdate;
    $.fn.matchHeight._afterUpdate = function(event, groups) {
        $('#building .reviews .slider').outerHeight($('#building .reviews .item').outerHeight(false));
        if (oldf) {
            oldf(event, groups);
        }
    }
    
    //events
    $('#building .reviews .slick-prev').click(sliderPrev);
    
    $('#building .reviews .slick-next').click(sliderNext);
    
    if ($.fn.swipe) {
        $slider.swipe( {
            swipeLeft: sliderPrev,
            swipeRight: sliderNext
        });
    }

    //methods
    function nextSlide(slideNum) {
        var nextSlide = slideNum + 1;
        if ( nextSlide >= slidesCount) {
            nextSlide -= slidesCount;
        }
        return nextSlide;
    }
    
    function prevSlide(slideNum) {
        var prevSlide = slideNum - 1;
        if ( prevSlide < 0) {
            prevSlide += slidesCount;
        }
        return prevSlide;
    }
 
    function sliderNext() {
        $slides.eq(curSlide).removeClass('visible current');
        curSlide = nextSlide(curSlide);
        changePosition();
    }
    
    function sliderPrev() {
        $slides.filter('.third').removeClass('visible third');
        curSlide = prevSlide(curSlide);
        changePosition();
    }
    function changePosition() {
        $('#building .reviews .js-slider-cur-page').html( ('0'+(curSlide+1)).slice(-2) );
        $slides.eq(curSlide).removeClass('second third').addClass('visible current');
        var secSlide = nextSlide(curSlide);
        $slides.eq(secSlide).removeClass('third current').addClass('visible second');
        var thirdSlide = nextSlide(secSlide);
        $slides.eq(thirdSlide).removeClass('second current').addClass('visible third');
    }


} );

// Адаптивное меню
//==============

$(document).ready(function() {
	//$('body').addClass('hiddenbody-x');
	$(document).delegate('.open', 'click', function(event){
		$('.mobile-icon, .mobile').toggleClass('active');
		$('body').toggleClass('hiddenbody');
		$('body').toggleClass('hiddenbody-x');
		event.stopPropagation();
	});/*
	$('.mobile').click(function(){
		$('.mobile-icon, .mobile').removeClass('active');
		$('body').toggleClass('hiddenbody');
	});*/
});

// Добавление класса к таблицам
//==============

jQuery(document).ready(function(){
	jQuery('table').addClass('table table-hover table-bordered');
}); 


//Удаление атрибутов картинок и стилей таблиц
//==============

jQuery(document).ready(function ($) {
    $('img').removeAttr('width').removeAttr('height');
    $('table, tr, td, th').removeAttr('style').removeAttr('width').removeAttr('height');
});



// Кнопка Наверх
//==============

$(document).ready(function(){
 
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});
	 
	$('.scrollup').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 500);
		return false;
	});
 
});


// Единая высота блоков 
//==============
$(document).ready(function() {
	$('.autoheight, .calclist li').matchHeight();
});


// Плавный скролинг к якорю
//==============

$(document).ready(function(){
	$(".ancor").on("click","a", function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 500);
	});
});


// Отложенный запуск YouTube
//==============
/*
(function () {
	var youtube = document.querySelectorAll(".youtube");

	for (var i = 0; i < youtube.length; i++) {
		var source = "https://i.ytimg.com/vi/" + youtube[i].dataset.id + "/maxresdefault.jpg";

		var image = new Image();
		image.src = source;

		image.addEventListener("load", function () {
			youtube[i].appendChild(image);
		}(i));

		var iframe;

		youtube[i].addEventListener("click", function () {
			var parent = $(this).parents('.media-image');

			parent.toggleClass('active');

			if (!$(this).hasClass('iframe')) {
				iframe = document.createElement("iframe");

				iframe.setAttribute("frameborder", "0");
				iframe.setAttribute("allowfullscreen", "");
				iframe.setAttribute("src", "https://www.youtube.com/embed/" + this.dataset.id + "?rel=0&showinfo=0&autoplay=1&enablejsapi=1&version=3&playerapiid=ytplayer");

				this.innerHTML = "";
				this.appendChild(iframe);
			}

			iframe.contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');

			if (!parent.hasClass('active')) {
				iframe.contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
			}

			$(this).addClass('iframe');
		});
	}
})();
*/
/*
$( document ).ready(function() {
	$('.js-lazyYT').lazyYT({loading_text: '1'});
});

//Опросник
$(function () {
    var formApp = $('.js-formApp'),
        slides = formApp.find('.js-questionSlide'),
        controlNext = formApp.find('.js-questionControlNext'),
        controlBack = formApp.find('.js-questionControlBack'),
        controlStart = formApp.find('.js-questionControlStart'),
        questionSum = formApp.find('.js-questionSum'),
        questionCurrent = formApp.find('.js-questionCurrent'),
        questionNum = formApp.find('.js-form-question');
        
    questionSum.text(formApp.find('.js-questionSlide').length - 2);//-первый слайд, - последний слайд
    
    questionNum.hide();
    
    slides.each(function () {
        var el = $(this),
            questionTxt = el.find('.js-question').text(),
            input = el.find('input.js-answer'),            
            radio = el.find('.js-radioBtn');
            
        function addValue() {
            var answerTxt = el.find('.js-radioBtn.active label').text(); 
            input.attr('value', questionTxt + ' : ' + answerTxt);
        }
        
        radio.click(function () {
            $(this).addClass('active').siblings('.active').removeClass('active');
            addValue();
        });
    });
    
    controlNext.click(function(e){
        e.preventDefault(); 
        
        //проверяем выбран ли вариант
        var $curSlide = $('.js-questionSlide.current'); 
        if ($curSlide.find('input.js-answer').length && ! $curSlide.find('input.js-answer').val()) {
           $curSlide.find('.js-message').html('Необходимо выбрать один из вариантов');
           return;
        };
        $curSlide.find('.js-message').html('');
        
        var next = $('.js-questionSlide.current').next().length; 
        if (next) {
            $('.js-questionSlide.current').removeClass('current').next().addClass('current');
            questionCurrent.text(+questionCurrent.text()+1);
        
            //если это последний слайд с анимашкой
            if ( $('.js-questionSlide.current .checkmark-loader').length ) {
                $('.js-formApp .jc-between').hide();
                questionNum.html('Заключительный этап');
                $(".build__list li").each(function(index) {        
                    (function(that, i) { 
                        var t = setTimeout(function() { 
                            $(that).siblings().removeClass("active");
                            $(that).addClass("active"); 
                        }, 1800 * i);
                    })(this, index);
                });
                setTimeout(function() { 
                    $('.js-formApp .finish').addClass("active");
                    $('.js-formApp .checkmark').css("display", "block");
                }, ($(".build__list li").length - 1) * 1800 + 1500);

            }
        }
        
    });
    
    controlBack.click(function(e){
        e.preventDefault(); 
        var index = $('.js-questionSlide.current').index('.js-questionSlide'); 
        //назад только для 2 и дальше слайда
        if (index > 1) { 
            $('.js-questionSlide.current').removeClass('current').prev().addClass('current');
            questionCurrent.text(+questionCurrent.text()-1); 
        }
    });
    
    controlStart.click(function(e){
        e.preventDefault(); 
        $('.js-questionSlide.current').removeClass('current').next().addClass('current');
        questionNum.show();
        
    });


});
*/