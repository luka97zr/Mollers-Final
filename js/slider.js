// SLIDER SRDJAN

let slides = document.querySelectorAll(".slider");
let indicators = document.querySelector(".slider_navigation");
let slider_flag = document.querySelector("#slider_flag");
let slider_content = document.querySelector(".slider_content");
let slide_headline = document.querySelector(".slide_headline");
let index = 0;
let slide_headlines = [
	"Esencijalne masne <br> kiseline",
	"Kako Omega-3 kiseline utiču na naše zdravlje",
	"Nova prodajna mesta",
];
let slider_btn = document.querySelector("#slider_link");
let slider_link = [
    "omega3.php",
    "omega3.php",
    "shop.php",
];

// INDIKATORI
function makeIndicators() {
	for (let i = 0; i < slides.length; i++) {
		const div = document.createElement("div");
		div.setAttribute("class", "nav-btn");
		div.setAttribute("onclick", "indicateSlides(this)");
		div.id = i;
		if (i == 0) {
			div.classList.add("active");
		}
		indicators.appendChild(div);
	}
}

function updatedIndicators() {
	for (let i = 0; i < indicators.children.length; i++) {
		// console.log(indicators.children[i]);
		indicators.children[i].classList.remove("active");
	}
	indicators.children[index].classList.add("active");
}

makeIndicators();

function indicateSlides(element) {
	// console.log(element);
	index = element.id;
	updatedIndicators();
	changeSlides();
}

// SLIDES Change

function changeSlides() {
	for (let i = 0; i < slides.length; i++) {
		slides[i].classList.remove("show_slides");
	}
	slides[index].classList.add("show_slides");
	move_content();
   
}

function move_content() {
	if (index == 0 ) {
		slider_flag.style.right = "9%";
		slider_flag.style.bottom = "9%";
		slider_content.className = "slider_content";
		slide_headline.innerHTML = slide_headlines[0];
		// slider_content.classList.remove("move_left");
		slider_btn.setAttribute("href", `${slider_link[0]}`);

	}
	if (index == 1) {
		slider_flag.style.right = "9%";
		slider_flag.style.bottom = "9%";
		slider_content.className = "slider_content";
		slider_content.classList.add("move_right");
		slide_headline.innerHTML = slide_headlines[1];
		slider_btn.setAttribute("href", `${slider_link[1]}`);

	}
	if (index == 2) {
		slider_flag.style.right = "99%";
		slider_flag.style.bottom = "88%";
		slider_content.classList.add("move_left");
		slide_headline.innerHTML = slide_headlines[2];
		slider_btn.setAttribute("href", `${slider_link[2]}`);

	}

    
}
//History slider
var slideIndex = 1;
showSlides(slideIndex);

function currentSlide(n) {
	showSlides(slideIndex = n);
  }

  function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("history_bottle--img");
	var dots = document.getElementsByClassName("btn");
	if (n > slides.length) {slideIndex = 1}
	if (n < 1) {slideIndex = slides.length}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	slides[slideIndex-1].style.display = "block";
	dots[slideIndex-1].className += " active";
  }
