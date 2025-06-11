let ballonsCloud = document.querySelector(".about-activities");
let character = ballonsCloud.querySelector(".leftCharacter");
let cloud = ballonsCloud.querySelector(".leftCloudTop");
let leftCloudBottom = ballonsCloud.querySelector(".leftCloudBottom");
let rightCloud = ballonsCloud.querySelector(".rightCloud");
let rightParachute = ballonsCloud.querySelector(".rightParachute");
let ballonCloudAnimation = gsap.timeline();
ballonCloudAnimation.to(
  rightParachute,
  {
    duration: 2,
    y: "+=20",
    yoyo: true,
    repeat: -1,
    ease: "power1.inOut",
  },
  ">"
);

ballonCloudAnimation.to(
  character,
  {
    duration: 2,
    y: "+=20",
    yoyo: true,
    repeat: -1,
    ease: "power1.inOut",
  },
  ">"
);

ballonCloudAnimation.to(
  leftCloudBottom,
  {
    duration: 2,
    x: "-=20",
    y: "+=20",
    yoyo: true,
    repeat: -1,
    ease: "power1.inOut",
  },
  ">"
);

ballonCloudAnimation.to(
  cloud,
  {
    duration: 2,
    x: "+=20",
    yoyo: true,
    repeat: -1,
    ease: "power1.inOut",
  },
  ">"
);

ballonCloudAnimation.to(
  rightCloud,
  {
    duration: 2,
    x: "+=20",
    yoyo: true,
    repeat: -1,
    ease: "power1.inOut",
  },
  ">"
);
