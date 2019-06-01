(function () {
	'use strict';

	function main() {		
		const form_evento = document.getElementById('form_evento');	
		const evento_alert = document.getElementById('evento_alert');
		const fecha_ini = document.getElementById('fecha_ini');
		const fecha_fin = document.getElementById('fecha_fin');
		const fecha0 = document.getElementById('fecha0');
		const hora = document.getElementById('hora');
		const evento_btn = document.getElementById('evento_btn');

		const rango = document.getElementById('rango');
		const fecha_array = document.getElementById('fecha_array');
		const fecha_rango = document.getElementById('fecha_rango');
		const add_fecha = document.getElementById('add_fecha');
		const fecha_divs = document.getElementsByClassName('fecha_div');
		var cont = fecha_divs.length;
		var dateInputs = [];

		function init_datePicker(node) {
			return new Pikaday({
	        	field: node,
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
		}

		function toggle_fecha() {
			if (rango.checked) {
				fecha_rango.classList.remove('hidden');
				fecha_array.classList.add('hidden');
			} else {
				fecha_rango.classList.add('hidden');
				fecha_array.classList.remove('hidden');
			}			
		}

		function add_fecha_input(ev) {
			cont++;
			var newDiv = document.createElement('div');
			newDiv.setAttribute("id", "fecha_div" + cont);
			newDiv.innerHTML = 
					" <input id='fecha"+cont+"'"
					+ "	  name='fecha[]' class='form-control input_dinamic mb-2' type='text' />"
					+ "	 <a href='#' id='remove_fecha"+cont+"'>"
					+ "    <i id='i_"+cont+"' class='button_add fa fa-minus'></i>"
            		+ "	 </a>"
         fecha_array.appendChild(newDiv);

         const new_btn = document.getElementById('remove_fecha'+cont);
         const new_fecha = document.getElementById('fecha'+cont);
         new_btn.addEventListener('click', function(ev){
				remove_fecha_input(ev);
			});			
			dateInputs[cont] = init_datePicker(new_fecha);
		}

		function remove_fecha_input(ev) {			
			const id = ev.target.id.substr(ev.target.id.indexOf('_')+1);
			const removed_div = document.getElementById('fecha_div'+id);
			fecha_array.removeChild(removed_div)
			cont--;
		}

		function form_validation() {
			const titulo = document.getElementById('titulo');
			const area = document.getElementById('area');
			const regex_date = /^\d{4}\-\d{1,2}\-\d{1,2}$/;
			const regex_time = /^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;
			let error = '';
			fecha_ini.classList.remove('input-error');
			fecha0.classList.remove('input-error');
			area.classList.remove('input-error');
			titulo.classList.remove('input-error');
			hora.classList.remove('input-error');

			const form_is_validated = titulo.value.trim() !== ''
				&& (area.value > 0 || area.value.trim() !== '')
				&& (fecha_ini.value.match(regex_date) ||  fecha0.value.match(regex_date))
				&& (hora.value.match(regex_time) || hora.value.trim() == '')

			if (form_is_validated) {
				form_evento.submit();
			} else {
				if (!fecha_ini.value.match(regex_date) && !fecha0.value.match(regex_date)) {
					error = 'Ingrese un formato de fecha valido (YYYY-MM-DD)';
					fecha_ini.classList.add('input-error');
					fecha0.classList.add('input-error');
				}
				if ( fecha_ini.value.trim() == '' && fecha0.value.trim() == '') {
					error = 'Campo fecha es obligatorio';
					fecha_ini.classList.add('input-error');
					fecha0.classList.add('input-error');
				}
				if ( area.value.trim() == '' || area.value < 1) {
					error = 'Campo area es obligatorio';
					area.classList.add('input-error');	
				}
				if ( titulo.value.trim() == '') {
					error = 'Campo titulo es obligatorio';
					titulo.classList.add('input-error');			
				}
				if (!hora.value.match(regex_time) && hora.value.trim() != '') {
					error = 'Ingrese un formato de hora valido (HH-MM)';
					hora.classList.add('input-error');
				}
				evento_alert.innerHTML = error;
			}
		}

		const hide_img_btn = document.getElementById('hide_img_btn');
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


		if (hide_preview_btn && show_preview_btn) {
			hide_preview_btn.addEventListener('click', function(){
				hide_preview();
			});

			show_preview_btn.addEventListener('click', function(){
				show_preview();
			});	
		}
		
		rango.addEventListener('change', function(){
			toggle_fecha();
		});

		evento_btn.addEventListener('click', function(ev){
			form_validation(ev);
		});

		add_fecha.addEventListener('click', function(ev){
			add_fecha_input(ev);
		});

		var picker = [];
		for (var i=1; i<=cont; i++) {
         const saved_fecha = document.getElementById('remove_fecha'+i);
         const fecha_input = document.getElementById('fecha'+i);
			picker[i] = init_datePicker(fecha_input);
         saved_fecha.addEventListener('click', function(ev){
				remove_fecha_input(ev);
			});				
		}

		var picker_ini = init_datePicker(fecha_ini);
		var picker_fin = init_datePicker(fecha_fin);
		picker[0] = init_datePicker(fecha0);
	}

	window.addEventListener('load' , main);
})();
