var figures = document.querySelectorAll('.image-gallery figure');

figures.forEach(figure => {

  	var src = figure.querySelector("img").dataset.src;
		
	var a = document.createElement('a');
	a.setAttribute('href', src);
	a.setAttribute('data-src', src);
	  
	var target = figure.querySelector("img");

	target.parentNode.replaceChild(a, target); 
	a.appendChild(target);

});


lightGallery(document.querySelector(".image-gallery .gallery-container"), {
  plugins: [lgThumbnail],
  licenseKey: "48F51181-53794021-89928430-5C930105",
  speed: 500,
	exThumbImage: "data-src",
	selector: "a"
});