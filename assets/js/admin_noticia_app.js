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
		const hide_img_btn = document.getElementById('hide_img_btn');

		const add_img = document.getElementById('add_img');
		const img_divs = document.getElementsByClassName('img_div');
		const img_array = document.getElementById('img_array');
		var img_cont = img_divs.length;		
		const hide_imgs = document.getElementsByClassName('hide_img');
		const restaurar_imgs = document.getElementsByClassName('restaurar_img');

    	var picker = new Pikaday({
        	field: noticia_fecha,
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

		const preview_img = document.getElementById('preview_img');
		const hide_preview_btn = document.getElementById('hide_preview_btn');
		const imagen = document.getElementById('imagen');
		const show_preview_btn = document.getElementById('show_preview_btn');

		function hide_preview() {
			const delete_noticia = document.getElementById('delete_noticia');
			preview_img.classList.add('hidden');
			hide_preview_btn.classList.add('hidden');
			imagen.classList.remove('hidden');
			show_preview_btn.classList.remove('hidden');
			delete_noticia.value = '1';			
		}

		function show_preview() {
			const delete_noticia = document.getElementById('delete_noticia');
			preview_img.classList.remove('hidden');
			hide_preview_btn.classList.remove('hidden');
			imagen.classList.add('hidden');
			show_preview_btn.classList.add('hidden');
			delete_noticia.value = '0';			
		}

		function add_img_input(ev) {
			ev.preventDefault();	
			var newDiv = document.createElement('div');
			newDiv.setAttribute("id", "img_div" + img_cont);
			newDiv.setAttribute("class", "mb-3");
			newDiv.innerHTML = 
					  "<p class='mb-0'>Imagen "+(img_cont+1)+": </p>"
					+ "<input id='galeria"+img_cont+"'"
					+ "	  name='galeria[]'"
					+ "	  placeholder='Imagen'"
					+ "   class='form-control input_dinamic mb-1' type='file' />"
					+ "  <a href='#' id='remove_img"+img_cont+"'>"
					+ "    <i id='i_"+img_cont+"' class='button_add fa fa-minus'></i>"
            		+ "	 </a>"
            		+ "<input id='leyenda"+img_cont+"'"
            		+ "	  name='leyenda[]'"
            		+ "	  placeholder='Leyenda (opcional)'"
					+ "   class='form-control input_dinamic mb-1' />"
         img_array.classList.remove('hidden');
         img_array.appendChild(newDiv);
         const new_btn = document.getElementById('remove_img'+img_cont);
         new_btn.addEventListener('click', function(ev){
				remove_img_input(ev);
			});
        img_cont++;
		}

		function remove_img_input(ev) {	
			ev.preventDefault();		
			const id = ev.target.id.substr(ev.target.id.indexOf('_')+1);
			const removed_div = document.getElementById('img_div'+id);
			img_array.removeChild(removed_div)
			img_cont--;
		}

		function delete_img(ev) {
			const id = ev.target.id.substr(ev.target.id.indexOf('_')+1);
			const delete_input = document.getElementById('delete_img_'+id);
			const restore_img = document.getElementById('restoreImg_div'+id);
			const img_preview = document.getElementById('img_preview'+id);
			delete_input.value = 1;
			restore_img.classList.remove('hidden');
			img_preview.classList.add('hidden');
		}

		function restore_img(ev) {
			const id = ev.target.id.substr(ev.target.id.indexOf('_')+1);
			const delete_input = document.getElementById('delete_img_'+id);
			const restore_img = document.getElementById('restoreImg_div'+id);
			const img_preview = document.getElementById('img_preview'+id);	
			restore_img.classList.add('hidden');	
			img_preview.classList.remove('hidden');
			delete_input.value = 0;	
		}

		if (hide_preview_btn && show_preview_btn) {
			hide_preview_btn.addEventListener('click', function(){
				hide_preview();
			});

			show_preview_btn.addEventListener('click', function(){
				show_preview();
			});	
		}
		

		add_img.addEventListener('click', function(ev){
			add_img_input(ev);
		});
		
		for (var i=0; i<hide_imgs.length; i++) {
			hide_imgs[i].addEventListener('click', function(ev){
				delete_img(ev);
			});				
		}

		for (var i=0; i<restaurar_imgs.length; i++) {
			restaurar_imgs[i].addEventListener('click', function(ev){
				restore_img(ev);
			});				
		}
		
	}

	window.addEventListener('load' , main);
})();