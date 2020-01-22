(function () {
	'use strict';

	function main() {			
		const calendar = document.getElementById('calendar');

	    var picker = new Pikaday({
	    	field: calendar,
	    	format: 'YYYY-MM-DD',
	    	i18n: {
			    previousMonth : 'Previous Month 1',
			    nextMonth     : 'Next Month 2',
			    months        : [
			    	'Enero',
			    	'Febrero',
			    	'Marzo',
			    	'Abril',
			    	'Mayo',
			    	'Junio',
			    	'Julio',
			    	'Agosto',
			    	'Septiembre',
			    	'Octubre',
			    	'Noviembre',
			    	'Diciembre'
			    ],
			    weekdays      : [
			    	'Domingo',
			    	'Lunes',
			    	'Martes',
			    	'Miercoles',
			    	'Jueves',
			    	'Viernes',
			    	'Sábado'
			    ],
			    weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sab']
			},
	    	toString(date, format) {
	          	const day = ("0" + date.getDate()).slice(-2);
	           	const month = ("0" + (date.getMonth() + 1)).slice(-2);
	           	const year = date.getFullYear();
	           	return `${year}-${month}-${day}`;
	    	},
	    	parse(dateString, format) {
	        	const parts = dateString.split('-');
	           	const year = parseInt(parts[0], 10);
	           	const month = parseInt(parts[1], 10) - 1;
	           	const day = parseInt(parts[2], 10);
	           	const fecha = new Date(year, month, day);
	          	return fecha;
	    	}
		});
	}

	window.addEventListener('load' , main);
})();