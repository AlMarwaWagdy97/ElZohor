new WOW().init();

const Heroswiper = new Swiper(".Hero_slider", {
    // Optional parameters
    // autoplay: {
    //   delay: 7000,
    //   disableOnInteraction: false,
    // },
    loop: true,
    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
    },
});

const swiperLeader = new Swiper(".leader", {
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
            slidesPerView: 3,
        },
    },
});

const Item_list = document.querySelector(".Item-list-1");
const moreLink = document.querySelector(".Item-list-1 .more-link");
const HiddenContent_1 = document.querySelectorAll(".hidden-text-1");
let flag = true;

const Item_list_2 = document.querySelector(".Item-list-2");
const moreLink_2 = document.querySelector(".Item-list-2 .more-link");
const HiddenContent_2 = document.querySelectorAll(".hidden-text-2");
let flag2 = true;

const ShowMore = (f, a, arr) => {
    if (f == true) {
        arr.forEach((item) => (item.style.display = "block"));
        a.textContent = "اقل";
    } else if (f == false) {
        arr.forEach((item) => (item.style.display = "none"));
        a.textContent = "المزيد";
    }
};
moreLink.addEventListener("click", () => {
    ShowMore(flag, moreLink, HiddenContent_1);
    flag = !flag;
});
moreLink_2.addEventListener("click", () => {
    ShowMore(flag2, moreLink_2, HiddenContent_2);
    flag2 = !flag2;
});
