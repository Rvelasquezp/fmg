let totalGuests;
const guestsSwiper = new Swiper(".swiper-guests", {
  // Optional parameters
  direction: "horizontal",
  slidesPerView: 1,
  loop: true,
  spaceBetween: 10,
  speed: 1000,
  autoplay: {
    delay: 2000,
  },
  breakpoints: {
    480: {},
    760: {
      spaceBetween: 15,
      slidesPerView: 2,
    },
    960: {
      spaceBetween: 20,
      slidesPerView: 3,
    },
    1400: {
      spaceBetween: 47,
      slidesPerView: 3,
    },
  },
	on: {
		beforeInit: function(swiper){
			totalGuests = swiper.$wrapperEl[0].children.length;
		},
		init: function(swiper){
			if(totalGuests < swiper.params.slidesPerView){
				swiper.loopDestroy();
				swiper.disable();
			}
		}
	}
});
