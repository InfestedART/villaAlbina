(function () {
	'use strict';

	function main() {
		const expand_btn = document.getElementsByClassName('expand_btn');

		var showing = {};

		function expand_pagina(id) {			
			const pagina = document.getElementById('pagina_'+id);
			const subpaginas = document.getElementsByClassName(id);

			if (showing[(id)]) {
				for(var i = 0; i < subpaginas.length; i++) {
					subpaginas[i].classList.add('hidden');
				}
				pagina.classList.remove('open');
				pagina.classList.add('closed');
				pagina.innerHTML = "<i class='fa fa-plus' id='"+id+"'></i>";
			} else {
				for(var i = 0; i < subpaginas.length; i++) {
					subpaginas[i].classList.remove('hidden');
				}
				pagina.classList.add('open');
				pagina.classList.remove('closed');
				pagina.innerHTML = "<i class='fa fa-minus' id='"+id+"'></i>";
			}
			showing[(id)] = !showing[(id)];
		}

		for(var i=0; i<expand_btn.length; i++) {
			const open_pagina = document.getElementsByClassName('open');
			const index = expand_btn[i].id.substr(expand_btn[i].id.indexOf('_')+1)
			showing[index] = false;

			if (open_pagina[0]) {
				const open_index = open_pagina[0].id.substr(open_pagina[0].id.indexOf('_')+1)
				if (expand_btn[i].id == open_pagina[0].id) {
					showing[open_index] = true;
				}
			}

			expand_btn[i].addEventListener('click', function(ev){
				expand_pagina(ev.target.id);
			});
		}	

	}

	window.addEventListener('load' , main);

})();