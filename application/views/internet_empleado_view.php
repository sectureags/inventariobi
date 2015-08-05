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

								<!-- Modal -->
								<div id="myModal<?php echo $fila->id; ?>" class="modal fade" role="dialog">
								  <div id="moduloemp" class="modal-dialog">

								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Editar Permiso Internet Empleado</h4>
								      </div>
								      <div class="modal-body">
								        <p><form role="form" action="<?php echo base_url('internet/actualizar');?>/<?php echo $fila->id; ?>" method="post">     
											<div class="form-group"> 
												<label for="id">Id: </label>       
												<input type="text" class="form-control" name="id" value="<?php echo $fila->id; ?>" readonly>
												<label for="id_empleado">ID Empleado: </label>       
												<input type="text" class="form-control" name="id_empleado" value="<?php echo $fila->id_empleado; ?>" readonly>      
												<label for="internet">Internet</label>              
												<select class="form-control" name="internet"> 
												    <?php if($fila->internet == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select>  
												<label for="messenger">Messenger</label>        
												<select class="form-control" name="messenger"> 
												    <?php if($fila->messenger == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select>
												<label for="redes_sociales">Redes Sociales</label>       
												<select class="form-control" name="redes_sociales"> 
												    <?php if($fila->redes_sociales == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select>
												<label for="ftp">FTP</label>       
												<select class="form-control" name="ftp"> 
												    <?php if($fila->ftp == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select>
												<label for="sigue">Sigue</label>        
												<select class="form-control" name="sigue"> 
												    <?php if($fila->sigue == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select> 
												<label for="permiso_usuario_local">Permiso Usuario Local</label>       
				      							<select class="form-control" name="permiso_usuario_local"> 
												    <?php if($fila->permiso_usuario_local == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select>
				      						</div> 
					      					<div class="modal-footer">
									        	<button type="submit" class="btn btn-default">Guardar</button> 
									        </div>  
      									</form> </p>
								      </div>
								      
								    </div>

								  </div>
								</div>
								<!-- Modal -->

						<?php endforeach; ?>
					</tbody> 
				</table>  
	</div>
</div>