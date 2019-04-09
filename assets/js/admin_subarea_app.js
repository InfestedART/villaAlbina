(function () {
	'use strict';

	function main() {
		const subarea_btn = document.getElementById('subarea_btn');

		function form_validation() {
			const form_subarea = document.getElementById('form_subarea');	
			const subarea = document.getElementById('subarea');
			const area = document.getElementById('area');
			const subarea_alert = document.getElementById('subarea_alert');

			subarea.classList.remove('input-error');
			area.classList.remove('input-error');
			let error = '';

			const form_is_validated = subarea.value.trim() !== ''	&& area.value > 0 ;

			if (form_is_validated) {
				form_subarea.submit();
			} else {
				if (area.value < 1 || !area.value.trim()) {
					error = 'Seleccione una opción';
					area.classList.add('input-error');						
				}				
				if (subarea.value.trim() == '') {
					error = 'Campo nombre de subarea es obligatorio';
					subarea.classList.add('input-error');	
				}	
			}
			subarea_alert.innerHTML = error;			
		}

		subarea_btn.addEventListener('click', function(ev){
			form_validation();
		});

	}

	window.addEventListener('load' , main);

})();