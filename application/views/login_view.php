<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Inventario de Bienes Informáticos SECTUR Aguascalientes</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/estilo.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
</head>

<body><!--Contenido de la pagina principal-->
	<div class="container">
	<header id="encabezado"><!--encabezado-->
		<!--<img id="img01" src="img.jpg">-->
		<h3>Sistema de Inventario de Bienes Informáticos de la Secretaría de Turismo del Estado de Aguascalientes</h3> 
	</header>

	<div class="container"> 
		<div id="contenido"><!--Contenido de Bienvenida--> 
			<article class="Btexto" id="cont1"><!--Contenedor superior-->
				<h2>Objetivo</h2>
				<p>Con este sistema se pretende realizar el registro y control de todos los bienes informáticos de manera automatizada,
		 			estandarizando los registros con el inventario general de la dependencia </p>
			</article>

			<article class="Bimagen" id="cont2"><!--Contenedor inferior-->
				 <!--<img src="img/img1.jpg">-->
			</article>
		</div><!--Fin Contenido de Bienvenida-->

		<div id="lateral"><!--Contenido de login a la pagina-->
			<aside class="Ingresar">
				<article id="Ilogo">
					LOGO
				</article>

				<article id="Iform">
					<h3>Ingresar</h3>
					<?php
						$attributes = array('class' => '', 'textalign' => 'center');
						echo form_open(base_url('welcome/'),$attributes);
					?>
					<div class="form-group col-sm-12">
					<?php
						echo form_input('username', set_value('username'), 
							'id="username" class="form-control" placeholder="Usuario"');
					?>
					</div>
					<div class="form-group col-sm-12">
						<?php
							echo form_password('password', '', 'id="password" class="form-control" placeholder="Contraseña"');
						?>
					</div>
						<button type="submit" class="btn btn-danger">Acceso</button>
						<?php echo form_close();?>

				</article>
			</aside>
		</div><!--Contenido de login a la pagina-->

	

	<footer id="pie"><!--Pie de pagina-->
		<h5>Aguascalientes</h5>
	</footer><!--Fin Pie de pagina-->
	</div>

	<script src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</body><!--Fin de contenido de la pagina principal-->
</html>
