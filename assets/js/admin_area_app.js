(function () {
	'use strict';

	function main() {

		const area_btn = document.getElementById('area_btn');
		const color_switch = document.getElementById('color_switch');
		const color_input = document.getElementById('color');
		const real_color = document.getElementById('real_color').value;
		
		var picker = new CP(document.getElementById('color'));

		var initial_color = 'rgb(239, 125, 0)';
		if (real_color) {
			initial_color = real_color.replace('a', '')
				.substr(0, real_color.lastIndexOf(',')-1)
				+')';
		}

		picker.set(initial_color);
		picker.on("change", function(color) {
			var rgb = CP.HEX2RGB(color);
			var rgb_color = 'rgba('+rgb[0]+','+rgb[1]+','+rgb[2]+', 1)';
			color_input.style.backgroundColor = rgb_color;
			color_input.value = rgb_color;
		});

		if (color_switch.checked) {
			color_input.style.backgroundColor = 'white';
			color_input.value = '';	
			picker.set('rgb(255, 255, 255)');		
		}

		const preview_img = document.getElementById('preview_img');
		const hide_preview_btn = document.getElementById('hide_preview_btn');
		const imagen = document.getElementById('imagen');
		const show_preview_btn = document.getElementById('show_preview_btn');

		function hide_preview() {
			const delete_area = document.getElementById('delete_area');
			preview_img.classList.add('hidden');
			hide_preview_btn.classList.add('hidden');
			imagen.classList.remove('hidden');
			show_preview_btn.classList.remove('hidden');
			delete_area.value = '1';			
		}

		function show_preview() {
			const delete_area = document.getElementById('delete_area');
			preview_img.classList.remove('hidden');
			hide_preview_btn.classList.remove('hidden');
			imagen.classList.add('hidden');
			show_preview_btn.classList.add('hidden');
			delete_area.value = '0';			
		}

		function form_validation() {
			const form_area = document.getElementById('form_area');	
			const area = document.getElementById('area');
			const area_alert = document.getElementById('area_alert');
			area.classList.remove('input-error');
			const form_is_validated = area.value.trim() !== '';
			let error = '';

			if (form_is_validated) {
				form_area.submit();
			} else {
				error = "El campo 'área' es obligatorio";
				area.classList.add('input-error');		
			}
			area_alert.innerHTML = error;			
		}

		function switch_color() {
			var switch_value = color_switch.checked;
			if (switch_value) {
				color__input_label.classList.add('form-label--disabled');
				color_input.style.backgroundColor = 'white';
				color_input.value = '';
				color_input.disabled = true;
			} else {
				color__input_label.classList.remove('form-label--disabled');
				color_input.style.backgroundColor = initial_color;
				color_input.value = initial_color;
				color_input.disabled = false;				
			}
		}

		if (hide_preview_btn && show_preview_btn) {
			hide_preview_btn.addEventListener('click', function(){
				hide_preview();
			});

			show_preview_btn.addEventListener('click', function(){
				show_preview();
			});	
		}

		area_btn.addEventListener('click', function(ev){
			form_validation();
		});

		color_switch.addEventListener('click', function(ev){
			switch_color();
		});
	}

	window.addEventListener('load' , main);

})();