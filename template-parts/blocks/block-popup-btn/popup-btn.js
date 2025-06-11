var fileBtn = document.querySelector('.attachment .wpcf7-form-control');

fileBtn.addEventListener("change", function() {
	gsap.to(fileBtn, {
		zIndex: 1
	})
})


// popup

var popupT2 = gsap.timeline();

function popUpOpen(popup) {
    popupT2.to(popup, {
        pointerEvents: 'all',
        opacity: 1
    })
}

popupT2.pause();

var popupTrigger = document.querySelectorAll('.popup-btn'); 

popupTrigger.forEach(tr => {
    
    tr.addEventListener('click', function(e) {

        e.preventDefault();

        if(tr.classList.contains('application')) {

            popUpOpen('.subscribe-popup.application');

        } else {
            popUpOpen('.subscribe-popup:not(.application)');
        }
        popupT2.play();
        
    });

});



var closePopup = document.querySelectorAll('.close-popup');

closePopup.forEach(close => {
	close.addEventListener('click', function(e) {

		e.preventDefault();
	
		popupT2.reverse();
	});
});



var bodyBtn = document.querySelector('.subscribe-popup.application');
var exceptBtn = document.querySelector('.application .footer-popup');

bodyBtn.addEventListener("click", function () {
    popupT2.reverse();
}, false);

exceptBtn.addEventListener("click", function (ev) {
    // alert("except");
    ev.stopPropagation(); //this is important! If removed, you'll get both alerts
}, false);