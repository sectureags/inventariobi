<div class="row col-md-12">

	<div class="col-md-4">
		<div class="well">
			<ul class="nav nav-tab">
				<li><a href="#cpu" data-toggle="tab">CPU</a></li>
				<li><a href="#lectura" data-toggle="tab">Monitor</a></li>
				<li><a href="#dormir" data-toggle="tab">Teclado</a></li>
			</ul>
		</div>
	</div>



	<div class="well col-md-8">


		


		<div class="hero-unit">
			<div class="tab-content">
				<div class="list-pane fade in active" id="cpu">
					<table class="table table-bordered">    
			<caption><h3>Tabla CPU's</h3></caption>    
			<thead>       
				<tr> 
					 <th>Id Interno</th>      
					 <th>No. Inventario</th>  
					 <th>Empleado</th>       
					 <th>Categoria</th>          
					 <th>Marca</th> 
					 <th>Modelo</th> 
					 <th>HostName</th> 
					 <th>No. Serie</th> 
					 <th>Tipo</th> 
					 <th>Ubicacion</th>

				</tr>   
			</thead>    
			<tbody> 
				<?php foreach ($cargar_cpu_empleado as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					
					<tr>
					<td> <?php echo $fila->id_cpu; ?></td>
					<td> <?php echo $fila->num_inventario; ?></td>
					<td> <?php echo $fila->nombre_completo; ?></td>
					<td> <?php	echo $fila->categoria; ?></td>
					<td> <?php	echo $fila->marca; ?></td>
					<td> <?php	echo $fila->modelo; ?></td>
					<td> <?php	echo $fila->hostname; ?></td>
					<td> <?php	echo $fila->num_serie; ?></td>
					<td> <?php	echo $fila->tipo; ?></td>
					<td> <?php	echo $fila->ubicacion; ?></td>
					
				<?php endforeach; ?>
			</tbody> 
		</table>  
				</div>
					
				<div class="list-pane fade" id="lectura">
						Es el proceso de significación y comprensión de algún tipo de información y/o ideas almacenadas en un soporte y transmitidas mediante algún tipo de código, usualmente un lenguaje, que puede ser visual o táctil (por ejemplo, el sistema Braille). Otros tipos de lectura pueden no estar basados en el lenguaje tales como la notación o los pictogramas.</div>
					
				<div class="list-pane fade" id="dormir">
						Es un estado fisiológico de autorregulación y reposo uniforme de un organismo. En contraposición con el estado de vigilia -cuando el ser está despierto-, el sueño se caracteriza por los bajos niveles de actividad fisiológica (presión sanguínea, respiración) y por una respuesta menor ante estímulos externos.</div>
				
			</div>
		</div>
	</div>
	
</div>


