(function () {
	'use strict';

function main() {

	const equipo_btn = document.getElementById('equipo_btn');

	function form_validation() {
		const form_equipo = document.getElementById('form_equipo');	
		const nombre = document.getElementById('nombre');
		const categoria = document.getElementById('categoria');
		const cargo = document.getElementById('cargo');		
		const equipo_alert = document.getElementById('equipo_alert');

		const form_is_validated = nombre.value.trim() !== ''
			&& categoria.value > 0
			&& cargo.value.trim() !== '';

		nombre.classList.remove('input-error');
		cargo.classList.remove('input-error');
		categoria.classList.remove('input-error');
		let error = '';

		if (form_is_validated) {
			form_equipo.submit();
		} else {
			if (cargo.value.trim() == '') {
				error = 'Campo cargo es obligatorio';
				cargo.classList.add('input-error');	
			}
			if (categoria.value < 1 || !categoria.value.trim()) {
				error = 'Escoga una categoria';
				categoria.classList.add('input-error');						
			}
			if (nombre.value.trim() == '') {
				error = 'Campo nombre es obligatorio';
				nombre.classList.add('input-error');	
			}
		}		
		equipo_alert.innerHTML = error;
	}

	equipo_btn.addEventListener('click', function(ev){
		form_validation();
	});
}
	
	window.addEventListener('load' , main);
})();