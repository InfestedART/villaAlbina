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
		const navbar = document.getElementById('navbar');
		const navbarContainer = document.getElementById('nav_item_container');
		const allContainers = document.getElementsByClassName('nav__container');
		const inicio = document.getElementById('inicio');
		// const navbar_logo = document.getElementById('navbar_logo');
		console.log(allContainers);
		fixNavbar();

		function fixNavbar(ev) {
			const pagePos = document['documentElement' || 'body'].scrollTop;
			const distance = navbar.offsetTop - pagePos;
			const pageWidth = Math.max(
			    document.body.scrollWidth,
			    document.documentElement.scrollWidth,
			    document.body.offsetWidth,
			    document.documentElement.offsetWidth,
			    document.documentElement.clientWidth
			);
			const navbarWidth = navbarContainer.offsetWidth;

			if (pageWidth-16-178 < navbarWidth) {
				navbar.classList.add('navbar__tall');
				navbarContainer.classList.add('nav_container_tall')
				// navbar_logo.classList.add('navbar__logo_tall')
			} else {
				navbar.classList.remove('navbar__tall');
				navbarContainer.classList.remove('nav_container_tall')				
				// navbar_logo.classList.remove('navbar__logo_tall')
			}
			
			if (distance < 0) {
				wrapper.classList.add('fixed-navbar');
				// navbarContainer.classList.add('navbar_inline');
				inicio.classList.remove('d-none')
			} else {
				wrapper.classList.remove('fixed-navbar');
				// navbarContainer.classList.remove('navbar_inline');
				inicio.classList.add('d-none')
			}
		}

		window.addEventListener('scroll' , fixNavbar);
	}

	window.addEventListener('load' , main);

	document.addEventListener( "DOMContentLoaded", function() {		
		var slider = new Slideshow("#slider");		
	});

})();