(function () {
	'use strict';

	function main() {	
		const expand_btn = document.getElementsByClassName('expand_btn');
		var showing = [];
		
		function expand_area(id) {
			const area = document.getElementById('area_'+id);
			const subareas = document.getElementsByClassName(id);

			if (showing[id]) {
				for(var i = 0; i < subareas.length; i++) {
					subareas[i].classList.add('hidden');
				}
				area.innerHTML = "<i class='fa fa-plus' id='"+id+"'></i>";
			} else {
				for(var i = 0; i < subareas.length; i++) {
					subareas[i].classList.remove('hidden');
				}
				area.innerHTML = "<i class='fa fa-minus' id='"+id+"'></i>";
			}
			showing[id] = !showing[id];
		}

		for(var i=0; i<expand_btn.length; i++) {
			showing[i] = false;
			expand_btn[i].addEventListener('click', function(ev){
				expand_area(ev.target.id);
			});
		}
	}

	window.addEventListener('load' , main);
})();