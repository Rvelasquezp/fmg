const blogSelect = document.querySelector(".selectCategory select");

blogSelect.addEventListener("change", function () {
	let value = this.value;

	const data = new FormData();
	data.append("action", "getPosts");
	data.append("category", value);

	blogPostsCall(data);
});

function blogPostsCall(data) {
	const options = {
		method: "POST",
		body: data,
	};

	fetch("/wp-admin/admin-ajax.php", options)
		.then((res) => res.text())
		.then((data) => {
			let content = JSON.parse(data);
			removePosts();
			document.querySelector(".allInfoBlog").innerHTML = content.data;
			gsap.from(".allInfoBlog .eachInfoBlogGrid", {
				opacity: 0,
				y: -40,
				stagger: 0.25,
			});
		})
		.catch((err) => console.log(err));
}

function removePosts() {
	let allElements = document.querySelectorAll(".allInfoBlog article");
	for (let elem of allElements) {
		elem.parentNode.removeChild(elem);
	}
}
