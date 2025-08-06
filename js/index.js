gsap.to("html", {
	autoAlpha: 1,
});

// filter mongolfier by ricardo
let filterValuesMontgolfieres = document.querySelectorAll(
	".gallery-container select"
);

for (let filter of filterValuesMontgolfieres) {
	filter.addEventListener("change", function () {
		let cat = document.getElementById("montgolfiere_cat").value;

		let tax_query = [];

		if (cat != "") {
			tax_query.push({
				taxonomy: "montgolfiere_cat",
				field: "term_id",
				terms: parseInt(cat),
			});
		}

		const data = new FormData();
		data.append("action", "montgolfieresFilter");
		data.append("tax_query", JSON.stringify(tax_query));
		data.append("post_type", "montgolfiere");

		const options = {
			method: "POST",
			body: data,
		};

		fetch("/wp-admin/admin-ajax.php", options)
			.then((res) => res.text())
			.then((data) => {
				let content = JSON.parse(data);
				console.log(content);
				document.querySelector(".gallery-container #lightgallery").innerHTML =
					"";

				if (window.innerWidth > 960) {
					if (
						content.data === "Aucune montgolfiere disponible avec ces filtres"
					) {
						document.querySelector(
							".gallery-container #lightgallery"
						).style.display = "block";
					} else {
						document.querySelector(
							".gallery-container #lightgallery"
						).style.display = "grid";
					}
				}

				document.querySelector(".gallery-container #lightgallery").innerHTML +=
					content.data;
				gsap.from(".gallery-container #lightgallery .gallery-item", {
					opacity: 0,
					y: -40,
					stagger: 0.25,
				});
				lightGallery(document.getElementById("lightgallery"), {
					plugins: [lgZoom],
					showZoomInOutIcons: true,
					licenseKey: "48F51181-53794021-89928430-5C930105",
					speed: 500,
				});
			})
			.catch((err) => console.log(err));
	});
}

gsap.registerPlugin(ScrollToPlugin);

let scrollValuesMont = document.querySelectorAll("#smooth_scroll");

for (let scroll of scrollValuesMont) {
	scroll.addEventListener("change", function () {
		let link =
			document.querySelector(document.getElementById("smooth_scroll").value)
				.offsetTop - 150;

		gsap.to(window, { duration: 1, scrollTo: link });
	});
}
// code monfolgier filter by ricardo

const overlayMenuTimeline = gsap.timeline({ paused: true });

overlayMenuTimeline.to(".overlayMenu", {
	xPercent: -100,
});

overlayMenuTimeline.to(
	"#header-closed-navigation",
	{
		display: "none",
	},
	"<-0.4"
);

overlayMenuTimeline.to(
	"#header-open-navigation",
	{
		display: "block",
	},
	">"
);

if (window.innerWidth > 1000) {
	const overlayMenuItems = gsap.utils.toArray("#overlay-main-navigation li");

	overlayMenuTimeline.to(
		overlayMenuItems,
		{
			opacity: "1",
			stagger: 0.01,
		},
		"<0.2"
	);
} else {
	overlayMenuTimeline.to(
		"header .overlayMenu nav li",
		{
			opacity: "1",
		},
		"<0.2"
	);

	overlayMenuTimeline.to(
		"header .overlayMenu .socialMediaMobile .eachMobileSocial",
		{
			opacity: "1",
			x: 0,
		},
		"<0.2"
	);
}

const menuItemsWithSub = document.querySelectorAll(
	"#overlay-main-navigation .menu-item-has-children"
);

if (menuItemsWithSub.length > 0) {
	for (let item of menuItemsWithSub) {
		item.querySelector("a").innerHTML =
			item.querySelector("a").innerHTML +
			'<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.86 43.82"><g id="Isolation_Mode" data-name="Isolation Mode"><path fill="#fff" d="M3.01,43.82c-.67,0-1.34-.22-1.9-.68-1.29-1.04-1.48-2.94-.43-4.22l14.36-17.6L2.29,4.83c-1.02-1.31-.77-3.2.54-4.21,1.31-1.02,3.2-.76,4.21.54l14.19,18.38c.86,1.1.83,2.65-.05,3.73l-15.87,19.44c-.57.74-1.44,1.11-2.31,1.11h0Z"/></g></svg>';

		item.querySelector("a").addEventListener("click", () => {
			let remove = document.querySelector(
				"#overlay-main-navigation .menu-item-has-children.openSub"
			);

			if (remove && remove != item) {
				remove.classList.remove("openSub");
			}

			item.classList.toggle("openSub");
		});
	}
}

