(function () {
	'use strict';

function Slideshow( element ) {
		this.el = document.querySelector( element );
		this.init();
	}
	
	Slideshow.prototype = {
		init: function() {
			this.wrapper = this.el.querySelector( ".slider-wrapper" );
			this.slides = this.el.querySelectorAll( ".slide" );
			this.previous = this.el.querySelector( ".slider-previous" );
			this.next = this.el.querySelector( ".slider-next" );
			this.index = 0;
			this.total = this.slides.length;
			this.timer = null;
			
			this.action();
		},
		_slideTo: function( slide ) {
			var currentSlide = this.slides[slide];
			currentSlide.style.opacity = 1;
			
			for( var i = 0; i < this.slides.length; i++ ) {
				var slide = this.slides[i];
				if( slide !== currentSlide ) {
					slide.style.opacity = 0;
				}
			}
		},
		action: function() {
			var self = this;
			self.timer = setInterval(function() {
				self.index++;
				if( self.index == self.slides.length ) {
					self.index = 0;
				}
				self._slideTo( self.index );				
			}, 5000);
		}		
	};
	
	function main() {	
		const wrapper = document.getElementById('wrapper');
		const navbarPos = document.getElementById('navbar').offsetTop;

		function fixNavbar(ev) {
			const pagePos = document['documentElement' || 'body'].scrollTop;
			const distance = navbarPos - pagePos;
			
			if (distance < 0) {
				wrapper.classList.add('fixed-navbar');
			} else {
				wrapper.classList.remove('fixed-navbar');
			}
		}

		window.addEventListener('scroll' , fixNavbar);
	}

	window.addEventListener('load' , main);

	document.addEventListener( "DOMContentLoaded", function() {		
		var slider = new Slideshow("#slider");		
	});

})();