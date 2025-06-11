const swiperProgram = new Swiper(".programSlider", {
	// Optional parameters
	slidesPerView: 1,
	loop: true,
	spaceBetween: 5,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	speed: 1000,
	autoplay: {
		delay: 6000,
	},
	breakpoints: {
		480: {},
		760: {
			spaceBetween: 5,
			slidesPerView: 2,
		},
		960: {
			spaceBetween: 10,
			slidesPerView: 2,
		},
		1400: {
			spaceBetween: 19,
			slidesPerView: 2,
		},
	},
});

//svg animation
let sliderSvg = document.querySelector(".program-slider");
let ballonTop = sliderSvg.querySelector(".programSlideImageTop");
let ballonBottom = sliderSvg.querySelector(".programSlideImageBottom");

let sliderSvgAnimation = gsap.timeline();
sliderSvgAnimation.to(
	ballonTop,
	{
		duration: 2,
		y: "-=30",
		yoyo: true,
		repeat: -1,
		ease: "power1.inOut",
	},
	">"
);

// sliderSvgAnimation.to(
//   ballonBottom,
//   {
//     duration: 2,
//     y: "+=10",
//     yoyo: true,
//     repeat: -1,
//     ease: "power1.inOut",
//   },
//   "y"
// );

gsap.to(".programSlideImageBottom svg", {
	yPercent: -100,
	ease: "none",
	scrollTrigger: {
		trigger: ".programSlideImageBottom svg",
		// start: "top bottom", // the default values
		// end: "bottom top",
		scrub: true,
	},
});

gsap.to(".fmgAnimate", {
	y: 100,
	repeat: -1,
	yoyo: true,
	duration: 5,
	ease: "none",
});
