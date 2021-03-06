<?php
	$dir = base_url().'assets/';
?>

	<div class='form__alert <?php echo $alert ? "form__alert--exito" : "hidden"; ?>' id='alert'>
		Correo enviado existosamente
	</div>

	<div class='row formulario'>
		<div class='col-12'>

			<?php
				printf(
					"<h3 class='publicacion__sub-titulo' style='color:%s'>%s</h3>",
					$color,
					$subpag['titulo']
				);

				echo form_open_multipart(
                	'contact_form/'.$target,
                  	array(
                  		'id' => 'form_contacto',
                  		'class' => 'form__container'
                  	)
               	);
			?>

			<div class='form'>
				<div class='row no-gutters'>
				<?php

				$col = 1;		
				echo "<div class='form__col col-lg-6'>";

				foreach ($form_fields as $field) {

					if ($field->column == 2 && $col == 1) {
						echo "</div><div class='form__col col-lg-6'>";
						$col++;
					}

					switch ($field->type) {
						case 'calendar':
							printf("
								<div class='form__row'>
									<label class='form__label'>%s</label>
									<input id='calendar' name='%s' class='form__input form__input--calendar' />
								</div>",
								$field->label,
								$field->name
							);
							break;
						case 'radio':
							printf("
								<div class='form__row'>
									<label class='form__label'>%s</label>
									<label class='form__label'>
										<input class='form__radio' name='%s' id='colegio' value='colegio' type=radio />
										Colegio
									</label>
									<label class='form__label'>
										<input class='form__radio' name='%s' id='universidad' value='universidad' type=radio />
										Universidad
									</label>
									<label class='form__label'>
										<input class='form__radio' name='%s' id='otro' value='otro' type=radio />
										Otro (especificar)
									</label>
									<input class='form__input' name='otro_input' id='otro_input' />
								</div>",
								$field->label,
								$field->name,
								$field->name,
								$field->name
							);
							break;
						case 'input':
							printf("
								<div class='form__row'>
									<label class='form__label'>%s</label>
									<input class='form__input' name='%s' />
								</div>",
								$field->label,
								$field->name
							);
							break;
						case 'textarea':
							printf("
								<div class='form__row'>
									<label class='form__label'>%s</label>
									<textarea
										class='form__input'
										name='%s' rows='%s'
									/></textarea>
								</div>",
								$field->label,
								$field->name,
								$field->rows
							);
							break;
							case 'note':
							printf("
								<div class='form__row'>
									<p class='form__text'>%s</p>									
								</div>",
								$field->text								
							);
							break;
						default:
							echo "";
							break;
					}
				}

				printf("
					<input type=hidden name='tipo' value ='%s '/>",
					$target
				);

				echo "</div>";

				?>
				</div>
			</div>

			<div class='form__submit'>
				<button class='form__btn' id='submit_btn' type="button">ENVIAR</button>
			</div>

			<?php echo form_close(); ?>

			<div class='mt-3'>				
			<?php
				if ($subpag['html']) {
					printf($subpag['html']);					
				}				
			?>						
			</div>

		</div>

	<script src=<?php  echo $dir."js/pickaday.js"; ?> ></script>
	<script src=<?php  echo $dir."js/formulario.js"; ?> ></script>
	</div>