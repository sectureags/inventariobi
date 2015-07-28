<div class="well"> <!-- Inicio del container --> 

	<div class="row" id="tabla_cpu">
		<table class="table table-bordered">    
			<caption><h3>CPU's</h3></caption>    
			<thead>       
				<tr>      
					 <th>No. Inventario</th>         
					 <th>Marca</th> 
					 <th>Modelo</th> 
					 <th>HostName</th> 
					 <th>Nombre Empleado</th>
					 <th>Status</th>
					 <th>Detalles</th> 

				</tr>   
			</thead>    
			<tbody> 
				<?php foreach ($cargar_cpu as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					
					<tr>
					<td> <?php echo $fila->num_inventario; ?></td>
					<td> <?php	echo $fila->marca; ?></td>
					<td> <?php	echo $fila->modelo; ?></td>
					<td> <?php	echo $fila->hostname; ?></td>
					<td><a href="<?php echo base_url('empleados/detalles');?>/<?php echo $fila->id_empleado; ?>""><?php echo $fila->nombre_completo; ?></a></td>
					<td><?php echo $fila->nombre; ?></td>
					<td><a href="#">Ver detalles</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody> 
		</table>  
	</div>
</div>
