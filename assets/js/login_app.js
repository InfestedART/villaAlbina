(function () {
	'use strict';

	function main() {	
		const login_btn = document.getElementById('login_btn');
		const login_form = document.getElementById('login_form');
		const login_alert = document.getElementById('login_alert');
		
		const form_validation = () => {
			const login_username = document.getElementById('login_username').value.trim();
			const login_password = document.getElementById('login_password').value.trim();
			const testResult = login_username !== '' && login_password !== '';
			if (testResult) {
				console.log(login_form);
				document.getElementById('login_form').submit();
			} else {
				login_alert.innerHTML = 'Form not complete!';
			}
		}

		login_btn.addEventListener('click', function(ev){
			form_validation();
		})

		// TODO: add form_validation on enter click
	}

	window.addEventListener('load' , main);
})();