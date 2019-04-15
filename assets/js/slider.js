(function () {
'use strict';

function main() {	
	const izq_btn = document.getElementById('izquierda');
	const der_btn = document.getElementById('derecha');
	const slider = document.getElementById('slider');
	const dots = document.getElementsByClassName('slider_dot');
	const allSlides = document.getElementsByClassName('publicacion__slide');
	
	const totalSlides = allSlides.length;
	const sliderWidth = slider.offsetWidth;
	var active = 1;

	function moveLeft() {
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

	function moveRight() {
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

	function moveTo(slide) {		
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

	izq_btn.addEventListener('click' , moveLeft);
	der_btn.addEventListener('click' , moveRight);
	for(var i=0; i<dots.length; i++) {
		dots[i].addEventListener('click', function(ev){			
			moveTo(ev.target.id);
		});
	}

}

window.addEventListener('load' , main);
})();