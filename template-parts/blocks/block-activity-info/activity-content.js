var headerHeight = document.querySelector('.site-header').clientHeight;
var leftContentHeight = document.querySelector('.leftContent').clientHeight;

if(window.innerWidth > 960) {
    ScrollTrigger.create({
        trigger: ".rightContent > div",
        pin: true,
        start: "top "+headerHeight+"px", // when the top of the trigger hits the top of the viewport
        endTrigger: ".leftContent",
        end: "bottom bottom-=180", // end after scrolling 500px beyond the start
        // scrub: 1,
    })
}

if(document.querySelector(".guests-slider") === null){
	document.querySelector(".single-activity-content .content").style.paddingBottom = "5em";
	document.querySelector(".single-activity-content .content").style.marginBottom = "0";
}