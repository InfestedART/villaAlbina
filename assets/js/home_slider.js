(function () {
'use strict';

function main() {	
	const sliders = document.getElementsByClassName('publicacion__slider');
	const derechas = document.getElementsByClassName('flecha_derecha');
	const izquierdas = document.getElementsByClassName('flecha_izquierda');
	
	function moveLeft(targetId) {
		const id = +targetId.substr(targetId.indexOf('_')+1);
		const currSlider = document.getElementById('homeSlider_'+id);
		const tallSlides = currSlider.children;

		if (activeArray[id] > 1) {
			activeArray[id]--;
			for(var i = 0; i < tallSlides.length; i++) {   
			    tallSlides[i].style.transform = 'translate('+(
			    	-tallSlides[i].offsetWidth * (activeArray[id]-1)
			    )+'px)';
		  	}
		}		
	}

	function moveRight(targetId) {
		const id = +targetId.substr(targetId.indexOf('_')+1);
		const currSlider = document.getElementById('homeSlider_'+id);		
		const tallSlides = currSlider.children;
		const lastSlide = tallSlides[tallSlides.length-1];
		const containerPos = currSlider.offsetWidth
		const lastSlidePos = lastSlide.offsetLeft
		const translation = lastSlide.offsetWidth * (activeArray[id]-1)
		if (lastSlidePos - translation > containerPos) {
			activeArray[id]++;
			for(var i = 0; i < tallSlides.length; i++) {   
			    tallSlides[i].style.transform = 'translate('+(
			    	-tallSlides[i].offsetWidth * (activeArray[id]-1)
			    )+'px)';
		  	}
		}		
	}

	var activeArray = {};
	var cantSlides = {};
	for (var i=0; i<sliders.length; i++) {
		const index = +sliders[i].id.substr(sliders[i].id.indexOf('_')+1);
		activeArray[index] = 1;
		cantSlides[index] = document.getElementById('homeSlider_'+index).children.length;
		izquierdas[i].addEventListener('click' , function(ev) {
			moveLeft(ev.target.id);
		});
		derechas[i].addEventListener('click' , function(ev) {
			moveRight(ev.target.id);
		});	
	}
}

window.addEventListener('load' , main);
})();