const swiperAct = new Swiper(".swiper-activities", {
	// Optional parameters
	direction: "horizontal",
	slidesPerView: 'auto',
	loop: true,
	spaceBetween: 10,
	speed: 1000,
	// autoplay: {
	// 	delay: 2000,
	// },
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	breakpoints: {
		760: {
			spaceBetween: 15,
		},
		960: {
			spaceBetween: 20,
		},
		1400: {
			spaceBetween: 28,
		},
	},
});
