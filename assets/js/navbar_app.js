(function () {
	'use strict';

	function main() {
		const navbar_menu = document.getElementById('navbar_menu');
		const navbar_search = document.getElementById('navbar_search');
		const navbar = document.getElementById('navbar');
		const navbarContainer = document.getElementById('nav_item_container');
		const allContainers = document.getElementsByClassName('nav__container');
		const search_container = document.getElementById('search_container');
		adjust_navbar()

		function adjust_navbar() {
			const pageWidth = Math.max(
			    document.body.scrollWidth,
			    document.documentElement.scrollWidth,
			    document.body.offsetWidth,
			    document.documentElement.offsetWidth,
			    document.documentElement.clientWidth
			);
			const navbarWidth = navbarContainer.offsetWidth;
			let navWidth = 0;
			for (let i=0; i<allContainers.length; i++) {
				navWidth += allContainers[i].offsetWidth
			}
			if (navWidth > navbarWidth) {
				navbar.classList.add('navbar__tall');
				navbarContainer.classList.add('nav_container_tall')
				navbar_logo.classList.add('navbar__logo_tall')
			}

		}

		function show_searchbar() {
			if (search_container.classList.contains('hidden')) {
				navbar.style.height = navbar.offsetHeight + 40 + 'px';
				search_container.classList.remove('hidden');	
			}			
		}

		function open_menu() {			
			if(!navbar.classList.contains('navbar__mobile'))	{
				navbar.classList.add('navbar__mobile');
			} else {
				navbar.classList.remove('navbar__mobile');
			}
		}

		navbar_search.addEventListener('click', function(ev){
			show_searchbar();
		});

		navbar_menu.addEventListener('click', function(ev){
			open_menu();
		});
	}

	window.addEventListener('load' , main);
})();