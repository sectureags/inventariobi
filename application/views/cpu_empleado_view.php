<div class="panel panel-info">
  	<div class="panel-heading text-center"><h3>
	  	<?php foreach ($cargar_empleado_detalles as $fila) :?>          
			      	<p>Empleado: <b> <?php echo $fila->nombre_completo; ?> </b></p>	
		<?php endforeach; ?>
	</h3></div>
  	<div class="panel-body">

  		<div class="caption">
	    	<nav class="navbar navbar-default">
			  	<div class="container-fluid">
			   		 <div class="navbar-header">
				      	<!-- Links -->
				      	<ul class="nav nav-tab">
							<?php foreach ($cargar_empleado_detalles as $fila) :?>
							<a class="navbar-brand" href="<?php echo base_url('empleados/detalles');?>/<?php echo $fila->id_empleado; ?>">Detalles</a>
								<a class="navbar-brand" href="<?php echo base_url('internet/existe_permiso');?>/<?php echo $fila->id_empleado; ?>">Internet</a>
								<a class="navbar-brand" href="<?php echo base_url('carpetas/existe_permiso');?>/<?php echo $fila->id_empleado; ?>">Carpetas</a>
								<a class="navbar-brand" href="<?php echo base_url('bi_cpu/cpu_empleado');?>/<?php echo $fila->id_empleado; ?>">CPU's</a>
							<?php endforeach; ?>
						</ul>
					</div>
			  	</div>
		    </nav>
		</div>
				<table class="table table-bordered">  
					<thead>       
						<tr>      
							 <th>No. Inventario</th>         
							 <th>Marca</th> 
							 <th>Modelo</th> 
							 <th>HostName</th>
							 <th>Status</th>
							 <th>Operaciones</th>
						</tr>   
					</thead>    
					<tbody> 
						<?php foreach ($cargar_cpu_empleado as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
							
							<tr>
								<td> <?php echo $fila->num_inventario; ?></td>
								<td> <?php	echo $fila->marca; ?></td>
								<td> <?php	echo $fila->modelo; ?></td>
								<td> <?php	echo $fila->hostname; ?></td>
								<td><?php echo $fila->nombre; ?></td>
								<td>
									<div class="btn-group">
									  <button type="button" class="btn btn-primary">Acciones</button>
									  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									    <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu" role="menu">
									    <li><a href="#">Ver detalle</a></li>
									    <li><a href="#">Reasignación</a></li>
									    <li><a href="#">WinAudit</a></li>
									  </ul>
									</div>
							</td>
					</tr>
						<?php endforeach; ?>
					</tbody> 
				</table>  
	</div>
</div>