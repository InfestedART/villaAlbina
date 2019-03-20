(function () {
	'use strict';

	function main() {		
		const noticia_form = document.getElementById('form_noticia');	
		const noticia_titulo = document.getElementById('titulo');
		const noticia_fecha = document.getElementById('fecha');
		const noticia_fuente = document.getElementById('fuente');
		const noticia_enlace = document.getElementById('enlace');
		const noticia_resumen = document.getElementById('resumen');
		const noticia_imagen = document.getElementById('imagen');
		const noticia_alert = document.getElementById('noticia_alert');
		const noticia_btn = document.getElementById('noticia_btn');

    	var picker = new Pikaday({
        	field: noticia_fecha,
        	format: 'YYYY-MM-DD',
        	toString(date, format) {
	          	const day = ("0" + date.getDate()).slice(-2);
	           	const month = ("0" + (date.getMonth() + 1)).slice(-2);
	           	const year = date.getFullYear();
	           	return `${year}-${month}-${day}`;
        	},
        	parse(dateString, format) {
	        	const parts = dateString.split('-');
	           	const year = parseInt(parts[0], 10);
	           	const month = parseInt(parts[1], 10) - 1;
	           	const day = parseInt(parts[2], 10);
	           	const fecha = new Date(year, month, day);
	          	return fecha;
        	}
		});


		function form_validation() {
			const regex = /^\d{4}\-\d{1,2}\-\d{1,2}$/;
			let error = '';

			const form_is_validated = noticia_titulo.value.trim() !== ''
				&& noticia_fecha.value.trim() !== ''
				&& noticia_fecha.value.match(regex)
				&& noticia_fuente.value.trim() !== '';
				
			if (form_is_validated) {
				noticia_form.submit();
			} else {	
				if (!noticia_fecha.value.match(regex)) {
					error = 'Ingrese un formato de fecha valido (YYYY-MM-DD)';
					noticia_fecha.classList.add('input-error');	
				}							
				if ( noticia_fuente.value.trim() === '') {
					error = 'Campo fuente es obligatorio';
					noticia_fuente.classList.add('input-error');	
				}
				if ( noticia_fecha.value.trim() === '') {
					error = 'Campo fecha es obligatorio';
					noticia_fecha.classList.add('input-error');	
				}
				if ( noticia_titulo.value.trim() === '') {
					error = 'Campo titulo es obligatorio';
					noticia_titulo.classList.add('input-error');			
				}
			noticia_alert.innerHTML = error;
			}
		}

		noticia_btn.addEventListener('click', function(ev){
			form_validation();
		})
	}

	window.addEventListener('load' , main);
})();