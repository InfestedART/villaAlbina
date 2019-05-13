(function () {
	'use strict';

	function main() {

		const add_img = document.getElementById('add_img');
		const img_divs = document.getElementsByClassName('img_div');
		const img_array = document.getElementById('img_array');
		var img_cont = img_divs.length;		
		const hide_imgs = document.getElementsByClassName('hide_img');
		const restaurar_imgs = document.getElementsByClassName('restaurar_img');

		function add_img_input(ev) {
			ev.preventDefault();	
			var newDiv = document.createElement('div');
			newDiv.setAttribute("id", "img_div" + img_cont);
			newDiv.setAttribute("class", "mb-2");
			newDiv.innerHTML = 
					  "<p class='mb-0'>Imagen "+(img_cont+1)+": </p>"
					+ "<input id='galeria"+img_cont+"'"
					+ "	  name='galeria[]'"
					+ "	  placeholder='Imagen'"
					+ "   class='form-control p-0 input_dinamic mb-1' type='file' />"
					+ "  <a href='#' id='remove_img"+img_cont+"'>"
					+ "    <i id='i_"+img_cont+"' class='button_add fa fa-minus'></i>"
            		+ "	 </a>"
            		+ "<input id='leyenda"+img_cont+"'"
            		+ "	  name='leyenda[]'"
            		+ "	  placeholder='Leyenda (opcional)'"
					+ "   class='form-control input_dinamic mb-1' />";
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