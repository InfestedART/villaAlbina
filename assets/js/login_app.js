(function () {
	'use strict';

	function main() {	
		const login_btn = document.getElementById('login_btn');
		const login_form = document.getElementById('login_form');
		const login_alert = document.getElementById('login_alert');
		
		const form_validation = () => {
			const login_username = document.getElementById('login_username');
			const login_password = document.getElementById('login_password');
			const username = login_username.value.trim();
			const password = login_password.value.trim();

			const testResult = username !== '' && password !== '';
			if (testResult) {
				login_form.submit();
			} else {
				login_alert.innerHTML = 'Form not complete!';
			}
		}

		login_btn.addEventListener('click', function(ev){
			form_validation();
		});

		login_password.addEventListener('keypress', function(ev) {
			const key = ev.keyCode;
			if (key === 13) {
				form_validation();
			} 
		});

		login_username.addEventListener('keypress', function(ev) {
			const key = ev.keyCode;
			if (key === 13) {
				form_validation();
			} 
		});
	}

	window.addEventListener('load' , main);
})();