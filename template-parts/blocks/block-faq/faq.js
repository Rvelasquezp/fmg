const questions = document.querySelectorAll(".question-answer");

questions.forEach(function (question) {
	let tl = gsap.timeline({
		paused: true,
		reversed: true,
	});
	tl.to(question, {
		background: "#20255e",
	});
	tl.from(question.querySelector("button.question div"), { opacity: 0 }, "<");
	tl.to(
		question.querySelector(".answer"),
		{
			height: 0,
		},
		"<"
	);

	tl.to(
		question.querySelector(".answer"),
		{
			marginTop: 0,
			marginBottom: 0,
		},
		"<"
	);

	tl.play();

	question.addEventListener("click", function () {
		tl.reversed() ? tl.play() : tl.reverse();
		this.classList.toggle("open");
	});
});

if (document.querySelector(".faq-search") != null) {
	let filter = Array.prototype.filter,
		categories = document.querySelectorAll(".faq-search .faqCategory"),
		faqs = document.querySelectorAll(".faq-search .question-answer");
	document
		.querySelector(".selectFilter select")
		.addEventListener("change", function () {
			let currentCategory = this.value;
			filter.call(categories, function (node) {
				if (currentCategory != "") {
					node.classList.remove("hide");
					if (node.dataset.id != currentCategory) {
						node.classList.add("hide");
					}
				} else {
					if (node.querySelector(".question-answer:not(.hide)") != null) {
						node.classList.remove("hide");
					}
				}
			});
		});

	if (document.querySelector(".faq-search input.myInput") != null) {
		document
			.querySelector(".searchFaq input.myInput")
			.addEventListener("keyup", function () {
				let value = this.value;
				filter.call(faqs, function (node) {
					if (value != "") {
						node.classList.remove("hide");
						if (
							document.querySelector(".faqSearchSection .selectFilter select")
								.value == ""
						) {
							for (let category of categories) {
								category.classList.remove("hide");
							}
						}
						if (
							!node.innerText
								.toLowerCase()
								.normalize("NFD")
								.replace(/\p{Diacritic}/gu, "")
								.includes(
									value
										.toLowerCase()
										.normalize("NFD")
										.replace(/\p{Diacritic}/gu, "")
								)
						) {
							node.classList.add("hide");
							if (
								document.querySelector(".faqSearchSection .selectFilter select")
									.value == ""
							) {
								filter.call(categories, function (node) {
									if (
										node.querySelector(".question-answer:not(.hide)") == null
									) {
										node.classList.add("hide");
									}
								});
							}
						}
					} else {
						node.classList.remove("hide");
						if (
							document.querySelector(".faqSearchSection .selectFilter select")
								.value == ""
						) {
							for (let category of categories) {
								category.classList.remove("hide");
							}
						}
					}
				});
			});
	}
}
