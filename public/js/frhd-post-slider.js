(function ($) {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {

		var getSliderDataObj = $('[data-side="front"]').data('params');

		$('div[id^="frhd-sl-block-"]').each(function () {

			var _this = $(this);
			var sliderID = _this.attr('id');
			new Splide('#' + sliderID, {
				start: getSliderDataObj.start,
				perPage: getSliderDataObj.perPage,
				gap: Number(getSliderDataObj.gap),
				perMove: getSliderDataObj.perMove,
				autoplay: getSliderDataObj.autoplay,
				speed: getSliderDataObj.speed,
				interval: getSliderDataObj.interval,
				rewind: getSliderDataObj.rewind,
				arrows: getSliderDataObj.arrows,
				drag: getSliderDataObj.drag,
				pauseOnHover: getSliderDataObj.pauseOnHover,
				direction: getSliderDataObj.direction,
				padding: {left: 5},
				breakpoints: {
					920: {
						perPage: 3,
					},
					767: {
						perPage: 2,
					},
					599: {
						perPage: 1,
					},
				}
			}).mount();
		});
	});

})(jQuery);
