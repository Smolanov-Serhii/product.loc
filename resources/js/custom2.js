$( document ).ready(function() {
	// if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
	// 	$('body').addClass('ios');
	// } else{
	// 	$('body').addClass('web');
	// };
	// $('body').removeClass('loaded');
	//
	// $(".qna__item").click(function(){
	// 	$(this).find(".qna__text").slideToggle();
	// });

	$(".feedback__star").click(function(){
		var numberOfStar = $(this).attr("data-id");
		$(".feedback__star").removeClass("active");
		$(this).addClass("active").prevAll().addClass("active");
	});

	$(".prod__smimage").click(function(){
		var thisId = $(this).attr("data-id");
		$(this).addClass("active").siblings().removeClass("active");
		$(".prod__img").removeClass("active");
		$(".prod__img_"+thisId).addClass("active");
	});

	$(".info__tab").click(function(){
		var thisId = $(this).attr("data-id");
		$(this).addClass("active").siblings().removeClass("active");
		$(".info__info_"+thisId).show().siblings(".info__info").hide();
	});

	$('.modal-run').click(function(event){
		event.preventDefault();
		var dataId = $(this).attr("data-id");
		var modalH2 = $(".modal-cont-" +dataId ).height();
		$(".modal-cont-" +dataId ).css({
			'marginTop': -modalH2/2
		});
		$(".overlay").fadeIn(600,function(){
			$(".modal-cont-" +dataId )
				.css('z-index', '9999')
				.animate({opacity: 1,top: "45%"},200)
		});
	});
	$('.modal-close,.overlay').click(function(){
		$(".modal-cont").animate({opacity: 0, top:"45%"}, 200,
			function(){
				$(this).css('z-index', '-1'); 
				$('.overlay').fadeOut(400);
			}
		);
	});

	$(".header__toggle").click(function(){
		$(".navigation").slideToggle();
		$(this).toggleClass("open");
	});

	var windWidth = $(window).width();
	if(windWidth < 768){
		$(".prod__heading").prependTo(".prod .wrapper");
		$(".anchor").click(function(){
			event.preventDefault();
	        var id = $(this).attr('href')
	          , top = $(id).offset().top;
	        $('body,html').animate({
	            scrollTop: top - 70
	        }, 1000);
	        $(".header__toggle").slideClass("open");
	        $(".navigation").slideToggle();
		});
	}

	// $(".anchor").click(function(){
	// 	event.preventDefault();
    //     var id = $(this).attr('href')
    //       , top = $(id).offset().top;
    //     $('body,html').animate({
    //         scrollTop: top - 70
    //     }, 1000);
	// });

	$(".comment__show").click(function(){
		$(this).remove();
		$(".comment2__wrapper").addClass("active");
	});

	$(".pagination__item").click(function(){
		$(this).addClass("active").siblings().removeClass("active");
		var thisId = $(this).attr("data-id");
		$(".comment2__box_"+thisId).addClass("active").siblings(".comment2__box").removeClass("active");
	});

	/*Phone mask*/
	// $("input[name=phone]").mask('+38 (000) 000-00-00', {
	// 	clearIfNotMatch: true
	// });

	// $('input[name=phone]').click(function () {
    //   $( this ).val('+38 (0');
    // });

});