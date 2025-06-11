let ballonsGroup = document.querySelector('.ballons-group');
let ballons = ballonsGroup.querySelectorAll(".ballon");
let cloud = ballonsGroup.querySelector(".cloud");

let ballonAnimation = gsap.timeline();
// Randomly move ballons up and down smoothly
ballons.forEach(ballon => {
    ballonAnimation.to(ballon, {
      duration: 2,
      // random number bettwen 10 and 40
      y: "-=" + Math.floor(Math.random() * (30 - 10 + 1) + 10),
      yoyo: true,
      repeat: -1,
      ease: "power1.inOut",
    }, ">");
});

ballonAnimation.to(cloud, {
    duration: 3,
    x: "-=20",
    yoyo: true,
    repeat: -1,
    ease: "power1.inOut",
}, ">");
