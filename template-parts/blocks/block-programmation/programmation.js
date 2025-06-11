let filterValuesProgrammation = document.querySelectorAll(".eachFilter select");

for (let filter of filterValuesProgrammation) {
	filter.addEventListener("change", updatePrograms);
}

const queryString = window.location.search;

if (queryString != "") {
	const urlParams = new URLSearchParams(queryString);
	const params = urlParams.entries();
	let paramArray = [];
	for (let entry of params) {
		paramArray.push(entry);
	}
	onLoadProgram(paramArray);
}
function onLoadProgram(params) {
	for (let param of params) {
		console.log(param);
		document.querySelector("select." + param[0]).value = param[1];
	}
	updatePrograms();
}

function updatePrograms() {
	let date = document.getElementById("days").value;
	let scene = document.getElementById("scenes").value;
	let style = document.getElementById("styles").value;

	let tax_query = [];

	if (scene != "") {
		tax_query.push({
			taxonomy: "event_scene",
			field: "term_id",
			terms: parseInt(scene),
		});
	}

	if (style != "") {
		tax_query.push({
			taxonomy: "event_style",
			field: "term_id",
			terms: parseInt(style),
		});
	}

	if (date != "") {
		tax_query.push({
			taxonomy: "event_date",
			field: "term_id",
			terms: parseInt(date),
		});
	}

	const data = new FormData();
	data.append("action", "contentFilter");
	data.append("tax_query", JSON.stringify(tax_query));
	data.append("post_type", "programmation");

	const options = {
		method: "POST",
		body: data,
	};

	fetch("/wp-admin/admin-ajax.php", options)
		.then((res) => res.text())
		.then((data) => {
			let content = JSON.parse(data);
			document.querySelector(".galleryActivities").innerHTML = "";

			if(window.innerWidth > 960) {
				if(content.data === 'Aucun programme disponible avec ces filtres') {
					document.querySelector(".galleryActivities").style.display = 'block';
				} else {
					document.querySelector(".galleryActivities").style.display = 'grid';
				}
			}

			document.querySelector(".galleryActivities").innerHTML += content.data;
			gsap.from(".galleryActivities .imageContent", {
				opacity: 0,
				y: -40,
				stagger: 0.25,
			});
		})
		.catch((err) => console.log(err));
}
