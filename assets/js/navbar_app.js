(function () {
	'use strict';

	function main() {		
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
				console.log('tall');
				navbar.classList.add('navbar__tall');
				navbarContainer.classList.add('nav_container_tall')
				navbar_logo.classList.add('navbar__logo_tall')
			}

		}

		function show_searchbar() {			
			navbar.style.height = navbar.offsetHeight + 40 + 'px';
			search_container.classList.remove('hidden');
		}

		navbar_search.addEventListener('click', function(ev){
			show_searchbar();
		});
	}

	window.addEventListener('load' , main);
})();