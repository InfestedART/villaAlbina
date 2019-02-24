(function () {
	'use strict';

	function main() {	
		const newUser_btn = document.getElementById('newUser_btn');
		const newUser_form = document.getElementById('newUser_form');
		const newUser_alert = document.getElementById('newUser_alert');

		function form_validation() {
			const newUser_username = document.getElementById('newUser_username');
			const newUser_password = document.getElementById('newUser_password');
			const newUser_confirmPass = document.getElementById('newUser_confirmPass');
			let error = '';
			if (newUser_password.classList.contains('input-error')) {
				newUser_password.classList.remove('input-error');
			}
			if (newUser_username.classList.contains('input-error')) {
				newUser_username.classList.remove('input-error');
			}
			if (newUser_confirmPass.classList.contains('input-error')) {
				newUser_confirmPass.classList.remove('input-error');
			}

			const form_is_validated = newUser_username.value.trim() !== ''
				&& newUser_password.value.trim() !== ''
				&& newUser_password.value.trim() === newUser_confirmPass.value.trim();

			if (form_is_validated) {
				console.log('adding new user');	
				newUser_form.submit();
			} else {								
				if ( newUser_password.value.trim() === '') {
					error = 'Campo contraseña incompleto';
					newUser_password.classList.add('input-error');			
				}
				if ( newUser_username.value.trim() === '') {
					error = 'Campo nombre de usuario incompleto';
					newUser_username.classList.add('input-error');	
				}
				if ( newUser_password.value.trim() !== newUser_confirmPass.value.trim()) {
					error = 'Las contraseñas no coinciden';
					newUser_confirmPass.classList.add('input-error');	
				}
				newUser_alert.innerHTML = error;
			}			
		}

		newUser_btn.addEventListener('click', function(ev){
			form_validation();
		})
	}

	window.addEventListener('load' , main);
})();