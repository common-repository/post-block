(function ($) {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        $('.frhd-slider-root').each(function () {

            var _this = $(this);

            var width = _this.data('width'),
                height = _this.data('height'),
                type = _this.data('type'),
                start = _this.data('start'),
                perPage = _this.data('perpage'),
                gap = _this.data('gap'),
                perMove = _this.data('perMove'),
                autoplay = _this.data('autoplay'),
                autoScrollVar = _this.data('autoscroll'),
                interval = _this.data('interval'),
                rewind = _this.data('rewind'),
                speed = _this.data('speed'),
                padding = _this.data('padding'),
                arrows = _this.data('arrows'),
                pagination = _this.data('pagination'),
                drag = _this.data('drag'),
                focus = _this.data('focus'),
                pauseOnHover = _this.data('pauseOnHover'),
                lazyLoad = _this.data('lazyLoad'),
                preloadPages = _this.data('preloadPages'),
                wheel = _this.data('wheel'),
                keyboard = _this.data('keyboard'),
                direction = _this.data('direction'),
                breakpoints = _this.data('breakpoints');

            var sliderID = _this.attr('id');
            var splideOptions = {
                classes: {
                    // Add classes for arrows.
                    arrows: 'splide__arrows frhd-class-arrows',
                    arrow: 'splide__arrow frhd-class-arrow',
                    prev: 'splide__arrow--prev frhd-class-prev',
                    next: 'splide__arrow--next frhd-class-next',

                    // Add classes for pagination.
                    pagination: 'splide__pagination frhd-class-pagination', // container
                    page: 'splide__pagination__page frhd-class-page', // each button
                },
                width     : width,
                height    : height,
                perPage   : perPage,
                gap       : gap,
                arrows    : arrows,
                pagination: pagination,
                type      : autoScrollVar ? 'loop' : type,
                drag      : autoScrollVar ? 'free' : drag,
                focus     : autoScrollVar ? 'center' : focus,
                direction : direction,
                autoScroll: {
                    speed: 1,
                },
                breakpoints: {
                    640: {
                        perPage: 1,
                        padding: 0,
                    },
                }
            };
        
            // Conditionally add AutoScroll extension
            if (autoScrollVar) {
                
                new Splide('#' + sliderID + '>div', splideOptions).mount(window.splide.Extensions);
            } else {

                new Splide('#' + sliderID + '>div', splideOptions).mount();
            }
        });
    });

})(jQuery);