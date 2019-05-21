(function () {
	'use strict';

	function main() {	
		const titulos = document.getElementsByClassName('noticia__titulo');
		const descripcion = document.getElementsByClassName('noticia__descripcion');
		for (let i=0; i<titulos.length; i++) {
			$clamp(titulos[i], {clamp: 3, useNativeClamp: false});
		}
		for (let i=0; i<descripcion.length; i++) {
			$clamp(descripcion[i], {clamp: 7, useNativeClamp: false});
		}
				
	}

	window.addEventListener('load' , main);
})();
