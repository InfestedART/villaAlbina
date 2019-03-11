(function () {
	'use strict';

	function main() {
		const collapse_btn = document.getElementById('collapse_btn');

		function collapse_sidebar() {
			console.log('collapsing sidebar');
		}

		collapse_btn.addEventListener('click', function(ev){
			collapse_sidebar();
		});
	}

	window.addEventListener('load' , main);
})();