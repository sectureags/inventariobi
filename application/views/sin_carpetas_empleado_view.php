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


		No tiene permisos asignados ni denegados
		<button class="btn btn-info btn-ms" data-toggle="modal" data-target="#miModal<?php echo $fila->id_empleado; ?>">   
			Asignar Permisos
		</button> 


		<!-- Modal -->
			<div id="miModal<?php echo $fila->id_empleado; ?>" class="modal fade" role="dialog">
				<div id="modulobi" class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Registrar Permisos Carpetas Empleado</h4>

							<?php foreach ($cargar_empleado_detalles as $fila) :?>
										<label for="id_empleado">Empleado:</label>       
										<input type="text" class="form-control" name="id_empleado" value="<?php echo $fila->nombre_completo; ?>" readonly>
							<?php endforeach; ?>
						</div>
						<div class="modal-body">
							<form id="NuevoPermisosCarpeta" role="form" action="<?php echo base_url('carpetas/crear');?>" method="post"> 
						    
								<div class="form-group">   
									<label for="carpetas_geaco06">Carpetas GEACO06</label>              
									<select class="form-control" name="carpetas_geaco06" value="<?php echo $fila->carpetas_geaco06; ?>" selected>          
										<option>SI</option>          
										<option>NO</option>
									</select> 
								</div> 
								<div class="form-group">
									<label for="carpeta_imagenes">Carpeta Imágenes</label>        
									<select class="form-control" name="carpeta_imagenes" value="<?php echo $fila->carpeta_imagenes; ?>" selected>          
										<option>SI</option>          
										<option>NO</option>
									</select> 
								</div> 
								<div class="form-group"> 
									<label for="capacidad_correo">Capacidad Correo</label>       
									<input type="text" class="form-control" id="capacidad_correo" name="capacidad_correo"> 
								</div> 
								<div class="form-group">
									<label for="otros_servicios">Otros Servicios</label>        
									<input type="text" class="form-control" id="otros_servicios" name="otros_servicios">
								</div> 
								
									<?php foreach ($cargar_empleado_detalles as $fila) :?>      
										<input type="hidden" class="form-control" name="id_empleado" value="<?php echo $fila->id_empleado; ?>" readonly>
									<?php endforeach; ?>
					      		   
					      		<div class="modal-footer">
									<button type="submit" class="btn btn-info">Guardar</button> 
								</div>
	      					</form> 
						</div>
						
					</div>

				</div>
			</div>
		<!-- Modal -->
		
	</div>
</div>
	

