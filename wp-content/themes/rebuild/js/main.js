jQuery(function($) {
    $(document).ready(function() {

        if($(".animated_title").length > 0){
            $('.animated_title p').html(function (i, html) {
                var chars = $.trim(html).split("");
                return '<span>' + chars.join('</span><span>') + '</span>';
            });
            Array.prototype.forEach.call($(".animated_title span"), el => {
                if(el.innerHTML === " "){
                    el.classList.add('spacing');
                }
            });
        }

        if($(".scrolling-path").length > 0){
            let svgLine, svgLineLength, offset = 2;
            Array.prototype.forEach.call($(".scrolling-path"), child => {
                if($(".front-page").length > 0){
                    offset = 7;
                }
                svgLine = child;
                svgLineLength = child.getTotalLength();
                child.style.strokeDasharray = svgLineLength;
                child.style.strokeDashoffset = svgLineLength;
                window.addEventListener("scroll", scrollSVG);
                // var lastScrollpercent = 0;
                function scrollSVG() {
                    var scrollpercent = ((document.body.scrollTop + document.documentElement.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight)) * offset;

                    // if (scrollpercent < lastScrollpercent) return;
                    // lastScrollpercent = scrollpercent;

                    var draw = svgLineLength * scrollpercent;
                    child.style.strokeDashoffset = svgLineLength - draw;
                }
            });
        }

        if($(".btn").length > 0){
            const btns = document.querySelectorAll(".btn, .swiper-button-prev, .swiper-button-next, .social svg");

            btns.forEach((btn) => {
                let left = 0, top = 0, s = 0;
                btn.addEventListener("mousemove", function(e){
                    if(btn.classList.contains('btn-secondary') || btn.classList.contains('btn-primary')){
                        s = .5
                    } else{
                        s = .9
                    }
                    left = (e.screenX  - (btn.getBoundingClientRect().left + btn.getBoundingClientRect().width/2))*s;
                    top = (e.y - (btn.getBoundingClientRect().top + btn.getBoundingClientRect().height/2))*s;
                    btn.style.setProperty("transform", `translate(${left}px, ${top}px)`);
                    if(btn.classList.contains('swiper-button-prev') || btn.classList.contains('swiper-button-next')){
                        btn.classList.add("scale");
                        btn.style.setProperty('--left-x', left - 5.5 + "px");
                        btn.style.setProperty('--top-y', top - 5.5 + "px");
                    }
                    if(btn.classList.contains('btn-secondary') || btn.classList.contains('btn-primary')){
                        btn.classList.add("scale");
                        btn.style.setProperty('--left-x', left - 5.5 + "px");
                        btn.style.setProperty('--top-y', top - 5.5 + "px");
                    }
                });
            });

            btns.forEach((btn) => {
                btn.addEventListener("mouseout", function(e){
                    btn.style.transform = "translate(0px, 0px)";
                    btn.classList.remove("scale");
                    btn.style.setProperty('--left-x', btn.getBoundingClientRect().width * -1 + "px");
                    btn.style.setProperty('--top-y',  btn.getBoundingClientRect().width * -1 + "px");
                });
            });

        }

        const cursorinner = document.querySelector('.cursor');

        document.addEventListener('mousemove', function(e){
            const x = e.clientX;
            const y = e.clientY;
            cursorinner.style.left = x + 'px';
            cursorinner.style.top = y + 'px';
        });

        if($(".rating").length > 0){
            document.querySelectorAll('.rating').forEach(element => {
                const rating = element.querySelector('.group');
                const totalCost = rating.querySelectorAll('span')[1].innerHTML.replace(/[^0-9]/g,'');
                const currentCost = rating.querySelectorAll('span')[0].innerHTML.replace(/[^0-9]/g,'');
                const percent = currentCost / totalCost * 100;
                element.querySelector('.line span').style = `width: ${percent}%`
            });
        }

        $.getScript("https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.9/SmoothScroll.js", function(){
            SmoothScroll({
                keyboardSupport: true,
                animationTime: 1000,
                stepSize: 60, // [px]
            });
        });

        if($("input, textarea").length > 0){
            document.querySelectorAll('input, textarea').forEach(element => {
                element.addEventListener('focus', (event) => {
                    event.target.closest('fieldset').classList.add('focused');
                });
                element.addEventListener('blur', (event) => {
                    if( event.target.value.length === 0){
                        event.target.closest('fieldset').classList.remove('focused');
                    }
                });
            });
        }

        $('.burger').on('click', function(){
            $(this).toggleClass('opened');
            $('header').toggleClass('opened');
        });

        function scrollClass(){
            if(document.querySelectorAll('.scroll-y').length > 0){
                const scrollElem = document.querySelectorAll('.scroll-y');
                for (let index = 0; index < scrollElem.length; index++) {
                    if (
                        !scrollElem[index].classList.contains('enter')
                        && scrollElem[index].getBoundingClientRect().top - window.innerHeight < 80
                        && scrollElem[index].getBoundingClientRect().bottom > 80
                    ) {
                        scrollElem[index].classList.add('enter');
                    } else if (
                        scrollElem[index].classList.contains('enter')
                        &&
                        !scrollElem[index].classList.contains('once')
                        &&
                        (
                            (scrollElem[index].getBoundingClientRect().top - window.innerHeight > 80
                                && scrollElem[index].getBoundingClientRect().bottom > 80)
                            ||
                            (scrollElem[index].getBoundingClientRect().top - window.innerHeight < 80
                                && scrollElem[index].getBoundingClientRect().bottom < 80))
                    ) {
                        scrollElem[index].classList.remove('enter');
                    }
                }
            }
        }
        scrollClass();

        window.addEventListener('scroll', function(e) {

            // scroll classses
            scrollClass();

            // header scrolling
            let $this = $(this),
                $head = $('header');
            if ($this.scrollTop() > 120) {
                $head.addClass('header_bg');
            } else {
                $head.removeClass('header_bg');
            }

            // hidden header
            let doc = document.documentElement;
            let w = window;

            let prevScroll = w.scrollY || doc.scrollTop;
            let curScroll;
            let direction = 0;
            let prevDirection = 0;

            let header = document.querySelector('header');

            let checkScroll = function() {
                curScroll = w.scrollY || doc.scrollTop;
                if (curScroll > prevScroll) {
                    direction = 2;
                }
                else if (curScroll < prevScroll) {
                    direction = 1;
                }
                if (direction !== prevDirection) {
                    toggleHeader(direction, curScroll);
                }
                prevScroll = curScroll;
            };

            let toggleHeader = function(direction, curScroll) {
                if (direction === 2 && curScroll > 52) {
                    header.classList.add('hide');
                    prevDirection = direction;
                }
                else if (direction === 1) {
                    header.classList.remove('hide');
                    prevDirection = direction;
                }
            };

            window.addEventListener('scroll', checkScroll);

        })

        //FAQ

        $('.faq .faq_item').on('click', function(){
            $(this).toggleClass('opened');
        });

        $('.btn-extra').on('click', function(){
            $(this).toggleClass('opened');
        });

        if($(".faq_item").length > 0){
            document.querySelectorAll('.faq_item').forEach(element => {
                element.querySelector('.faq_content_cover').style.setProperty('--el-height', element.querySelector('.faq_content').getBoundingClientRect().height + 'px');
            });
        }

        $('.request_item .btn-extra').on('click', function(){
            $(this).parentsUntil('.request_item').next().toggleClass('opened');
        });

        $('.request_item .bottom .btn-extra').on('click', function(){
            $(this).parentsUntil('.boootm').removeClass('opened');
            $(this).parentsUntil('.request_item').parent().find('.btn-extra').removeClass('opened');
        });

        if($(".request_item").length > 0){
            document.querySelectorAll('.request_item').forEach(element => {
                element.querySelector('.bottom').style.setProperty('--el-height', element.querySelector('.bottom .cover').getBoundingClientRect().height + 'px');
            });
        }

        // sliders
        if($(".swiper").length > 0){
            $.getScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.3.0/swiper-bundle.js", function(){
                $(".swiper").each(function() {
                    let swiper;
                    let _this = $(this),
                        container = _this.find(".swiper-container");
                    if (_this.hasClass("article-slider")) {
                        swipes = new Swiper(container.prevObject[0], {
                            speed: 1500,
                            slidesPerView: 1,
                            spaceBetween: 20,
                            autoHeight: true,
                            loop: true,
                            effect: 'fade',
                            fadeEffect: {
                                crossFade: true
                            },
                            autoplay: {
                                delay: 5000,
                            },
                            navigation: {
                                nextEl: $('.article-slider_btns').find(".swiper-button-next")[0],
                                prevEl: $('.article-slider_btns').find(".swiper-button-prev")[0]
                            },
                            pagination: {
                                el: $(this).find(".swiper-pagination")[0],
                            },
                        });
                    }
                    if (_this.hasClass("slider-blog")) {
                        swipes = new Swiper(container.prevObject[0], {
                            speed: 1500,
                            slidesPerView:4,
                            spaceBetween: 30,
                            centeredSlides: true,
                            loop: false,
                            navigation: {
                                nextEl: $('.slider-blog_btns').find(".swiper-button-next")[0],
                                prevEl: $('.slider-blog_btns').find(".swiper-button-prev")[0]
                            },
                            breakpoints: {
                                0: {
                                    slidesPerView: 1,
                                    centeredSlides: false,
                                },
                                550: {
                                    slidesPerView: 2,
                                    centeredSlides: false,
                                },
                                1035: {
                                    slidesPerView: 2,
                                    centeredSlides: false,
                                },
                                1100: {
                                    slidesPerView: 3,
                                    centeredSlides: false,
                                },
                                1380: {
                                    slidesPerView: 4,

                                }
                            }
                        });
                        if(window.innerWidth < 768 || swipes.slides.length <= 3){
                            container.prevObject[0].classList.add('destroyed_slider');
                            $('.slider-blog_btns').classList.add('destroyed_slider');
                            swipes.destroy();
                        }
                    }
                    document.querySelectorAll('.swiper-slide, .swiper-slide-duplicate').forEach(element => {
                        element.addEventListener('mousemove', function(e){
                            cursorinner.style.display = `none`;
                        });
                        element.addEventListener('mouseleave', function(e){
                            cursorinner.style.display = `block`;
                        });
                    });
                });
            });
        }

        if($(".insert_section").length > 0){
            $.getScript("https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js", function(){
                $.getScript("https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js", function(){
                    $('.insert_section span').counterUp({
                        delay: 20,
                        time: 2000
                    });
                });
            });

        }

    });
});
