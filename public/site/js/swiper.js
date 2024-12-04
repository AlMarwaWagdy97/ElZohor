let valueDisplay = document.querySelectorAll(".num");
let interval = 5000;
valueDisplay.forEach((ele) => {
  let startValue = 0;
  let endValue = parseInt(ele.getAttribute("data-val"));
  let duration = Math.floor(interval / endValue);
  let counter = setInterval(() => {
    startValue += 1;
    ele.textContent = startValue + "+";
    if (startValue == endValue) {
      clearInterval(counter);
    }
  }, duration);
});

const swiperPartners = new Swiper(".r", {
  // Optional parameters
  loop: true,
  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 5,
      spaceBetween: 35,
    },
  },
});
