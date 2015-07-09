<div class="well"> <!-- Inicio del container --> 

	<div class="row" id="tabla_cpu">
		<table class="table table-bordered">    
			<caption><h3>Tabla CPU's</h3></caption>    
			<thead>       
				<tr> 
					 <th>Id Interno</th>      
					 <th>No. Inventario</th>         
					 <th>Categoria</th>          
					 <th>Marca</th> 
					 <th>Modelo</th> 
					 <th>HostName</th> 
					 <th>No. Serie</th> 
					 <th>Tipo</th> 
					 <th>Ubicacion</th>
					 <th>Accion</th>
					 <th>Detalles</th> 

				</tr>   
			</thead>    
			<tbody> 
				<?php foreach ($cargar_cpu as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					
					<tr>
					<td> <?php echo $fila->id_cpu; ?></td>
					<td> <?php echo $fila->num_inventario; ?></td>
					<td> <?php	echo $fila->categoria; ?></td>
					<td> <?php	echo $fila->marca; ?></td>
					<td> <?php	echo $fila->modelo; ?></td>
					<td> <?php	echo $fila->hostname; ?></td>
					<td> <?php	echo $fila->num_serie; ?></td>
					<td> <?php	echo $fila->tipo; ?></td>
					<td> <?php	echo $fila->ubicacion; ?></td>
					<td>YYYYY</td>
					<td><a href="">Ver detalles</a></td>
					
				<?php endforeach; ?>
			</tbody> 
		</table>  
	</div>
</div>
