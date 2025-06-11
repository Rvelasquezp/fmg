const swiper = new Swiper(".swiper-activities-family", {
  // Optional parameters
  direction: "horizontal",
  slidesPerView: 2,
  loop: true,
  spaceBetween: 10,
  speed: 1000,
  autoplay: {
    delay: 2000,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    480: {},
    760: {
      spaceBetween: 15,
      slidesPerView: 3,
    },
    960: {
      spaceBetween: 20,
      slidesPerView: 3,
    },
    1400: {
      spaceBetween: 47,
      slidesPerView: 3,
    },
  },
});
