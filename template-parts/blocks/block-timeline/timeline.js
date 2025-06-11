var swiper2Timeline = new Swiper(".timeline-slider-holder", {
	spaceBetween: 10,
	autoHeight: true,
	slidesPerView: 1,
	simulateTouch: false,
	effect: 'fade',
	fadeEffect: {
		crossFade: true
	},
	// thumbs: {
	// 	swiper: swiper,
	// },
});

var swiperTimeline = new Swiper(".timeline-slider-years", {
	loop: true,
	spaceBetween: 10,
	slideToClickedSlide: true,
	slidesPerView: 1,
	on: {
		slideChange: function (swiper) {
			swiper2Timeline.slideTo(swiper.realIndex)
		},
	},
	navigation: {
		nextEl: ".timeline-slider-nav-next",
	},
	// watchSlidesProgress: true,
	breakpoints: {

		600: {
			slidesPerView: 4,
			spaceBetween: 40
		},
		1000: {
			slidesPerView: 5,
			spaceBetween: 40
		},
		// when window width is >= 480px
		1400: {
		  slidesPerView: 6,
		  spaceBetween: 70
		},
		// when window width is >= 640px
		1700: {
		  slidesPerView: 7,
		  spaceBetween: 90
		}
	}
});


// swiper[0].controller.control = swiper2;
// swiper2[0].controller.control = swiper;