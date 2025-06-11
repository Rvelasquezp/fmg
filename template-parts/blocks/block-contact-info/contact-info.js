let contactSvg = document.querySelector(".contact-info");
let contactCloud = contactSvg.querySelector(".contactCloud");
let contactBallon = contactSvg.querySelector(".contactBallon");

let ballonCloudAnimationContact = gsap.timeline();
ballonCloudAnimationContact.to(
  contactCloud,
  {
    duration: 2,
    x: "+=20",
    yoyo: true,
    repeat: -1,
    ease: "power1.inOut",
  },
  ">"
);

ballonCloudAnimationContact.to(
  contactBallon,
  {
    duration: 2,
    y: "+=20",
    yoyo: true,
    repeat: -1,
    ease: "power1.inOut",
  },
  ">"
);
