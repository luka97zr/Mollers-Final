
$(window).scroll(function(){
    parallax_home_man_standing();
    
});


// function parallax_home_man_standing(){
// 	$(".man_standing--content").css(
//         "transform",
// 		"translateY(" + window.scrollY * 0.04 + "%)"
//     );
// }

// VITAMNIN CARD SRDJAN

let vitamin_cards = document.querySelectorAll(".vitamin_card");

let vitamin_imag = document.querySelectorAll(".vitamin_img");
let vitamin_letter = document.querySelectorAll(".img-text");
// let parallaxField = document.querySelector("#man");
// OBSERVER in VEW

document.addEventListener("DOMContentLoaded", () => {
	let options = {
		root: null,
		// rootMargin: "-400px 0px",
		threshold: 0.7,
	};
	let observer = new IntersectionObserver(beTouching, options);
	document.querySelectorAll(".intersect").forEach((card) => {
		observer.observe(card);
	});
});

function beTouching(entries, obs) {
	// entries all 30 paragraphs

	entries.forEach((entry) => {
		if (entry.isIntersecting) {
			entry.target.classList.add("intersect_anim");
			console.log(entry.target.id);
			if (entry.target.id === "man") {
				obs.unobserve(entry.target);
			}
		} else {
			entry.target.classList.remove("intersect_anim");
		}
	});
}






// function parallax_home_man_standing(){
//     var wScroll = $(window).scrollTop();

//     $('.man_standing--parallax').css('background-position' ,  1300+(wScroll*0.25) + 'px', ' center ')
    
// }

// function parallax_home_familly(){
//     var wScroll = $(window).scrollTop();

//     $('.home_familly--parallax').css('background-position' ,  3100+(wScroll*0.2) + 'px', ' right ')
    
// }
// function parallax_about_bottles(){
//     var wScroll = $(window).scrollTop();

//     $('.grid_img1').css('background-position' ,  770+(wScroll*0.1) + 'px', ' center ')
    
// }
// // man_standing--content
// $(document).on('scroll', function(){
//     $('.man_standing--content').css("left", Math.max(-600+0.35*window.scrollY)+ 'px');
// })

// //home_familly--content
// $(document).on('scroll', function(){
//     $('.familly--content').css("left", Math.max(1750-0.15*window.scrollY) + 'px');
// })

// //Vitamin cards 
// $('.col-img').css({
//     backgroundPosition:"0% 0%"
// }).hover(
//     function(){
//         $(this).stop().animate({
//             'background-position-x': '-20px'
//         },'600')
       
//     },
//      function(){
//         $(this).stop().animate({
//             'background-position-x': '0px'
//         },'600')
     
//     });


  