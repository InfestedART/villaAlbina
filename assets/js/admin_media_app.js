(function () {
	'use strict';

	function main() {
		const form_media = document.getElementById('form_media');	
		const media_alert = document.getElementById('media_alert');
		const media_btn = document.getElementById('media_btn');

		function form_validation() {
			const titulo = document.getElementById('titulo');
			const area = document.getElementById('area');
			const enlace = document.getElementById('enlace');
			const regex = /^https:\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/gm;
			let error = '';

			enlace.classList.remove('input-error');
			titulo.classList.remove('input-error');

			const form_is_validated = titulo.value.trim() !== ''
				&& (area.value > 0 || area.value.trim() !== '')
				&& enlace.value.trim() !== ''
				&& enlace.value.indexOf('embed') > -1
				&& enlace.value.match(regex);

			if (form_is_validated) {
				form_media.submit();
			} else {
				if (enlace.value.indexOf('embed') < 0) {
					error = 'El enlace no es incrustable. Porfavor introduzca un enlace incrustado (embed)';
					enlace.classList.add('input-error');			
				}
				if (!enlace.value.match(regex)) {
					error = 'El enlace no es valido.';
					enlace.classList.add('input-error');			
				}
				if (enlace.value.trim() == '') {
					error = 'Campo enlace es obligatorio';
					enlace.classList.add('input-error');
				}
				if ( area.value.trim() == '' || area.value < 1) {
					error = 'Campo area es obligatorio';
					area.classList.add('input-error');	
				}
				if (titulo.value.trim() == '') {
					error = 'Campo titulo es obligatorio';
					titulo.classList.add('input-error');			
				}				

				media_alert.innerHTML = error;
			}
		}

		media_btn.addEventListener('click', function(ev){
			form_validation(ev);
		});
	}

	window.addEventListener('load' , main);
})();
