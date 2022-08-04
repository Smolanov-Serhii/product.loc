$( document ).ready(function() {

    const lazyImages = document.querySelectorAll('img[data-src], source[data-srcset]');
    // const loadMapBlock = document.querySelector('.__load-map');
    const windowHeight = document.documentElement.clientHeight;
    let lazyImagePosition = [];
    if (lazyImages.length > 0) {
        lazyImages.forEach(img => {
            if (img.dataset.src || img.dataset.srcset) {
                lazyImagePosition.push(img.getBoundingClientRect().top + pageYOffset);
                lazyScrollCheck();
            }
        })
    }

    window.addEventListener("scroll", lazyScroll);

    function lazyScroll() {
        if (document.querySelectorAll('img[data-src],source[data-srcset]').length > 0) {
            lazyScrollCheck();
        }
    }

    function lazyScrollCheck() {
        let imgIndex = lazyImagePosition.findIndex(
            item => pageYOffset > item - windowHeight
        );
        if (imgIndex >= 0) {
            if (lazyImages[imgIndex].dataset.src) {
                lazyImages[imgIndex].src = lazyImages[imgIndex].dataset.src;
                lazyImages[imgIndex].removeAttribute('data-src');
            } else if (lazyImages[imgIndex].dataset.srcset) {
                lazyImages[imgIndex].src = lazyImages[imgIndex].dataset.srcset;
                lazyImages[imgIndex].removeAttribute('data-srcset');
            }
            delete lazyImagePosition[imgIndex];
        }
    }

    lazyScrollCheck();

    AOS.init();

    if($('.header__language').length){
        $(".header__language .header__language-current").click(function() {
            $('.header__language-else').fadeToggle(300);
        });
        $(document).mouseup(function (e){ // событие клика по веб-документу
            var div = $(".header__language"); // тут указываем ID элемента
            if (!div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0) { // и не по его дочерним элементам
                $('.header__language-else').fadeOut(300); // скрываем его
            }
        });
    }

    if($('.mobile-show').length){
        $(".mobile-show").click(function() {
            $('.header_front_page >.right').toggleClass('active');
            $('body').toggleClass('lock');
            $(this).toggleClass('active');
        });
    }

    if($('.header__cities').length){
        $(".header__cities-current").click(function() {
            $('.header__cities-else').fadeToggle(300);
        });
        $(document).mouseup(function (e){ // событие клика по веб-документу
            var div = $(".header__cities"); // тут указываем ID элемента
            if (!div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0) { // и не по его дочерним элементам
                $('.header__cities-else').fadeOut(300); // скрываем его
            }
        });
    }

    if($('#dynamic').length){
        var DataString = $('#dynamic').data('set');
        var DataStringArray = DataString.split(',');
        var CharTimeout = 80; // скорость печатания
        var StoryTimeout = 2000; // время ожидания перед переключением
        var Summaries = DataStringArray;
        var SiteLinks = new Array();

        function startTicker() {
            massiveItemCount = Number(Summaries.length); //количество элементов массива
            // Определяем значения запуска
            CurrentStory = -1;
            CurrentLength = 0;
            // Расположение объекта
            AnchorObject = document.getElementById("dynamic");
            runTheTicker();
        }

        // Основной цикл тиккера
        function runTheTicker() {
            var myTimeout;
            // Переход к следующему элементу
            if (CurrentLength == 0) {
                CurrentStory++;
                CurrentStory = CurrentStory % massiveItemCount;

                StorySummary = Summaries[CurrentStory].replace(/"/g, '-');
                AnchorObject.href = SiteLinks[CurrentStory];
            }
            // Располагаем текущий текст в анкор с печатанием
            AnchorObject.innerHTML = StorySummary.substring(0, CurrentLength) + znak();
            // Преобразуем длину для подстроки и определяем таймер
            if (CurrentLength != StorySummary.length) {
                CurrentLength++;
                myTimeout = CharTimeout;
            } else {
                CurrentLength = 0;
                myTimeout = StoryTimeout;
            }
            // Повторяем цикл с учетом задержки
            setTimeout(
                function()
                {
                    runTheTicker()
                }, myTimeout);
        }

        // Генератор подстановки знака
        function znak() {
            if (CurrentLength == StorySummary.length) return "";
            else return "|";
        }

        startTicker();
    }




});