const menuToggle = document.querySelector("button.openMenu");
const mobileMenuToggle = document.querySelector("button.menu-toggle");
var defaultHero = document.querySelector(
	".entry-content > section:first-of-type"
);
var headerHeight = document.querySelector(".site-header").clientHeight;

menuToggle.addEventListener("click", toggleMenu);
mobileMenuToggle.addEventListener("click", toggleMenu);

function toggleMenu() {
	let banner = document.querySelector(".bannerDiv");
	this.classList.toggle("open");
	document.querySelector("header#masthead").classList.toggle("open");
	if (this.classList.contains("open")) {
		if (this.querySelector("span.title") != null) {
			this.querySelector("span.title").innerHTML = menuVars.open;
		}
		overlayMenuTimeline.play();
		if (banner != null) {
			gsap.to(banner, {
				marginTop: "-100",
			});
		}
		document.querySelector(".site-header").classList.remove("scrolled");
	} else {
		if (this.querySelector("span.title") != null) {
			this.querySelector("span.title").innerHTML = menuVars.closed;
		}
		gsap.set(banner, { clearProps: "marginTop" });
		overlayMenuTimeline.reverse();
		if (defaultHero.classList.contains("default-hero")) {
			if (
				document.documentElement.scrollTop >=
				defaultHeroHeight - headerHeight
			) {
				document.querySelector(".site-header").classList.add("scrolled");
			}
		} else {
			if (document.documentElement.scrollTop >= 10) {
				document.querySelector(".site-header").classList.add("scrolled");
			}
		}
	}
}

//Share buttons
const allShareButtons = document.querySelectorAll(".share");

let share_btn_state = false;

for (let button of allShareButtons) {
	button.addEventListener("click", function () {
		if (share_btn_state) {
			gsap.to(".share-button-wrapper", {
				height: "3em",
				padding: 0,
			});

			share_btn_state = false;
		} else {
			gsap.to(".share-button-wrapper", {
				height: "auto",
				padding: "4em 0 2em 0",
			});

			share_btn_state = true;
		}
	});
}

if (defaultHero.classList.contains("default-hero")) {
	var defaultHeroHeight = defaultHero.clientHeight;

	var sibling = defaultHero.nextElementSibling;

	// sibling.style.marginTop = defaultHeroHeight + "px";

	window.addEventListener("scroll", function () {
		if (
			document.documentElement.scrollTop >=
			defaultHeroHeight - headerHeight
		) {
			document.querySelector(".site-header").classList.add("scrolled");
		} else {
			document.querySelector(".site-header").classList.remove("scrolled");
		}
	});
} else {
	window.addEventListener("scroll", function () {
		if (document.documentElement.scrollTop >= 10) {
			document.querySelector(".site-header").classList.add("scrolled");
		} else {
			document.querySelector(".site-header").classList.remove("scrolled");
		}
	});
}

// popup

if (document.querySelector(".mainPopup") != null) {
	var popupTlMain = gsap.timeline();

	popupTlMain.to(".subscribe-popup.mainPopup", {
		pointerEvents: "all",
		opacity: 1,
	});

	var closePopupMain = document.querySelector(".mainPopup .close-popup");

	closePopupMain.addEventListener("click", function (e) {
		e.preventDefault();
		popupTlMain.reverse();
	});
}

var popupTl = gsap.timeline();

popupTl.to(".subscribe-popup.newsletter", {
	pointerEvents: "all",
	opacity: 1,
});

popupTl.pause();

var popupTriggers = document.querySelectorAll("#popup");

popupTriggers.forEach((x) => {
	x.addEventListener("click", function (e) {
		e.preventDefault();

		popupTl.play();
	});
});

var closePopup = document.querySelectorAll(".close-popup");

closePopup.forEach((x) => {
	x.addEventListener("click", function (e) {
		e.preventDefault();

		popupTl.reverse();
	});
});

var body = document.querySelector(".subscribe-popup");
var except = document.querySelector(".footer-popup");

body.addEventListener(
	"click",
	function () {
		popupTl.reverse();
	},
	false
);
except.addEventListener(
	"click",
	function (ev) {
		// alert("except");
		ev.stopPropagation(); //this is important! If removed, you'll get both alerts
	},
	false
);

let closeButton = document.querySelector("#closeBanner");

if (closeButton != null) {
	closeButton.addEventListener("click", function () {
		let bannerClasses = document.querySelectorAll(".withBanner");
		var elem = document.querySelector(".bannerDiv");
		elem.parentNode.removeChild(elem);
		for (let e of bannerClasses) {
			e.classList.remove("withBanner");
		}
	});
}
