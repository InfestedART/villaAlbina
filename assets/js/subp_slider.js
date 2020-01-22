(function () {
'use strict';

function main() {	
	const galeria_active = document.getElementById('galeria_active');
	if (!galeria_active) {
		return;
	}
	const active_galeria = galeria_active.value;
	// const izq_btn = document.getElementById('izquierda_'+active_galeria);
	// const der_btn = document.getElementById('derecha_'+active_galeria);
	const slider = document.getElementsByClassName('galeria__slider_'+active_galeria);
	const dots = document.getElementsByClassName('galeria_dot_'+active_galeria);
	const allSlides = document.getElementsByClassName('galeria__slide_'+active_galeria);

	const totalSlides = allSlides.length;
	let sliderWidth = slider[0].offsetWidth;  	// todo: mejorar para multiples galerias
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
				// dots[i].classList.remove("active");	      
			    allSlides[i].style.transform = 'translate('+(
			    	-sliderWidth * (active-1)
			   )+'px)';
			}
			//dots[active-1].classList.add("active");
		}
	}

	function moveTo(ev) {
		ev.preventDefault();
		const slide = +ev.target.id.substr(ev.target.id.indexOf('_')+1);
		for(var i = 0; i < totalSlides; i++) {
		  allSlides[i].style.transform = 'translate('+(
		   	-sliderWidth * (slide)
		  )+'px)';
		}
		/*
		for(var i=0; i<dots.length; i++) {
			dots[i].classList.remove("active");
		}
		dots[slide].classList.add("active");
		*/
		active = +slide+1;		
	}
	/*
	izq_btn.addEventListener('click' , function(ev) {
		moveLeft(ev);
	});
	der_btn.addEventListener('click' , function(ev) {
		moveRight(ev);
	});
	*/
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
		/*
		for(var i=0; i<dots.length; i++) {
			dots[i].classList.remove("active");
		}
		dots[slide].classList.add("active");
		*/
		active = +slide+1;
		sliderWidth = slider[0].offsetWidth;
	});


}

window.addEventListener('load' , main);
})();