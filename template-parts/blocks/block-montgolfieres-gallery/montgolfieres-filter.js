let filterValuesMontgolfieres = document.querySelectorAll(".gallery-container select");

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
				console.log(content)
				document.querySelector(".gallery-container #lightgallery").innerHTML = "";

				if(window.innerWidth > 960) {
					if(content.data === 'Aucune montgolfiere disponible avec ces filtres') {
						document.querySelector(".gallery-container #lightgallery").style.display = 'block';
					} else {
						document.querySelector(".gallery-container #lightgallery").style.display = 'grid';
					}
				}
				
				document.querySelector(".gallery-container #lightgallery").innerHTML += content.data;
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

		let link = document.querySelector(document.getElementById("smooth_scroll").value).offsetTop - 150;

		gsap.to(window, {duration: 1, scrollTo: link});

	});
}
