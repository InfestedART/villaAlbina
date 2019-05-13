(function () {
	'use strict';

	function main() {	
		const expand_btn = document.getElementsByClassName('expand_btn');
		var showing = {};
		
		function expand_area(id) {
			const area = document.getElementById('area_'+id);
			const subareas = document.getElementsByClassName(id);

			if (showing[(id)]) {
				for(var i = 0; i < subareas.length; i++) {
					subareas[i].classList.add('hidden');
				}
				area.classList.remove('open');
				area.classList.add('closed');
				area.innerHTML = "<i class='fa fa-plus' id='"+id+"'></i>";
			} else {
				for(var i = 0; i < subareas.length; i++) {
					subareas[i].classList.remove('hidden');
				}
				area.classList.add('open');
				area.classList.remove('closed');
				area.innerHTML = "<i class='fa fa-minus' id='"+id+"'></i>";
			}
			showing[(id)] = !showing[(id)];
		}

		for(var i=0; i<expand_btn.length; i++) {
			const open_area = document.getElementsByClassName('open');
			const index = expand_btn[i].id.substr(expand_btn[i].id.indexOf('_')+1)
			showing[index] = false;

			if (open_area[0]) {
				const open_index = open_area[0].id.substr(open_area[0].id.indexOf('_')+1)
				if (expand_btn[i].id == open_area[0].id) {
					showing[open_index] = true;
				}
			}

			expand_btn[i].addEventListener('click', function(ev){
				expand_area(ev.target.id);
			});
		}
		
	}

	window.addEventListener('load' , main);
})();