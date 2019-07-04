(function () {
	'use strict';

	function main() {	

		tinymce.init({
	    selector: '#contenido',
	    plugins: 'code fullscreen lists link table paste', 
	    toolbar: [
			'formatselect fontselect fontsizeselect | cut copy paste | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | table | blockquote code | fullscreen '
			],
		language : 'es_MX',
		paste_text_sticky : true,
		language_url : '../assets/langs/es_MX.js'
	  });

	}

	window.addEventListener('load' , main);
})();
