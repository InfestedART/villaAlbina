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
			var rgb_color = 'rgba('+rgb[0]+','+rgb[1]+', '+rgb[2]+', 1)';
			color_input.style.backgroundColor = rgb_color;
			color_input.value = rgb_color;
		});

		if (color_switch.checked) {
			color_input.style.backgroundColor = 'white';
			color_input.value = '';	
			picker.set('rgb(255, 255, 255)');		
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

		area_btn.addEventListener('click', function(ev){
			form_validation();
		});

		color_switch.addEventListener('click', function(ev){
			switch_color();
		});
	}

	window.addEventListener('load' , main);

})();