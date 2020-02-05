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

		console.log(form_is_validated);
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

	const preview_img = document.getElementById('preview_img');
	const hide_preview_btn = document.getElementById('hide_preview_btn');
	const imagen = document.getElementById('portada');
	const show_preview_btn = document.getElementById('show_preview_btn');

	function hide_preview() {
		const delete_imagen_libro = document.getElementById('delete_imagen_libro');
		preview_img.classList.add('hidden');
		hide_preview_btn.classList.add('hidden');
		imagen.classList.remove('hidden');
		show_preview_btn.classList.remove('hidden');
		delete_imagen_libro.value = '1';
	}

	function show_preview() {
		const delete_imagen_libro = document.getElementById('delete_imagen_libro');
		preview_img.classList.remove('hidden');
		hide_preview_btn.classList.remove('hidden');
		imagen.classList.add('hidden');
		show_preview_btn.classList.add('hidden');
		delete_imagen_libro.value = '0';
	}

	libro_btn.addEventListener('click', function(ev){
		form_validation();
	});

	hide_preview_btn.addEventListener('click', function(ev){
		hide_preview();
	});

	show_preview_btn.addEventListener('click', function(ev){
		show_preview();
	});
}
	
	window.addEventListener('load' , main);
})();