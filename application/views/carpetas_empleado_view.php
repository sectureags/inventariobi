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
							 <th>Carpetas GEACO06</th>         
							 <th>Carpeta Imágenes</th>  
							 <th>Capacidad Correo</th> 
							 <th>Otros Servicios</th>
							 <th>Accion</th> 
					</thead>  
					
					<tbody> 
						<?php foreach ($cargar_permiso_carpetas as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
							
							<tr>
							<td> <?php echo $fila->carpetas_geaco06; ?></td>
							<td> <?php	echo $fila->carpeta_imagenes; ?></td>
							<td> <?php	echo $fila->capacidad_correo; ?></td>
							<td> <?php	echo $fila->otros_servicios; ?></td>
							<td><a href="" data-toggle="modal" data-target="#myModal<?php echo $fila->id; ?>">Editar</a>

								<!-- Modal -->
								<div id="myModal<?php echo $fila->id; ?>" class="modal fade" role="dialog">
								  <div id="moduloemp" class="modal-dialog">

								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Editar Permiso Carpetas Empleado</h4>

								        
											<label for="id_empleado">Empleado:</label>       
											<input type="text" class="form-control" name="id_empleado" value="<?php echo $fila->nombre_completo; ?>" readonly>
										

								      </div>
								      <div class="modal-body">
								       <form id="NuevoPermisosCarpeta" role="form" action="<?php echo base_url('carpetas/actualizar');?>/<?php echo $fila->id; ?>" method="post">     
											<div class="form-group">       
												<input type="hidden" class="form-control" name="id" value="<?php echo $fila->id; ?>">       
												<input type="hidden" class="form-control" name="id_empleado" value="<?php echo $fila->id_empleado; ?>">
											</div>  
											<div class="form-group">    
												<label for="carpetas_geaco06">Carpetas GEACO06</label>              
												<select class="form-control" name="carpetas_geaco06"> 
												    <?php if($fila->carpetas_geaco06 == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select> 
											</div>
											<div class="form-group">
												<label for="carpeta_imagenes">Carpeta Imágenes</label>        
												<select class="form-control" name="carpeta_imagenes"> 
												    <?php if($fila->carpeta_imagenes == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select> 
											</div>
											<div class="form-group">
												<label for="capacidad_correo">Capacidad Correo</label>       
												<input type="text" class="form-control" id="capacidad_correo" name="capacidad_correo" value="<?php	echo $fila->capacidad_correo; ?>">
												</select> 
											</div>
											<div class="form-group">
												<label for="otros_servicios">Otros Servicios</label>        
												<input type="text" class="form-control" id="otros_servicios" name="otros_servicios" value="<?php	echo $fila->otros_servicios; ?>">
				      						</div>    
				      						 <div class="modal-footer">
									        	<button type="submit" class="btn btn-info">Guardar</button> 
									        </div> 
      									</form>
								      </div>
								      
								    </div>
								  </div>
								</div>
								<!-- Modal -->
								</td>
							</tr>
							
						<?php endforeach; ?>
					</tbody> 
				</table>  
	</div>
</div>