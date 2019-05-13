(function () {
	'use strict';

	function main() {

		function form_validation() {
			const form_agenda = document.getElementById('form_agenda');	
			const enlace = document.getElementById('enlace');
			const fecha = document.getElementById('fecha');
			const agenda_btn = document.getElementById('agenda_btn');
			const agenda_alert = document.getElementById('agenda_alert');

			const form_is_validated = enlace.files.length > 0
				&& fecha.value.trim() !== '';
			let error = '';

			if (form_is_validated) {
				form_agenda.submit();
			} else {
				if (fecha.value.trim() == '') {
					error = 'Campo fecha es obligatorio';
					fecha.classList.add('input-error');
				}
				if (enlace.files.length <= 0) {
					error = 'Carge un archivo porfavor';
					enlace.classList.add('input-error');
				}	
			}
			agenda_alert.innerHTML = error;
		}

		agenda_btn.addEventListener('click', function(ev){
			form_validation();
		});

	}
	
	window.addEventListener('load' , main);
})();