let filterValues = document.querySelectorAll(".eachFilter select");

for (let filter of filterValues) {
	filter.addEventListener("change", function () {
		let date = filter.closest('.filterActivities').querySelector("#days").value;
		let age = filter.closest('.filterActivities').querySelector("#age").value;
		let categories = filter.closest('.filterActivities').getAttribute('data-cat');
		let tax_query = [];

		if (age != "") {
			tax_query.push({
				taxonomy: "age_group",
				field: "term_id",
				terms: parseInt(age),
			});
		}

		if (date != "") {
			tax_query.push({
				taxonomy: "event_date",
				field: "term_id",
				terms: parseInt(date),
			});
		}
		
		if (categories != null) {
			tax_query.push({
				taxonomy: "activity_category",
				field: "term_id",
				terms: JSON.parse(categories),
			});
		}
		
		const data = new FormData();
		data.append("action", "contentFilter");
		data.append("tax_query", JSON.stringify(tax_query));
		data.append("post_type", "activity");
		const options = {
			method: "POST",
			body: data,
		};

		fetch("/wp-admin/admin-ajax.php", options)
			.then((res) => res.text())
			.then((data) => {
				let content = JSON.parse(data);
				console.log(content)
				filter.closest('.filterActivities').querySelector(".galleryActivities").innerHTML = "";

				if(window.innerWidth > 960) {
					if(content.data === 'Aucune activité disponible avec ces filtres') {
						filter.closest('.filterActivities').querySelector(".galleryActivities").style.display = 'block';
					} else {
						filter.closest('.filterActivities').querySelector(".galleryActivities").style.display = 'grid';
					}
				}
				
				filter.closest('.filterActivities').querySelector(".galleryActivities").innerHTML += content.data;
				gsap.from(filter.closest('.filterActivities').querySelector(".galleryActivities .imageContent"), {
					opacity: 0,
					y: -40,
					stagger: 0.25,
				});
			})
			.catch((err) => console.log(err));
	});
}
