if (window.innerWidth >= 760) {
	const swiper = new Swiper(".sliderAboutActivities", {
		// Optional parameters
		direction: "horizontal",
		slidesPerView: 1,
		loop: true,
		speed: 1000,
		autoplay: {
			delay: 2000,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});
}

//animation

let ballonsClouds = document.querySelector(".slider-about-activities");
let cloudTop = ballonsClouds.querySelector(".cloudTop");
let cloudBottom = ballonsClouds.querySelector(".cloudBottom");
let bigBallon = ballonsClouds.querySelector(".bigBallon");
let mediumBallon = ballonsClouds.querySelector(".mediumBallon");
let smallBallon = ballonsClouds.querySelector(".smallBallon");
let ballonsCloudsAnimation = gsap.timeline();
ballonsCloudsAnimation.to(
	cloudTop,
	{
		duration: 2,
		x: "-=20",
		yoyo: true,
		repeat: -1,
		ease: "power1.inOut",
	},
	">"
);

ballonsCloudsAnimation.to(
	bigBallon,
	{
		duration: 2,
		y: "+=20",
		yoyo: true,
		repeat: -1,
		ease: "power1.inOut",
	},
	">"
);

ballonsCloudsAnimation.to(
	cloudBottom,
	{
		duration: 2,
		x: "-=20",
		yoyo: true,
		repeat: -1,
		ease: "power1.inOut",
	},
	">"
);

ballonsCloudsAnimation.to(
	mediumBallon,
	{
		duration: 2,
		y: "-=20",
		yoyo: true,
		repeat: -1,
		ease: "power1.inOut",
	},
	">"
);
ballonsCloudsAnimation.to(
	smallBallon,
	{
		duration: 2,
		y: "-=20",
		yoyo: true,
		repeat: -1,
		ease: "power1.inOut",
	},
	">"
);
