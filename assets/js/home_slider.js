(function () {
'use strict';

function main() {	
	const izq_btn = document.getElementById('izquierda');
	const der_btn = document.getElementById('derecha');
	const slider = document.getElementById('slider');
	const allSlides = document.getElementsByClassName('publicacion__slide');
	
	const totalSlides = allSlides.length;
	const sliderWidth = slider.offsetWidth;
	var active = 1;

	const sliders = document.getElementsByClassName('publicacion__slider');
	const derechas = document.getElementsByClassName('flecha_derecha');
	const izquierdas = document.getElementsByClassName('flecha_izquierda');
	
	//console.log(sliders);

	function moveLeft() {
		if (active > 1) {
			active--;
			for(var i = 0; i < totalSlides; i++) {   
			    allSlides[i].style.transform = 'translate('+(
			    	-sliderWidth * (active-1)
			    )+'px)';
		  	}
		}
	}

	function moveRight() {
		if (active < totalSlides) {
			active++;
			for(var i = 0; i < totalSlides; i++) {  
			    allSlides[i].style.transform = 'translate('+(
			    	-sliderWidth * (active-1)
			   )+'px)';
			}
		}
	}

	function tmoveLeft(targetId) {
		const id = +targetId.substr(targetId.indexOf('_')+1);
		console.log(cantSlides[id], id);
		
		if (activeArray[id] > 1) {
			activeArray[id]--;
			for(var i = 0; i < cantSlides[id]; i++) {   
			    /*allSlides[i].style.transform = 'translate('+(
			    	-sliderWidth * (active-1)
			    )+'px)';*/
		  	}
		}		
	}

	function tmoveRight(targetId) {
		const id = +targetId.substr(targetId.indexOf('_')+1);
		console.log(cantSlides[id], targetId, id);
		
		/*
		if (activeArray[id] > 1) {
			activeArray[id]--;
			for(var i = 0; i < totalSlides; i++) {   
			    allSlides[i].style.transform = 'translate('+(
			    	-sliderWidth * (active-1)
			    )+'px)';
		  	}
		}
		*/
		
	}

	// izq_btn.addEventListener('click' , moveLeft);
	// der_btn.addEventListener('click' , moveRight);

	var activeArray = [];
	var cantSlides = {};
	var slidersId = [];
	for (var i=0; i<sliders.length; i++) {
		const index = +sliders[i].id.substr(sliders[i].id.indexOf('_')+1);
		//console.log(sliders[i].id, index);
		activeArray[i] = 1;
		cantSlides[index] = document.getElementById('homeSlider_'+index).children.length;
		izquierdas[i].addEventListener('click' , function(ev) {
			tmoveLeft(ev.target.id);
		});
		derechas[i].addEventListener('click' , function(ev) {
			tmoveLeft(ev.target.id);
		});	
	}
	//console.log(cantSlides);
	// console.log(document.getElementById('homeSlider_0').children);
}

window.addEventListener('load' , main);
})();