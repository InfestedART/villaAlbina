<?php
$dir = base_url().'assets/';
?>

<div class="footer" id='footer'> 
	<div class="container">

		<div class='row footer__row hidden text-center' id='footer_mapa'>
			<div class='col-12'>
				<div class='footer__close'>
					<span class=' footer__btn' id='close_mapa' />
						<i class='fa fa-times'></i>
					</span>
				</div>
				<div class='footer__mapa'>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1352.448327657117!2d-68.12873352127164!3d-16.510867908389315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f20629ca5e4eb%3A0x9d278a907c8ede66!2sSim%C3%B3n+I.+Pati%C3%B1o+space!5e0!3m2!1sen!2sbo!4v1559412325871!5m2!1sen!2sbo&language=es" width='100%' height="100%" frameborder="0" style="border:0" allowfullscreen>
					</iframe>
				</div>
			</div>
		</div>

		<div class='row footer__row'>
		<div class='col-12'>

			<div class='footer__address'>

				<div class='footer__contacto mb-3 footer__btn' id='find_us'>
					<a href='#footer_correos' >
						<i class="fas fa-map-marker-alt" aria-hidden="true"></i>
						<span>ENCUÉNTRANOS</span>				
					</a>
				</div>

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
							ESPACIO SIMÓN I PATIÑO
						</p>
						<p class='footer__direccion'>
							Sopocachi, av. Ecuador entre c. Rosendo Gutiérrez y Quito
						</p>
						<p class='footer__direccion'>Tel. +591 2410329 • Cel. 77270407</p>
						<p class='footer__direccion'>espacio@fundacionpatino.org</p>
					</div>
				</div>
			</div>

			<div class='footer__address mt=1' id='footer_correos'>
				<div class='footer__contacto mb-3'>
				<a href='convocatorias?buscar=beca' target="_top">
					<span>INFORMACIÓN SOBRE BECAS</span>
				</a>
				</div>

				<p class='footer__titulo mb-2'>CORREOS DE CONTACTO</p>
				<?php
					foreach ($areas as $area) {
						printf("
						<p class='footer__direccion'>
							<span class='footer__subtitulo'> %s </span>
							<span> %s%s </span>
						</p>",
						$area['area'],
						$area['correo']."@fundacionpatino.org",
						$area['id_area'] == 1
							? ', m.tapia@fundacionpatino.org'
							: ''
					);
						
					}
				?>	
				<p class='footer__direccion'>
					<span class='footer__subtitulo'> Subscripciones: </span>
					<span> espacio@fundacionpatino.org</span>
				</p>			
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
	<script src=<?php  echo $dir."js/footer_app.js"; ?> ></script>
	</div>
</div>