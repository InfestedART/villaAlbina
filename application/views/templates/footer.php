<?php
$dir = base_url().'assets/';
?>

<div class="footer" id='footer'> 
	<div class="container">

		<div class='row'>
		<div class='col-12'>

			<!-- div class='footer__address'>
				<div class="footer__icono-direccion d-inline-block">
					<img
						class="footer__icono"
						src="<?php echo $dir.'img/icono_direccion.png'; ?>" 
					/>
				</div>
				<div class="d-inline-block">
					<p class='footer__direccion footer__titulo'>ANEXO DEL ESPACIO PATIÑO</p>
					<p class='footer__direccion'>
						Av.Ecuador 2475 esq Belisario Salinas
					</p>
					<p class='footer__direccion'>
						Casilla 3289 • Tel. (+591 2) 241 09329 int. 235
					</p>
				</div>
			</div -->


			<div class='footer__address'>
				<div class='footer__contacto mb-3'>
				<a href='mailto:espacio@fundacionpatino.org' target="_top">
					<i class="far fa-envelope" aria-hidden="true"></i>
					<span>CONTACTO</span>
				</a>
				</div>

				<div class='footer__address_row'>
					<div class="footer__icono-direccion d-inline-block">
						<img
							class="footer__icono"
							src="<?php echo $dir.'img/icono_direccion.png'; ?>" 
						/>
					</div>
					<div class="d-inline-block mr-2">
						<p  class='footer__direccion footer__titulo'>
							ESPACIO SIMON I PATIÑO
						</p>
						<p class='footer__direccion'>
							Sopocachi, av. Ecuador entre c. Rosendo Gutiérrez y Quito
						</p>
						<p class='footer__direccion'>Tel. +591 2 2111717 • Cel. 76737008</p>
						<p class='footer__direccion'>espacio@fundacionpatino.org</p>
					</div>
				</div>
			</div>

			<div class='footer__address mt-2'>
				<p class='footer__titulo mb-2'>CORREOS DE CONTACTO</p>
				<?php
					foreach ($areas as $area) {
						printf("
						<p class='footer__direccion'>
							<span class='footer__subtitulo'> %s </span>
							<span> %s </span>
						</p>",
						$area['area'],
						$area['correo']."@fundacionpatino.org"
					);
						
					}
				?>				
			</div>

			<div class='footer__social-media'>
				<a target="_blank" href='https://www.youtube.com/channel/UCZ0QS5r49eMNQUWwHfvfo3w/'>
					<img
						class="footer__icono"
						src="<?php echo $dir.'img/icono_youtube.png'; ?>" 
					/>
				</a>
				<a target="_blank" href='https://twitter.com/espacio_patino'>
					<img
						class="footer__icono"
						src="<?php echo $dir.'img/icono_twitter.png'; ?>" 
					/>
				</a>
				<a target="_blank" href='https://www.facebook.com/EspacioSimonIPatino/'>
					<img
						class="footer__icono"
						src="<?php echo $dir.'img/icono_facebook.png'; ?>" 
					/>
				</a>
			</div>

		</div>
		</div>

	</div>
</div>