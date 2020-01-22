(function () {
	'use strict';

	function main() {	

		tinymce.init({
	    selector: '#contenido',
	    plugins: 'code fullscreen lists link table', 
	    toolbar: [
			'formatselect fontselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |',
			'cut copy paste | forecolor backcolor | link | table | blockquote code | fullscreen |'
			],
		language : 'es_MX',
		language_url : '../../assets/langs/es_MX.js'
	  });

	}

	window.addEventListener('load' , main);
})();
