(function () {
	'use strict';

	function main() {
		const subpagina_btn = document.getElementById('subpagina_btn');
		const pagina = document.getElementById('pagina');
		const modelo = document.getElementById('modelo');

		function form_validation() {
			const form_subpagina = document.getElementById('form_subpagina');	
			const subpagina = document.getElementById('subpagina');
			const paginaValue = document.getElementById('pagina').value;

			const subpagina_alert = document.getElementById('subpagina_alert');
			subpagina.classList.remove('input-error');
			pagina.classList.remove('input-error');

			const form_is_validated = subpagina.value.trim() !== ''
				&& paginaValue >= 0 && paginaValue.trim() != '' ;
			let error = '';

			if (form_is_validated) {
				form_subpagina.submit();
			} else {
				if(paginaValue < 0 || paginaValue.trim() == '') {
					error = "Escoga una opción";
					pagina.classList.add('input-error');			
				}
				if(subpagina.value.trim() == '') {
					error = "El campo 'título' es obligatorio";
					subpagina.classList.add('input-error');			
				}
			}
			subpagina_alert.innerHTML = error;			
		}

		function customContent(ev) {
			const value = ev.target.value;
			const imagen_container = document.getElementById('imagen_container');
			const galeria_container = document.getElementById('galeria_container');
			const cont_container = document.getElementById('cont_container');	
			if (value == 1){
				imagen_container.classList.add('d-none');
				galeria_container.classList.add('d-none');
				cont_container.classList.remove('d-none');
			} else if (value == 0 && value.trim() != '') {
				imagen_container.classList.remove('d-none');
				galeria_container.classList.remove('d-none');
				cont_container.classList.remove('d-none');
			} else {
				imagen_container.classList.add('d-none');
				galeria_container.classList.add('d-none');
				cont_container.classList.add('d-none');
			}	
		}

		const preview_img = document.getElementById('preview_img');
		const hide_preview_btn = document.getElementById('hide_preview_btn');
		const imagen = document.getElementById('imagen');
		const show_preview_btn = document.getElementById('show_preview_btn');

		function hide_preview() {
			const delete_subpagina = document.getElementById('delete_subpagina');
			preview_img.classList.add('hidden');
			hide_preview_btn.classList.add('hidden');
			imagen.classList.remove('hidden');
			show_preview_btn.classList.remove('hidden');
			delete_subpagina.value = '1';			
		}

		function show_preview() {
			const delete_subpagina = document.getElementById('delete_subpagina');
			preview_img.classList.remove('hidden');
			hide_preview_btn.classList.remove('hidden');
			imagen.classList.add('hidden');
			show_preview_btn.classList.add('hidden');
			delete_subpagina.value = '0';			
		}

		if(preview_img) {
			hide_preview_btn.addEventListener('click', function(ev){
				hide_preview();
			});

			show_preview_btn.addEventListener('click', function(ev){
				show_preview();
			});
		}

		subpagina_btn.addEventListener('click', function(ev){
			form_validation();
		});

		modelo.addEventListener('change', function(ev){
			customContent(ev);
		});

	}

	window.addEventListener('load' , main);

})();