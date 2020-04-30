<?php
	$dir = base_url().'assets/';
?>
	<div class='row'>
		<div class='col-md-5'>
			<?php
				printf("
					<h3 class='publicacion__sub-titulo' style='color:%s'>%s</h3>
					<div class='publicacion__column'>%s</div>",
					$color,
					$subpag['titulo'],
					$subpag['html']
				)
			?>
			</div>
		<div class='publicacion__container col-md-7' >
			<div class='galeria__img-container'>
				<div class='galeria__iframe'>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9056.747811400686!2d-66.3216556637658!3d-17.368862534558275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e30a32a76b4c7b%3A0x732e8511972d2be2!2sVilla%20Albina%20de%20Pati%C3%B1o!5e0!3m2!1sen!2sbo!4v1579964970892!5m2!1sen!2sbo" width=100% height=100% frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
	</div>