(function () {
	'use strict';

function main() {

	const new_portada_btn = document.getElementById('new_portada_btn');
	const edit_portada_btn = document.getElementById('edit_portada_btn');
	const color_input = document.getElementById('color');
	const color_switch = document.getElementById('color_switch');
	const area = document.getElementById('area');
	const area_hidden = document.getElementById('area_hidden');
	const color__input_label = document.getElementById('color__input_label');
	const real_color = document.getElementById('real_color').value;

	var initial_color = 'rgb(239,125,0)';	
	if (real_color && real_color.indexOf('a') >= 0) {
		initial_color = real_color.replace('a', '')
			.substr(0, real_color.lastIndexOf(',')-1)
			+')';
	}

	var picker = new CP(document.getElementById('color'));	

	picker.set(initial_color);
	picker.on("change", function(color) {
		var rgb = CP.HEX2RGB(color);
		var rgb_color = 'rgb('+rgb[0]+','+rgb[1]+','+rgb[2]+')';
		color_input.style.backgroundColor = rgb_color;
		color_input.value = rgb_color;
	});
	function update_picker() {
		console.log(this.value);
    	picker.set(this.value).enter();
	}

    picker.source.oncut = update_picker;
    picker.source.onpaste = update_picker;
    picker.source.onkeyup = update_picker;
    picker.source.oninput = update_picker;

	function form_validation() {
		const form_portada = document.getElementById('form_portada');	
		const portada = document.getElementById('portada');
		const portada_alert = document.getElementById('portada_alert');
		portada.classList.remove('input-error');
		const form_is_validated = portada.value.trim() !== '';
		let error = '';

		if (form_is_validated) {
			form_portada.submit();
		} else {
			error = 'No seleccionó ninguna imagen';
			portada.classList.add('input-error');		
		}
		portada_alert.innerHTML = error;
	}

	function switch_color() {
		var cat_color = area_hidden.options[area.value].innerHTML;
		var switch_value = color_switch.checked
		color_input.disabled = switch_value;
		color_input.value = !switch_value ? 'rgb(239,125,0)' : '';
		color_input.style.backgroundColor = !switch_value ? 'rgb(239,125,0)' : cat_color;
		if (switch_value) {
			color__input_label.classList.add('form-label--disabled');
		} else {
			color__input_label.classList.remove('form-label--disabled');
		}
	}

	function show_color() {
		const color_preview = document.getElementById('color_preview');
		const color_switch_label = document.getElementById('color_switch_label');
		area_hidden.value = area.value;
		var area_color = area_hidden.options[area.value].innerHTML;

		if (area_color && area.value > 0) {
			color_switch.disabled = false;
			color_switch_label.classList.remove('form-label--disabled');
			color_preview.classList.remove('hidden');
			color_preview.style.backgroundColor = area_color;
		} else {
			color_switch.checked = false;
			color_switch.disabled = true;
			color_input.disabled = false;
			color_input.value = 'rgb(239,125,0)';
			color_input.style.backgroundColor = 'rgb(239,125,0)';
			color_switch_label.classList.add('form-label--disabled');
			color_preview.classList.add('hidden');
			color__input_label.classList.remove('form-label--disabled');
			color_preview.style.backgroundColor = 'white';
		}
	}

	new_portada_btn.addEventListener('click', function(ev){
		form_validation();
	});

	color_switch.addEventListener('click', function(ev){
		switch_color();
	});

	area.addEventListener('change', function(ev){
		show_color();
	});
}
	
	window.addEventListener('load' , main);
})();