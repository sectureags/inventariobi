<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Inventario de Bienes Informáticos SECTUR Aguascalientes</title>
	<link rel="stylesheet" href="http://localhost:8080/inventariobi/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="http://localhost:8080/inventariobi/css/estilo.css">
	<link rel="stylesheet" href="http://localhost:8080/inventariobi/css/bootstrap.min.css">
</head>

<body><!--Contenido de la pagina principal-->
	<div class="container">
	<header id="encabezado"><!--encabezado-->
		<!--<img id="img01" src="img.jpg">-->
		<h3>Sistema de Inventario de Bienes Informáticos de la Secretaria de Turismo del Estado de Aguascalientes</h3> 
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
					<!--<form action="http://localhost:8080/inventariobi/index.php/welcome" method="post" textalign="center"><!--Formulario para ingresar a la aplicacion, redirecciona al archivo login.php para hacer la validacion-->
						      <!--  <label>Usuario:</label>
						        <br>
						        <input type="text" name="username"><p>
						        <label>Contraseña:</label>
						        <br>
						        <input type="text" name="password"><p>
						        <input type="submit" value="Ingresar">
					</form>-->
					<?php
						$attributes = array('class' => '', 'textalign' => 'center');
						echo form_open(base_url('welcome/'),$attributes);
					?>
					<div class="form-group">
					<?php
						echo form_input('username', set_value('username'), 
							'id="username" class="form-control" placeholder="Usuario"');
					?>
					</div>
					<div class="form-group">
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

	<script src="http://localhost:8080/inventariobi/js/jquery.js"></script>
	<script src="http://localhost:8080/inventariobi/js/bootstrap.js"></script>
	<script src="http://localhost:8080/inventariobi/js/bootstrap.min.js"></script>

</body><!--Fin de contenido de la pagina principal-->
</html>
=======
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Inventario de Bienes Informáticos SECTUR Aguascalientes</title>
	<link rel="stylesheet" href="http://localhost:8080/inventariobi/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="http://localhost:8080/inventariobi/css/estilo.css">
	<link rel="stylesheet" href="http://localhost:8080/inventariobi/css/bootstrap.min.css">
</head>

<body><!--Contenido de la pagina principal-->

	<header id="encabezado"><!--encabezado-->
		<!--<img id="img01" src="img.jpg">-->
		<h3>Sistema de Inventario de Bienes Informáticos de la Secretaria de Turismo del Estado de Aguascalientes</h3> 
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
					<!--<form action="http://localhost:8080/inventariobi/index.php/welcome" method="post" textalign="center"><!--Formulario para ingresar a la aplicacion, redirecciona al archivo login.php para hacer la validacion-->
						      <!--  <label>Usuario:</label>
						        <br>
						        <input type="text" name="username"><p>
						        <label>Contraseña:</label>
						        <br>
						        <input type="text" name="password"><p>
						        <input type="submit" value="Ingresar">
					</form>-->
					<?php
						$attributes = array('class' => '', 'textalign' => 'center');
						echo form_open(base_url('welcome/'),$attributes);
					?>
					<div class="form-group">
					<?php
						echo form_input('username', set_value('username'), 
							'id="username" class="form-control" placeholder="Usuario"');
					?>
					</div>
					<div class="form-group">
						<?php
							echo form_password('password', '', 'id="password" class="form-control" placeholder="Contraseña"');
						?>
					</div>
						<button type="submit" class="btn btn-danger">Acceso</button>
						<?php echo form_close();?>

				</article>
			</aside>
		</div><!--Contenido de login a la pagina-->

	</div>

	<footer id="pie"><!--Pie de pagina-->
		<h5>Aguascalientes</h5>
	</footer><!--Fin Pie de pagina-->

	<script src="http://localhost:8080/inventariobi/js/jquery.js"></script>
	<script src="http://localhost:8080/inventariobi/js/bootstrap.js"></script>
	<script src="http://localhost:8080/inventariobi/js/bootstrap.min.js"></script>

</body><!--Fin de contenido de la pagina principal-->
</html>
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303
