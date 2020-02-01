(function () {
	'use strict';

function main() {

	function form_validation() {
		const form_libro = document.getElementById('form_libro');	
		const titulo = document.getElementById('titulo');
		const categoria = document.getElementById('categoria');
		const precio = document.getElementById('precio');
		const libro_btn = document.getElementById('libro_btn');
		const libro_alert = document.getElementById('libro_alert');

		const form_is_validated = titulo.value.trim() !== ''
			&& categoria.value > 0
			&& precio.value.trim() !== '';

		precio.classList.remove('input-error');
		categoria.classList.remove('input-error');
		titulo.classList.remove('input-error');
		let error = '';

		if (form_is_validated) {
			form_libro.submit();
		} else {
			if (precio.value.trim() == '') {
				error = 'Campo precio es obligatorio';
				precio.classList.add('input-error');	
			}
			if (categoria.value < 1 || !categoria.value.trim()) {
				error = 'Escoga una categoria';
				categoria.classList.add('input-error');						
			}
			if (titulo.value.trim() == '') {
				error = 'Campo titulo es obligatorio';
				titulo.classList.add('input-error');	
			}
		}		
		libro_alert.innerHTML = error;
	}

	libro_btn.addEventListener('click', function(ev){
		form_validation();
	});
}
	
	window.addEventListener('load' , main);
})();