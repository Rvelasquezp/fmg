const accordionContainers = document.querySelectorAll(".accordion-container");

if (accordionContainers.length > 0) {
	for (let accordionContainer of accordionContainers) {
		const accordions = accordionContainer.querySelectorAll(".accordion");
		const menu = accordionContainer.querySelector(".accordionMenu");

		const animations = [];
		const buttons = [];

		if (accordions.length > 0) {
			for (let accordion of accordions) {
				const svg = accordion.querySelector(".svgSwitcher svg");
				const button = document.createElement("button");
				createAnimation(accordion, button, animations);
				button.classList.add("accordionButton");
				button.appendChild(svg);
				button.addEventListener("click", () => toggleAnimation(accordion, animations, buttons));
				menu.appendChild(button);
				buttons.push(button);
			}
			toggleAnimation(accordions[0], animations, buttons, true);
		}

		function toggleAnimation(menu, animations, buttons, first = false) {
			// Save the current state of the clicked animation
			if (menu.animation.reversed() || first) {
				const selectedReversedState = menu.animation.reversed();

				// Reverse all animations
				animations.forEach((animation) => animation.reverse());
				buttons.forEach((button) => {
					button.classList.remove("active");
				});

				// Set the reversed state of the clicked accordion element to the opposite of what it was before
				menu.animation.reversed(!selectedReversedState);
			}
		}

		function createAnimation(element, button, animations) {
			const box = element;

			gsap.set(box, { height: "auto" });

			// Keep a reference to the animation on the menu item itself
			const tween = gsap.from(box, {
				height: 0,
				paddingTop: 0,
				paddingBottom: 0,
				duration: 0.5,
				ease: "power1.inOut",
				reversed: true,
				onStart: () => {
					button.classList.add("active");
				},
			});

			box.animation = tween;
			animations.push(tween);
		}
	}
}
