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
						  <div id="moduloemp" class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title">Registrar Permisos Internet Empleado</h4>

							        <?php foreach ($cargar_empleado_detalles as $fila) :?>
										<label for="id_empleado">Empleado:</label>       
										<input type="text" class="form-control" name="id_empleado" value="<?php echo $fila->nombre_completo; ?>" readonly>
									<?php endforeach; ?>

							      </div>
							      <div class="modal-body">
								        <form id="NuevoPermisosInternet" role="form" action="<?php echo base_url('internet/crear');?>" method="post">     
											<div class="form-group">       
												<label for="internet">Internet</label>              
												<select class="form-control" name="internet">          
													<option>SI</option>          
													<option>NO</option>
												</select> 
											</div> 
											<div class="form-group">
												<label for="messenger">Messenger</label>        
												<select class="form-control" name="messenger">          
													<option>SI</option>          
													<option>NO</option>
												</select> 
											<div class="form-group">
												<label for="redes_sociales">Redes Sociales</label>       
												<select class="form-control" name="redes_sociales">          
													<option>SI</option>          
													<option>NO</option>
												</select> 
											</div> 
											<div class="form-group">
												<label for="ftp">FTP</label>       
												<select class="form-control" name="ftp">          
													<option>SI</option>          
													<option>NO</option>
												</select> 
											</div> 
											<div class="form-group">
												<label for="sigue">Sigue</label>        
												<select class="form-control" name="sigue">          
													<option>SI</option>          
												 	<option>NO</option>
												</select> 
											</div> 
											<div class="form-group">
												<label for="permiso_usuario_local">Permiso Usuario</label>       
										      	<select class="form-control" name="permiso_usuario_local">          
												 	<option>SI</option>          
												 	<option>NO</option>
												</select> 
											</div> 
											<div class="form-group">
												<label for="tipo_cuenta_ws">Tipo de Cuenta Windows</label>       
										      	<select class="form-control" name="tipo_cuenta_ws">          
												 	<option value="ESTANDAR">ESTANDAR</option>      
												 	<option value="AVANZADO">AVANZADO</option>
												 	<option value="ADMINISTRADOR">ADMINISTRADOR</option>
												</select> 
											</div> 
											<div class="form-group">
												<?php foreach ($cargar_empleado_detalles as $fila) :?>      
													<input type="hidden" class="form-control" name="id_empleado" value="<?php echo $fila->id_empleado; ?>" readonly>
												<?php endforeach; ?>
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
		
	</div>
</div>
		

