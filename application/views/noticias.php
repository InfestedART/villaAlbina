<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$dir = base_url().'assets/';

?>

<!DOCTYPE html>
<head>
	<?php
		$data['title'] = 'Noticias';
		$this->load->view('templates/meta', $data);
	?>
</head>

<body>

	<?php
		$data['paginas'] = $paginas;
		$this->load->view('templates/navbar', $data);
	?>
	<div class="seccion container seccion__last px-4 pt-0 pt-md-3">

		<h3 class='titulo-pagina'> NOTICIAS </h3>	

		<div class='buscador'>
			<input class='buscador__input' type="text" name='buscar_noticia'/>
			<button class='buscador__button' type='submit'>
				<i class="fa fa-search"></i>
			</button>
		</div>

		<div class='row'>
		<?php			
		foreach ($noticias as $noticia) {
			printf(
				"<div class='noticia col-12 col-sm-6 col-md-4'>
					<div
						class='noticia__imagen'
						style='background-image: url(\"%s%s\")'
						>
						<span class='noticia__tipo'>%s</span>
						<span class='noticia__fecha'>%s</span>
					</div>
					<h5 class='noticia__titulo'>%s</h5>
					<p class='noticia__descripcion'>%s</p>
					<a href='%s' class='noticia__btn'> Leer Mas </a>
				</div>",
					$dir,
					$noticia['imagen_destacada'],
					$noticia['tipo'],
					date("d.m.Y", strtotime($noticia['fecha'])),
					$noticia['titulo'],
					$noticia['resumen'],
					base_url().'noticia/?id='.$noticia['id_post']
				);
			}
		?>
		</div>

	</div>
	
<?php
	$this->load->view('templates/footer'); 
?>

</body>

</html>