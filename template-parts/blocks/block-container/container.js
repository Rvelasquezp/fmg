const allContainers = document.querySelectorAll("section.container");

for (let container of allContainers) {
	if (container.classList.contains("style-1")) {
		let character = container.querySelector(".leftCharacter");
		let cloud = container.querySelector(".leftCloudTop");
		let leftCloudBottom = container.querySelector(".leftCloudBottom");
		let rightCloud = container.querySelector(".rightCloud");
		let rightParachute = container.querySelector(".rightParachute");
		let ballonCloudAnimation = gsap.timeline();
		ballonCloudAnimation.to(
			rightParachute,
			{
				duration: 2,
				y: "+=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);

		ballonCloudAnimation.to(
			character,
			{
				duration: 2,
				y: "+=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);

		ballonCloudAnimation.to(
			leftCloudBottom,
			{
				duration: 2,
				x: "-=20",
				y: "+=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);

		ballonCloudAnimation.to(
			cloud,
			{
				duration: 2,
				y: "+=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);

		ballonCloudAnimation.to(
			rightCloud,
			{
				duration: 2,
				x: "+=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);
	}
	if (container.classList.contains("style-6")) {
		//animation style 2
		let cloudTop = container.querySelector(".style-nuage img");
		let cloudBottom = container.querySelector(".style-nuage-2 img");
		let ballonCloudAnimation = gsap.timeline();

		ballonCloudAnimation.to(
			cloudTop,
			{
				duration: 4,
				x: "-=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);

		ballonCloudAnimation.to(
			cloudBottom,
			{
				duration: 4,
				x: "-=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);
	}
	if (container.classList.contains("style-2")) {
		//animation style 2
		let cloudTop = container.querySelector(".cloudTop");
		let cloudBottom = container.querySelector(".cloudBottom");
		let bigBallon = container.querySelector(".bigBallon");
		let mediumBallon = container.querySelector(".mediumBallon");
		let smallBallon = container.querySelector(".smallBallon");
		let ballonCloudAnimation = gsap.timeline();

		ballonCloudAnimation.to(
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

		ballonCloudAnimation.to(
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

		ballonCloudAnimation.to(
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

		ballonCloudAnimation.to(
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
		ballonCloudAnimation.to(
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
	}

	if (container.classList.contains("style-3")) {
		let contactCloud = container.querySelector(".contactCloud");
		let contactBallon = container.querySelector(".contactBallon");

		let ballonCloudAnimation = gsap.timeline();
		ballonCloudAnimation.to(
			contactCloud,
			{
				duration: 2,
				x: "+=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);

		ballonCloudAnimation.to(
			contactBallon,
			{
				duration: 2,
				y: "+=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);
	}

	if (container.classList.contains("style-4")) {
		let contactCloud = container.querySelector(".contactCloud");
		let contactBallon = container.querySelector(".bigBallon");
		let contactBallon2 = container.querySelector(".smallBallon");

		let ballonCloudAnimation = gsap.timeline();
		ballonCloudAnimation.to(
			contactCloud,
			{
				duration: 2,
				x: "+=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);

		ballonCloudAnimation.to(
			contactBallon,
			{
				duration: 2,
				y: "+=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);

		ballonCloudAnimation.to(
			contactBallon2,
			{
				duration: 2,
				y: "-=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			"<"
		);
	}

	if (container.classList.contains("style-5")) {
		let contactCloud = container.querySelector(".contactCloud");
		let contactBallon = container.querySelector(".bigBallon");
		let contactBallon2 = container.querySelector(".smallBallon");

		let ballonCloudAnimation = gsap.timeline();
		ballonCloudAnimation.to(
			contactCloud,
			{
				duration: 2,
				x: "+=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);

		ballonCloudAnimation.to(
			contactBallon,
			{
				duration: 2,
				y: "+=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			">"
		);

		ballonCloudAnimation.to(
			contactBallon2,
			{
				duration: 2,
				y: "-=20",
				yoyo: true,
				repeat: -1,
				ease: "power1.inOut",
			},
			"<"
		);
	}
}
