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

		<div class='row pt-2 pb-4'>
			<div class="buscador col-md-6"><?php
				echo form_open(
               'noticias',
               array('id' => 'form_buscar_noticia')
            ); ?>
				<input
					class='buscador__input'
					name='buscar_noticia'
					id='buscar_noticia'
					value='<?php echo $search; ?>'
				/>
				<button class='buscador__button' type='submit' id='buscar_noticia_btn'>
					<i class="fa fa-search"></i>
				</button><?php
				echo form_close(); ?>
			</div>
		</div>

		<?php $show_no_results = sizeof($noticias) < 1 ? '' : 'd-none'; ?>
		<div class='no-results <?php echo $show_no_results; ?>'>
			<p>No se encontraron resultados con esos parametros de busqueda</p>
			<a class='no-result__volver' href=''>
				Ver todas las Noticias
			</a>
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

		<div class='row'>
			<div class='col-12 text-center'>
				<a href='#' class='showing_nav'> << </a>
				<?php
					$nav=[1, 2, 3, 4, 5];
					foreach ($nav as $page) {
						printf("<a href='#' class='showing_nav'>%s</a>", $page);
					}
				?>
				<a href='#' class='showing_nav'> >> </a>
			</div>
		</div>

	</div>
	
<?php
	$this->load->view('templates/footer'); 
?>

</body>

</html>