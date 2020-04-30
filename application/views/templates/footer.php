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
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9056.747811400686!2d-66.3216556637658!3d-17.368862534558275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e30a32a76b4c7b%3A0x732e8511972d2be2!2sVilla%20Albina%20de%20Pati%C3%B1o!5e0!3m2!1sen!2sbo!4v1579964970892!5m2!1sen!2sbo" width='100%' height="100%" frameborder="0" style="border:0" allowfullscreen>
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
				<a href='mailto:museo.villaalbina@fundacionpatino.org' target="_top">
					<i class="far fa-envelope" aria-hidden="true"></i>
					<span>CONTACTO</span>
				</a>
				</div>

			</div>

			<div class='footer__address mt=1' id='footer_correos'>
				<div class='footer__address_row'>
					<div class="footer__icono-direccion d-inline-block">
						<img
							class="footer__icono"
							src="<?php echo $dir.'img/icono_direccion.png'; ?>" 
						/>
					</div>
					<div class="d-inline-block mr-2">
						<p class='footer__direccion footer__titulo'> Casa Museo Villa Albina </p>
						<p class='footer__direccion'>Tel. 4010470 – Int. 219</p>
						<p class='footer__direccion'>museo.villaalbina@fundacionpatino.org</p>
						<p class='footer__direccion'>Cochabamba - Bolivia</p>
					</div>
				</div>	
			</div>

			<div class='footer__social-media'>				
				<div
					class="footer__icono footer__facebook"
					src="<?php echo $dir.'img/icono_facebook.png'; ?>" 
				>
					<a class='footer__link' target="_blank" href='https://www.facebook.com/MuseoVillaAlbina/'></a>
				</div>
				<div
					class="footer__icono footer__instagram"
					src="<?php echo $dir.'img/icono_instagram.png'; ?>" 
				>
				<a class='footer__link' target="_blank" href='https://www.instagram.com/museovillaalbina/'></a>
				</div>
			</div>

		</div>
		</div>
	<script src=<?php  echo $dir."js/footer_app.js"; ?> ></script>
	</div>
</div>