		<div class="navbar">
			<?php
			 	foreach ($paginas as $pagina) {
			 		printf(
			 			"<a href='#' class='nav__item d-none d-md-block'>
			 				<p class='nav__label'>%s</p>
			 			</a>",
			 			$pagina['titulo']
			 		);
			 	}
			 ?>
			<a class='menu__container d-block d-md-none' id='navbar_btn'>
	         	<span class='menu mr-4'></span>
	      	</a>
		</div>