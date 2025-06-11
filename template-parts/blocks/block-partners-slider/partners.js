let totalPartners;
const swiperPartenrs = new Swiper(".swiper-partners", {
	// Optional parameters
	direction: "horizontal",
	slidesPerView: 3,
	loop: true,
	spaceBetween: 30,
	speed: 1000,
	autoplay: {
		delay: 2000,
	},
	breakpoints: {
		480: {
			spaceBetween: 30,
			slidesPerView: 4,
		},
		760: {
			spaceBetween: 40,
			slidesPerView: 5,
		},
		960: {
			slidesPerView: 6,
			spaceBetween: 50,
		},
	},
	on: {
		beforeInit: function(swiper){
			totalPartners = swiper.$wrapperEl[0].children.length;
		},
		init: function(swiper){
			if(totalPartners < swiper.params.slidesPerView){
				swiper.loopDestroy();
				swiper.disable();
			}
		}
	}
});
