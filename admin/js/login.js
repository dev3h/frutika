const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

let indexOfBullet = 0;

// inputs.forEach((inp) => {
//   inp.addEventListener("focus", () => {
//     inp.classList.add("active");
//   });
//   inp.addEventListener("blur", () => {
//     if (inp.value != "") return;
//     inp.classList.remove("active");
//   });
// });

setInterval(autoSlider, 3000);

function moveSlider() {
  let index = this.dataset.value;

  let currentImage = document.querySelector(`.img-${index}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-index * 2.2}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  this.classList.add("active");
}

function autoSlider() {
  let bulletLength = bullets.length;

  let currentImage = document.querySelector(`.img-${indexOfBullet}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-indexOfBullet * 2.2}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  bullets[indexOfBullet].classList.add("active");

  indexOfBullet < bulletLength - 1 ? (indexOfBullet += 1) : (indexOfBullet = 0);
}

bullets.forEach((bullet) => {
  bullet.addEventListener("click", moveSlider);
});
