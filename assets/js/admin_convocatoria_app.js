(function () {
	'use strict';

	function main() {		
		const form_convocatoria = document.getElementById('form_convocatoria');	
		const convocatoria_alert = document.getElementById('convocatoria_alert');
		const fecha_limite = document.getElementById('fecha_limite');
		const convocatoria_btn = document.getElementById('convocatoria_btn');

		function form_validation() {
			const titulo = document.getElementById('titulo');
			let error = '';
			fecha_limite.classList.remove('input-error');
			titulo.classList.remove('input-error');
			const regex_date = /^\d{4}\-\d{1,2}\-\d{1,2}$/;

			const form_is_validated = titulo.value.trim() !== ''
				&& fecha_limite.value.match(regex_date);

			if (form_is_validated) {
				form_convocatoria.submit();
			} else {
				if (!fecha_limite.value.match(regex_date)) {
					error = 'Ingrese un formato de fecha valido (YYYY-MM-DD)';
					fecha_limite.classList.add('input-error');
				}
				if ( titulo.value.trim() == '') {
					error = 'Campo titulo es obligatorio';
					titulo.classList.add('input-error');			
				}
				convocatoria_alert.innerHTML = error;
			}
		}

		convocatoria_btn.addEventListener('click', function(ev){
			form_validation(ev);
		});

		const add_file = document.getElementById('add_file');
		const file_divs = document.getElementsByClassName('file_div');
		const file_array = document.getElementById('file_array');
		var file_cont = file_divs.length;
		const hide_files = document.getElementsByClassName('hide_file');
		const restaurar_files = document.getElementsByClassName('restaurar_file');

		function add_file_input(ev) {
			var newDiv = document.createElement('div');
			newDiv.setAttribute("id", "file_div" + file_cont);
			newDiv.setAttribute("class", "mb-2");
			newDiv.innerHTML = 
					" <input id='file" + file_cont +"'"
					+ "	name='file[]' class='form-control input_dinamic' type='file' />"
					+ "	<a href='#' id='remove_file"+file_cont+"'>"
					+ "   <i id='i_"+file_cont+"' class='button_add fa fa-minus'></i>"
               + "	</a>";
         file_array.appendChild(newDiv);
         file_array.classList.remove('hidden');

         const new_btn = document.getElementById('remove_file'+file_cont);
         const new_fecha = document.getElementById('file'+file_cont);
         new_btn.addEventListener('click', function(ev){
				remove_file_input(ev);
			});
        file_cont++;
		}

		function remove_file_input(ev) {			
			const id = ev.target.id.substr(ev.target.id.indexOf('_')+1);
			const removed_div = document.getElementById('file_div'+id);
			file_array.removeChild(removed_div)
			file_cont--;
		}

		function delete_file(ev) {
			const id = ev.target.id.substr(ev.target.id.indexOf('_')+1);
			const delete_input = document.getElementById('delete_file_'+id);
			const restore_file = document.getElementById('restoreFile_div'+id);
			const file_preview = document.getElementById('file_preview'+id);
			delete_input.value = 1;
			restore_file.classList.remove('hidden');
			file_preview.classList.add('hidden');
		}

		function restore_file(ev) {
			const id = ev.target.id.substr(ev.target.id.indexOf('_')+1);
			const delete_input = document.getElementById('delete_file_'+id);
			const restore_file = document.getElementById('restoreFile_div'+id);
			const file_preview = document.getElementById('file_preview'+id);	
			restore_file.classList.add('hidden');	
			file_preview.classList.remove('hidden');
			delete_input.value = 0;	
		}

		add_file.addEventListener('click', function(ev){
			add_file_input(ev);
		});

		for (var i=0; i<hide_files.length; i++) {
			hide_files[i].addEventListener('click', function(ev){
				delete_file(ev);
			});
		}

		for (var i=0; i<restaurar_files.length; i++) {
			restaurar_files[i].addEventListener('click', function(ev){
				restore_file(ev);
			});				
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

		var picker = new Pikaday({
	        	field: fecha_limite,
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

	window.addEventListener('load' , main);
})();