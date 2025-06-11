window.onload = function(){
    const relatedSwiper = new Swiper(".swiper-activities-family", {
        // Optional parameters
        direction: "horizontal",
        slidesPerView: 1,
        loop: true,
        spaceBetween: 10,
        speed: 1000,
        centeredSlides: true,
        // autoplay: {
        //     delay: 2000,
        // },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            480: {},
            760: {
                spaceBetween: 15,
                slidesPerView: 2,
            },
            960: {
                spaceBetween: 20,
                slidesPerView: 3,
            },
            1400: {
                spaceBetween: 46,
                slidesPerView: 3,
            },
        },
    });
  
}