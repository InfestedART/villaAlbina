(function () {
	'use strict';

	function main() {	
		const wrapper = document.getElementById('wrapper');
		const navbarPos = document.getElementById('navbar').offsetTop;

		function fixNavbar(ev) {
			const pagePos = document['documentElement' || 'body'].scrollTop;
			const distance = navbarPos - pagePos;
			
			if (distance < 0) {
				wrapper.classList.add('fixed-navbar');
			} else {
				wrapper.classList.remove('fixed-navbar');
			}
		}

		window.addEventListener('scroll' , fixNavbar);

	}

	window.addEventListener('load' , main);
})();