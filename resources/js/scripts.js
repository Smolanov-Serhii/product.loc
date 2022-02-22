$(document ).ready(function() {

    $(".faq__item-header").click( function(e) {
        $(this).closest('.faq__item').toggleClass('active');
        $(this).closest('.faq__item').find('.faq__item-content').fadeToggle(300);
    });

    if ($('.list').length){
        $( ".list .list__content" ).each(function() {
            var masonry = new Macy({
                container: this,
                trueOrder: true,
                waitForImages: false,
                useOwnImageLoader: false,
                debug: true,
                mobileFirst: true,
                columns: 6,
                margin: {
                    y: 40,
                    x: 20,
                },
                breakAt: {
                    1440: 6,
                    1200: 5,
                    940: 4,
                    768: 3,
                    500: {
                        margin: {
                            x: 20,
                            y: 40,
                        },
                        columns: 2
                    },
                    350: {
                        margin: {
                            x: 10,
                            y: 40,
                        },
                        columns: 2
                    },
                    300: {
                        margin: {
                            x: 10,
                            y: 40,
                        },
                        columns: 1
                    },
                },
            });
        });
    }
});