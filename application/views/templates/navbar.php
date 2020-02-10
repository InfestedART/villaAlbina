	<?php
		$dir = base_url().'assets/';
		$show_searchbar = $search || $search_cat;
	?>

	<div
		class="navbar fixed-navbar"
		id='navbar'
		style="<? echo $show_searchbar ? 'height: 140px' : ''; ?>"
	>		
		<a href='<?php echo base_url(); ?>' class='navbar__logo d-block' id='navbar_logo'>
			<img src='<?php echo $dir.'img/logo_albina.png'; ?>' />
      	</a>

		<a href='#' class="navbar__menu" id='navbar_menu'>
         	<i class='fa fa-bars'> </i>
      	</a>

		<div class='navbar__row'>
	      	<div
	      		class='nav__item-container navbar_inline'
	      		id='nav_item_container'
	      	>
				<?php
			 	foreach ($paginas as $pagina) {
			 		$link = $pagina['external_url'] 
			 			? $pagina['enlace']
			 			: base_url().$pagina['enlace'];
			 		if ($pagina['id_pagina'] == 2) {
			 			printf(
			 				"<div class='nav__container navbar__dropdown'>
							   	<a
							   		href='%s'
							   		class='dropbtn nav__item %s'
							   	>	<p class='nav__label'> %s 
							      		<i class='fa fa-caret-down ml-1'></i>
							      	</p>
							    </a>
						    <div class='navbar__dropdown--content'>",
						    $link,
						    $selected_pagina['titulo'] == $pagina['titulo'] ? 'navbar__selected' : '',
						    $pagina['titulo']
						);
			 			
						printf("
						    </div>
						  </div>"
			 			);
			 		} else {
				 		printf(
				 			"<div class='nav__container'>
				 			<a href='%s' class='nav__item %s' %s>
				 				<p class='nav__label'>%s</p>
				 			</a></div>",
				 			$link,
				 			$selected_pagina['titulo'] == $pagina['titulo'] ? 'navbar__selected' : '',
				 			$pagina['external_url'] ? "target='_blank'" : "",
				 			$pagina['titulo']
				 		);	
			 		}			 		
			 	}
				?><a
			 		href="#"
			 		class="nav__item nav_search_container pl-0 <?php			 	
						if (!$selected_pagina['enable_search']) {
							echo 'hidden';
						}				
			 		?>"
			 	> <i class='nav__item fa fa-search' id='navbar_search'></i>
			 	</a>
			</div>

	      	 <script src=<?php  echo $dir."js/navbar_app.js"; ?> ></script>
	    </div>

		<div
			class="navbar__row <? echo $show_searchbar ? '' : 'hidden'; ?>"
			id='search_container'
		>
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
			<?php
				if ($selected_pagina['search_by_cat']) {
					$this->load->view('templates/'.$selected_pagina['search_by_cat']);	
				}
				
			?>
			<button class='navbar__search_btn'>Buscar</button>
		<?php echo form_close(); ?>
	</div>
	</div>