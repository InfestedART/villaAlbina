	<?php
		$dir = base_url().'assets/';
	?>

	<div class="navbar fixed-navbar" id='navbar'>

		<a href='<?php echo base_url(); ?>' class='navbar__logo d-block' id='navbar_logo'>
			<img src='<?php echo $dir.'img/logo.png'; ?>' />
      	</a>

		<div class='navbar__row'>

	      	<div class='nav__item-container'>
				<?php
			 	foreach ($paginas as $pagina) {
			 		$link = $pagina['external_url'] 
			 			? $pagina['enlace']
			 			: base_url().$pagina['enlace'];
			 		printf(
			 			"<a href='%s' class='nav__item d-none d-md-inline-block %s' %s>
			 				<p class='nav__label'>%s</p>
			 			</a>",
			 			$link,
			 			$selected_pagina['titulo'] == $pagina['titulo'] ? 'navbar__selected' : '',
			 			$pagina['external_url'] ? "target='_blank'" : "",
			 			$pagina['titulo']
			 		);
			 	}
				 ?>
			 	<a
			 		href="#"
			 		class="nav__item d-none d-md-inline-block <?php			 	
						if (!$selected_pagina['enable_search']) {
							echo 'hidden';
						}				
			 		?>"
			 	>
			 		<i class='nav__item fa fa-search' id='navbar_search'></i>
			 	</a>
			</div>

			<a class="menu__container d-block d-md-none" id='navbar_btn'>
	         	<span class='menu mr-4'></span>
	      	</a>

	      	 <script src=<?php  echo $dir."js/navbar_app.js"; ?> ></script>
	    </div>

	<div class='navbar__row hidden' id='search_container'>
		<?php
			echo form_open(
               $selected_pagina['enlace'],
               array('id' => 'form_buscar')
            );
         ?>
			<input
				class='navbar__search'
				name='buscar'
				id='buscar'
				value='<?php echo $search; ?>'
			/>
		<button class='navbar__search_btn'>Buscar</button>
		<?php echo form_close(); ?>
	</div>
	</div>