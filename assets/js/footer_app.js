(function () {
	'use strict';

	function main() {
		const footer_mapa = document.getElementById('footer_mapa');
		const find_us = document.getElementById('find_us');
		const close_mapa = document.getElementById('close_mapa');

		function show_mapa() {
			footer_mapa.classList.remove('hidden');
		}

		function hide_mapa() {
			footer_mapa.classList.add('hidden');
		}

		find_us.addEventListener('click', function(ev){
			show_mapa();
		});

		close_mapa.addEventListener('click', function(ev){
			hide_mapa();
		});
	}

	window.addEventListener('load' , main);
})();