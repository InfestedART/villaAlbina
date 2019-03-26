(function () {
	'use strict';

	function main() {	
		const sidebar_btn = document.getElementById('sidebar_btn');
		const sidebar = document.getElementById('sidebar');

		sidebar_btn.addEventListener('click', function(ev){
			if (sidebar.classList.contains('visible')) {
				sidebar.classList.remove('visible');
			} else {
				sidebar.classList.add('visible');
			}
		});	
	}

	window.addEventListener('load' , main);
})();