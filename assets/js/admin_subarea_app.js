(function () {
	'use strict';

	function main() {
		const subarea_btn = document.getElementById('subarea_btn');

		const preview_img = document.getElementById('preview_img');
		const hide_preview_btn = document.getElementById('hide_preview_btn');
		const imagen = document.getElementById('imagen');
		const show_preview_btn = document.getElementById('show_preview_btn');

		function hide_preview() {
			const delete_imagen = document.getElementById('delete_imagen');
			preview_img.classList.add('hidden');
			hide_preview_btn.classList.add('hidden');
			imagen.classList.remove('hidden');
			show_preview_btn.classList.remove('hidden');
			delete_imagen.value = '1';			
		}

		function show_preview() {
			const delete_imagen = document.getElementById('delete_imagen');
			preview_img.classList.remove('hidden');
			hide_preview_btn.classList.remove('hidden');
			imagen.classList.add('hidden');
			show_preview_btn.classList.add('hidden');
			delete_imagen.value = '0';			
		}

		function form_validation() {
			const form_subarea = document.getElementById('form_subarea');	
			const subarea = document.getElementById('subarea');
			const area = document.getElementById('area');
			const subarea_alert = document.getElementById('subarea_alert');

			subarea.classList.remove('input-error');
			area.classList.remove('input-error');
			let error = '';

			const form_is_validated = subarea.value.trim() !== ''	&& area.value > 0 ;

			if (form_is_validated) {
				form_subarea.submit();
			} else {
				if (area.value < 1 || !area.value.trim()) {
					error = 'Seleccione una opción';
					area.classList.add('input-error');						
				}				
				if (subarea.value.trim() == '') {
					error = 'Campo nombre de subarea es obligatorio';
					subarea.classList.add('input-error');	
				}	
			}
			subarea_alert.innerHTML = error;			
		}

		if (hide_preview_btn && show_preview_btn) {
			hide_preview_btn.addEventListener('click', function(){
				hide_preview();
			});

			show_preview_btn.addEventListener('click', function(){
				show_preview();
			});	
		}
		
		subarea_btn.addEventListener('click', function(ev){
			form_validation();
		});

	}

	window.addEventListener('load' , main);

})();