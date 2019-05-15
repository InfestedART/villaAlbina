(function () {
	'use strict';

	function main() {
		console.log('entra');

		const navbar_search = document.getElementById('navbar_search');
		const navbar = document.getElementById('navbar');		
		
		function show_sidebar() {
			console.log('show_sidebar');
			// navbar.classList.add('navbar__tall');
			// search_container.classList.remove('hidden');
		}

		navbar_search.addEventListener('click', function(ev){
			show_sidebar();
		});
	}

	window.addEventListener('load' , main);
})();