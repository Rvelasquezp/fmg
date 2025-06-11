let targets = gsap.utils.toArray([
	document.querySelector("section.hero-section .heroSection .content > h1"),
	document.querySelector("section.hero-section .heroSection .content > div"),
	document.querySelectorAll("section.hero-section .heroSection > #moon"),
	document.querySelectorAll("section.hero-section .heroSection > #baloune"),
	document.querySelectorAll("section.hero-section .heroSection > #ship"),
]);

const stars = gsap.utils.toArray([
	document.querySelectorAll("section.hero-section #etoile"),
	document.querySelectorAll("section.hero-section #etoilegrosse"),
]);

const baloons = gsap.utils.toArray([
	document.querySelectorAll("section.hero-section #baloune"),
]);

const timeline1 = gsap.timeline();

timeline1.to(targets, {
	y: 0,
	opacity: 1,
	stagger: 0.1,
});

const letterTm = gsap.timeline();

if (window.innerWidth > 960) {
	letterTm.to(
		document.querySelector("section.hero-section .f"),
		{
			repeat: -1,
			yoyo: true,
			duration: 8,
			y: -40,
		},
		"<"
	);
} else {
	letterTm.to(
		document.querySelector("section.hero-section .f"),
		{
			repeat: -1,
			yoyo: true,
			duration: 7,
			y: 20,
		},
		"<"
	);
}

if (window.innerWidth > 960) {
	letterTm.to(
		document.querySelector("section.hero-section .m"),
		{
			repeat: -1,
			yoyo: true,
			duration: 8,
			y: -70,
		},
		"<"
	);
} else {
	letterTm.to(
		document.querySelector("section.hero-section .m"),
		{
			repeat: -1,
			yoyo: true,
			duration: 7,
			y: 30,
		},
		"<"
	);
}

if (window.innerWidth > 960) {
	letterTm.to(
		document.querySelector("section.hero-section .g"),
		{
			repeat: -1,
			yoyo: true,
			duration: 8,
			y: -60,
		},
		"<"
	);
} else {
	letterTm.to(
		document.querySelector("section.hero-section .g"),
		{
			repeat: -1,
			yoyo: true,
			duration: 7,
			y: 20,
		},
		"<"
	);
}

const timeline2 = gsap.timeline();

timeline2.to(baloons, {
	repeat: -1,
	duration: 5,
	yoyo: true,
	y: 0,
	stagger: 0.1,
});

const timeline3 = gsap.timeline();

timeline3.fromTo(
	stars,
	{
		repeat: -1,
		duration: 0.5,
		yoyo: true,
		opacity: 1,
		scale: 1,
		stagger: {
			from: "random",
			amount: 0.6,
		},
	},
	{
		repeat: -1,
		duration: 0.5,
		yoyo: true,
		opacity: 0,
		scale: 0.8,
		stagger: {
			from: "random",
			amount: 0.6,
		},
	}
);
