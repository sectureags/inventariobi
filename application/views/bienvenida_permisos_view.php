<div class="container"> <!-- Inicio del container -->
	<div class="peage-header">
		 	<h2>Permisos de Navegación</h2>
		 	<hr>
	</div>
	<div class="row">  <!-- Inicio del formulario -->
		 		<h4>Crear Permiso</h4>
		 	<div class="col-md-12">
		 		<form action="">
		 			<label for="">Id:</label>
		 			<input type="text" autofocus>
		 			<label for="">Rol:</label>
		 			<input type="text" autofocus>
		 			<label for="">Modulo:</label>
		 			<input type="text" autofocus>
		 			<label for="">Accion:</label>
		 			<input type="text" autofocus>
		 			<input type="submit" value="Crear">
		 		</form>
		 	</div>
	</div>  <!-- Fin del formulario -->

	<hr>

	<div class="row" id="tabla_permisos"> <!-- Inicio fila de la tabla-->
		 	
		 	<table class="table-hover table-bordered"> <!-- bs3-table-->
		 		<thead>
		 			<tr> <!-- fila tabla--> 
		 				<th>Modulo</th> 
		 				<th>Accion</th>
		 				<th>Permitir</th>
		 				<th>Denegar</th>
		 				<th></th>
		 			</tr>
		 			<div class="dropdown">    <button type="button" class="btn dropdown-toggle" id="dropdownMenu1"        data-toggle="dropdown">       Topics       <span class="caret"></span>    </button>    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">       <li role="presentation">          <a role="menuitem" tabindex="-1" href="#">Java</a>       </li>       <li role="presentation">          <a role="menuitem" tabindex="-1" href="#">Data Mining</a>       </li>       <li role="presentation">          <a role="menuitem" tabindex="-1" href="#">             Data Communication/Networking          </a>       </li>       <li role="presentation" class="divider"></li>       <li role="presentation">          <a role="menuitem" tabindex="-1" href="#">Separated link</a>       </li>    </ul> </div>
		 		</thead>
		 		<tbody>
		 			<tr>
		 				<td>Empleados</td>
		 				<td>Eliminar</td>
		 				<td><div class="radio">
		 					<label><input type="radio"></label>
		 				</div></td>
		 				<td><div class="radio">
		 					<label><input type="radio"></label>
		 				</div></td>
		 				<td><a href="">Editar</a>|<a href="">Eliminar</a></td>
		 			</tr>

		 			<tr>
		 				<td>Empleados</td>
		 				<td>Crear</td>
		 				<td><div class="radio">
		 					<label><input type="radio"></label>
		 				</div></td>
		 				<td><div class="radio">
		 					<label><input type="radio"></label>
		 				</div></td>
		 				<td><a href="">Editar</a>|<a href="">Eliminar</a></td>
		 			</tr>
		 		</tbody>
		 	</table>
	</div><!-- Fin fila de la tabla-->

</div>  <!-- Fin del container -->
