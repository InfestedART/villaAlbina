(function () {
	'use strict';

function main() {

	const categoria_btn = document.getElementById('categoria_btn');
	const edit_categoria_btn = document.getElementById('edit_categoria_btn');

	function form_validation() {
		const form_categoria = document.getElementById('form_categoria');	
		const categoria = document.getElementById('categoria');

		const categoria_alert = document.getElementById('categoria_alert');

		const form_is_validated = categoria.value.trim() !== '';
		let error = '';

		if (form_is_validated) {
			form_categoria.submit();
		} else {
			error = 'El nombre de la categoria es obligatorio';
			categoria.classList.add('input-error');		
		}
		categoria_alert.innerHTML = error;
	}

	function edit_form_validation() {
		console.log('entra');
		const form_edit_categoria = document.getElementById('form_edit_categoria');	
		const edit_categoria = document.getElementById('edit_categoria');

		const edit_categoria_alert = document.getElementById('edit_categoria_alert');

		const edit_form_is_validated = edit_categoria.value.trim() !== '';
		let error = '';

		if (edit_form_is_validated) {
			form_edit_categoria.submit();
		} else {
			error = 'El nombre de la categoria es obligatorio';
			edit_categoria.classList.add('input-error');		
		}
		edit_categoria_alert.innerHTML = error;
	}

	categoria_btn.addEventListener('click', function(ev){
		form_validation();
	});

	edit_categoria_btn.addEventListener('click', function(ev){
		edit_form_validation();
	});
}
	
	window.addEventListener('load' , main);
})();