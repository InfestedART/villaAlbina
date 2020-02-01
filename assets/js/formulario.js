(function () {
	'use strict';

	function main() {			
		const calendar = document.getElementById('calendar');
		const submit_btn = document.getElementById('submit_btn');
		const form_contacto = document.getElementById('form_contacto');	
		const otro_input = document.getElementById('otro_input') || false;
		const colegio = document.getElementById('colegio');
		const universidad = document.getElementById('universidad');

	    var picker = new Pikaday({
	    	field: calendar,
	    	format: 'YYYY-MM-DD',
	    	i18n: {
			    previousMonth : 'Previous Month 1',
			    nextMonth     : 'Next Month 2',
			    months        : [
			    	'Enero',
			    	'Febrero',
			    	'Marzo',
			    	'Abril',
			    	'Mayo',
			    	'Junio',
			    	'Julio',
			    	'Agosto',
			    	'Septiembre',
			    	'Octubre',
			    	'Noviembre',
			    	'Diciembre'
			    ],
			    weekdays      : [
			    	'Domingo',
			    	'Lunes',
			    	'Martes',
			    	'Miercoles',
			    	'Jueves',
			    	'Viernes',
			    	'Sábado'
			    ],
			    weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sab']
			},
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

	    function select_otro(value) {
	    	const otro = document.getElementById('otro');
	    	if (value.trim()) {
	    		otro.checked = true;	
	    	}	    	
	    }

	    function unselect_otro() {
	    	otro_input.value = '';	    	
	    }

		function form_validation(ev) {
			const inputs = document.getElementsByClassName('form__input');
			const radios = document.getElementsByClassName('form__radio');
			const alert = document.getElementById('alert');

			let formValidated = true;
			let invalidFields = '';
			alert.classList.remove('form__alert--fracaso');

			for (let i=0; i < inputs.length; i++) {				
				if (!inputs[i].value.trim() && inputs[i].name !== 'otro_input') {
					invalidFields += inputs[i].name + ', ';
					formValidated = false;
				}
			}

			if (radios.length > 0) {
				const otro = document.getElementById('otro');
				let isRadioChecked = false;
				for (let i=0; i < radios.length; i++) {
					if (radios[i].checked) {
						isRadioChecked = true;
					}
				}
				if (!isRadioChecked) {
					invalidFields += radios[0].name + ', ';
					formValidated = false;
				}
				if (otro.checked && !otro_input.value.trim()) {
					invalidFields += radios[0].name + '(otro), ';
					formValidated = false;
				}
			}
			if (!formValidated) {
				invalidFields = invalidFields.substr(0, invalidFields.length -2);
				alert.classList.remove('hidden');
				alert.classList.add('form__alert--fracaso');
				alert.innerHTML = 'Todos los campos son obligatorios. <br> Campos faltantes: ' + invalidFields;				
			} else {
				alert.classList.remove('hidden');
				alert.classList.add('form__alert--exito');
				alert.innerHTML = 'Mail enviado existosamente';
				form_contacto.submit();
			}
		}

		submit_btn.addEventListener('click', function(ev){
			ev.preventDefault();
			form_validation();
		});

		if (otro_input) {
			otro_input.addEventListener('input', function(ev) {
				select_otro(ev.target.value);
			});
		}		

		if (colegio) {
			colegio.addEventListener('input', function(ev) {
				unselect_otro(ev);
			});
		}

		if (universidad) {
			universidad.addEventListener('input', function(ev) {
				unselect_otro(ev);
			});
		}
	}

	window.addEventListener('load' , main);
})();