(function () {
'use strict';

function main() {	
	const slider = document.getElementById('slider');
	if (!slider) {
		return;
	}
	const izq_btn = document.getElementById('izquierda');
	const der_btn = document.getElementById('derecha');
	const dots = document.getElementsByClassName('slider_dot');
	const allSlides = document.getElementsByClassName('publicacion__slide');
	
	const totalSlides = allSlides.length;
	let sliderWidth = slider.offsetWidth;
	var active = 1;

	function moveLeft(ev) {
		ev.preventDefault();
		if (active > 1) {
			active--;
			for(var i = 0; i < totalSlides; i++) {
				dots[i].classList.remove("active");	      
			    allSlides[i].style.transform = 'translate('+(
			    	-sliderWidth * (active-1)
			    )+'px)';
		  	}
		 	dots[active-1].classList.add("active");
		}
	}

	function moveRight(ev) {
		ev.preventDefault();
		if (active < totalSlides) {
			active++;
			for(var i = 0; i < totalSlides; i++) {
				dots[i].classList.remove("active");	      
			    allSlides[i].style.transform = 'translate('+(
			    	-sliderWidth * (active-1)
			   )+'px)';
			}
			dots[active-1].classList.add("active");
		}
	}

	function moveTo(ev) {
		ev.preventDefault();
		const slide = ev.target.id;
		for(var i = 0; i < totalSlides; i++) {			      
		  allSlides[i].style.transform = 'translate('+(
		   	-sliderWidth * (slide)
		  )+'px)';
		}
		for(var i=0; i<dots.length; i++) {
			dots[i].classList.remove("active");
		}
		dots[slide].classList.add("active");
		active = +slide+1;
	}

	izq_btn.addEventListener('click' , function(ev) {
		moveLeft(ev);
	});
	der_btn.addEventListener('click' , function(ev) {
		moveRight(ev);
	});

	for(var i=0; i<dots.length; i++) {
		dots[i].addEventListener('click', function(ev){			
			moveTo(ev);
		});
	}

	window.addEventListener('resize', function() {
		const slide = 0;
		for(var i = 0; i < totalSlides; i++) {			      
		  allSlides[i].style.transform = 'translate('+(
		   	-sliderWidth * (slide)
		  )+'px)';
		}
		for(var i=0; i<dots.length; i++) {
			dots[i].classList.remove("active");
		}
		dots[slide].classList.add("active");
		active = +slide+1;
		sliderWidth = slider.offsetWidth;
	});

}

window.addEventListener('load' , main);
})();