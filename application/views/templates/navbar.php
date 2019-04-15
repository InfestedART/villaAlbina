	<?php
		$dir = base_url().'assets/';
	?>

		<div class="navbar fixed-navbar">
			<a href='<?php echo base_url(); ?>' class='navbar__logo d-block' id='navbar_logo'>
				<img src='<?php echo $dir.'img/logo.png'; ?>' />
	      </a>
	      <div class='nav__item-container'>
			<?php
			 	foreach ($paginas as $pagina) {
			 		$link = base_url().$pagina['enlace'];
			 		printf(
			 			"<a href='%s' class='nav__item d-none d-md-inline-block' >
			 				<p class='nav__label'>%s</p>
			 			</a>",
			 			$link,
			 			$pagina['titulo']
			 		);
			 	}
			 ?>
			</div>
			<a class='menu__container d-block d-md-none' id='navbar_btn'>
	         	<span class='menu mr-4'></span>
	      	</a>
		</div>