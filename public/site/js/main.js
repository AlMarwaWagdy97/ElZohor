//Swipwer
var swiper = new Swiper(".swiper", {
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
let X = new Swiper(".swiper .X", {
  loop: true,
  spaceBetween: 40,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// Function to show or hide scroll to top button based on scroll position
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    // document.getElementById("scrollToTopBtn").classList.add("fade-in");
    // document.getElementById("scrollToTopBtn").classList.remove("fade-out");
    // document.getElementById("scrollToTopBtn").style.display = "block";
  } else {
    // document.getElementById("scrollToTopBtn").classList.add("fade-out");
    // document.getElementById("scrollToTopBtn").classList.remove("fade-in");
  }
}

// Function to scroll to the top of the page when scroll to top button is clicked
function scrollToTop() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

//Wow
new WOW().init();


function Copy() {
  var Url = document.getElementById("url");
  Url.style.display = "block";
  Url.value = window.location.href;
  console.log(Url.value);
  Url.select();
  document.execCommand("copy");
  Url.style.display = "none";
  alert("Text copied to clipboard");
}

$(".services__card .services__card-content").click(function () {
  $(this).toggleClass("show-text")
})

const elements = document.querySelectorAll(".best .nav-item");


elements.length!=0? elements[0].style.backgroundColor = "#39ac3f":"";
elements.forEach((el) => {
  el.addEventListener("click", () => {
    // Reset all elements' background color to the original color
    elements.forEach((item) => {
      item.style.backgroundColor = "#264176"; // Reset to original color
    });

    // Set the background color of the clicked element to red
    el.style.backgroundColor = "#39ac3f";
  });
});


// change clicked nav-item
function detectZoom() {
  const myDiv = document.getElementById("Hero");

 
  let zoom = Math.round(((window.outerWidth - 10) / window.innerWidth) * 100);
console.log(zoom)
  if (zoom < 97) {
    const dynamicWidth = zoom / 100;
    myDiv.style.width = `${dynamicWidth * 0.86 * 100}%`;
  } else {
    myDiv.style.width = "100%";
  }
}

// Run the function on page load and on window resize
window.addEventListener("resize", detectZoom);
window.addEventListener("load", detectZoom);
window.onbeforeunload = detectZoom()