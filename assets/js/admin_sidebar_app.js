(function () {
	'use strict';

	function main() {
		const collapse_btn = document.getElementById('collapse_btn');
		const expand_btn = document.getElementById('expand_btn');
		const sidebar = document.getElementById('sidebar');
		const admin_container = document.getElementsByClassName('admin-container');

		function collapse_sidebar() {
			sidebar.classList.add('collapsed');	
			admin_container[0].classList.add('container-expanded');	
			collapse_btn.classList.add('hidden');
			expand_btn.classList.remove('hidden');
		}

		function expand_sidebar() {
			sidebar.classList.remove('collapsed');	
			admin_container[0].classList.remove('container-expanded');	
			expand_btn.classList.add('hidden');
			collapse_btn.classList.remove('hidden');
		}

		collapse_btn.addEventListener('click', function(ev){
			collapse_sidebar();
		});

		expand_btn.addEventListener('click', function(ev){
			expand_sidebar();
		});
	}

	window.addEventListener('load' , main);
})();