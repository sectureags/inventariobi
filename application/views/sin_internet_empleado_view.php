<div class="col-md-9 well">
		 <!-- Inicio del container --> 
		 
		No tiene permisos asignados ni denegados
		<button class="btn btn-primary btn-ms" data-toggle="modal" data-target="#myModal">   
			Asignar Permisos
		</button> 

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    
			<div class="modal-dialog">       
				<div class="modal-content">          
					<div class="modal-header">             
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
						<h4 class="modal-title" id="myModalLabel">Registrar Permisos</h4>  
						<?php foreach ($cargar_permiso_internet as $fila) :?>
							<label for="id">Id: </label>       
							<input type="text" class="form-control" name="id" value="<?php echo $fila->id; ?>" readonly>
						<?php endforeach; ?>
						<form role="form" action="<?php echo base_url('internet/crear');?>" method="post">     
							<div class="form-group">       
								<label for="internet">Internet</label>              
								<select class="form-control" name="internet">          
									<option>SI</option>          
									<option>NO</option>
								</select> 
								<label for="messenger">Messenger</label>        
								<select class="form-control" name="messenger">          
									<option>SI</option>          
									<option>NO</option>
								</select> 
								<label for="redes_sociales">Redes Sociales</label>       
								<select class="form-control" name="redes_sociales">          
									<option>SI</option>          
									<option>NO</option>
								</select> 
								<label for="ftp">FTP</label>       
								<select class="form-control" name="ftp">          
									<option>SI</option>          
									<option>NO</option>
								</select> 
								<label for="sigue">Sigue</label>        
								<select class="form-control" name="sigue">          
									<option>SI</option>          
								 	<option>NO</option>
								</select> 
								<label for="permiso_usuario_local">Permiso Usuario Local</label>       
						      	<select class="form-control" name="permiso_usuario_local">          
								 	<option>SI</option>          
								 	<option>NO</option>
								</select> 
								<?php foreach ($cargar_permiso_internet as $fila) :?>
								<label for="id_empleado">ID Empleado: </label>       
								<input type="text" class="form-control" name="id_empleado" value="<?php echo $fila->id_empleado; ?>" readonly>
								<?php endforeach; ?>
						    </div>    
						    <button type="submit" class="btn btn-default">Guardar</button> 
		      			</form> 

					</div>       
				</div><!-- /.modal-content -->    
			</div><!-- /.modal-dialog --> 
		</div><!-- /.modal -->
		

		<div class="row" id="tabla_internet">
				<table class="table table-bordered">  
					<thead>       
						<tr>      
							 <th>Internet</th>         
							 <th>Messenger</th>          
							 <th>Redes Sociales</th> 
							 <th>FTP</th> 
							 <th>Sigue</th> 
							 <th>Permiso Usuario Local</th>
							 <th>Accion</th>
							 </tr>   
					</thead>  

					<tbody> 
						<?php foreach ($cargar_permiso_internet as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
							
							<tr>
							<td> <?php echo $fila->internet; ?></td>
							<td> <?php	echo $fila->messenger; ?></td>
							<td> <?php	echo $fila->redes_sociales; ?></td>
							<td> <?php	echo $fila->ftp; ?></td>
							<td> <?php	echo $fila->sigue; ?></td>
							<td> <?php	echo $fila->permiso_usuario_local; ?></td>
							<td><a href="" data-toggle="modal" data-target="#myModal<?php echo $fila->id; ?>">Editar</a></td>

							<div class="modal fade" id="myModal<?php echo $fila->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    
							<div class="modal-dialog">       
								<div class="modal-content">          
									<div class="modal-header">             
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button> 
										<h4 class="modal-title" id="myModalLabel">Editar Permiso Internet Empleado</h4>            
									
										<form role="form" action="<?php echo base_url('internet/actualizar');?>/<?php echo $fila->id; ?>" method="post">     
											<div class="form-group"> 
												<label for="id">Id: </label>       
												<input type="text" class="form-control" name="id" value="<?php echo $fila->id; ?>" readonly>
												<label for="id_empleado">ID Empleado: </label>       
												<input type="text" class="form-control" name="id_empleado" value="<?php echo $fila->id_empleado; ?>" readonly>      
												<label for="internet">Internet</label>              
												<select class="form-control" name="internet" value="<?php echo $fila->internet; ?>" selected>          
												 	<option>SI</option>          
												 	<option>NO</option>
												</select> 
												<label for="messenger">Messenger</label>        
												<select class="form-control" name="messenger" value="<?php echo $fila->messenger; ?>" selected>          
												 	<option>SI</option>          
												 	<option>NO</option>
												</select> 
												<label for="redes_sociales">Redes Sociales</label>       
												<select class="form-control" name="redes_sociales" value="<?php echo $fila->redes_sociales; ?>" selected>          
												 	<option>SI</option>          
												 	<option>NO</option>
												</select> 
												<label for="ftp">FTP</label>       
												<select class="form-control" name="ftp" value="<?php echo $fila->ftp; ?>" selected>          
												 	<option>SI</option>          
												 	<option>NO</option>
												</select> 
												<label for="sigue">Sigue</label>        
												<select class="form-control" name="sigue" value="<?php echo $fila->sigue; ?>" selected>          
												 	<option>SI</option>          
												 	<option>NO</option>
												</select> 
												<label for="permiso_usuario_local">Permiso Usuario Local</label>       
				      							<select class="form-control" name="permiso_usuario_local" value="<?php echo $fila->permiso_usuario_local; ?>" selected>          
												 	<option>SI</option>          
												 	<option>NO</option>
												</select> 
				      						</div>    
				      						<button type="submit" class="btn btn-default">Guardar</button> 
      									</form> 
				      				</div> 
				      			</div> 
				      		</div> 
				      	</div> 
							
						<?php endforeach; ?>
					</tbody> 
				</table>  
			</div>


</div>