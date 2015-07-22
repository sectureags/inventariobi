<div class="col-md-9 well">
		 <!-- Inicio del container --> 

			<div class="row" id="tabla_carpetas">
				<table class="table table-bordered">  
					<thead>       
						<tr>      
							 <th>Carpetas GEACO06</th>         
							 <th>Carpeta Imágenes</th>          
							 <th>Carpeta Excellentia</th> 
							 <th>Capacidad Correo</th> 
							 <th>Otros Servicios</th>
							 <th>Accion</th> 
					</thead>  
					
					<tbody> 
						<?php foreach ($cargar_permiso_carpetas as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
							
							<tr>
							<td> <?php echo $fila->carpetas_geaco06; ?></td>
							<td> <?php	echo $fila->carpeta_imagenes; ?></td>
							<td> <?php	echo $fila->carpeta_excellentia; ?></td>
							<td> <?php	echo $fila->capacidad_correo; ?></td>
							<td> <?php	echo $fila->otros_servicios; ?></td>
							<td><a href="" data-toggle="modal" data-target="#myModal<?php echo $fila->id; ?>">Editar</a></td>

							<div class="modal fade" id="myModal<?php echo $fila->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    
							<div class="modal-dialog">       
								<div class="modal-content">          
									<div class="modal-header">             
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button> 
										<h4 class="modal-title" id="myModalLabel">Editar Permiso Carpetas Empleado</h4>            
									
										<form role="form" action="<?php echo base_url('carpetas/actualizar');?>/<?php echo $fila->id; ?>" method="post">     
											<div class="form-group"> 
												<label for="id">Id: </label>       
												<input type="text" class="form-control" name="id" value="<?php echo $fila->id; ?>" readonly>
												<label for="id_empleado">ID Empleado: </label>       
												<input type="text" class="form-control" name="id_empleado" value="<?php echo $fila->id_empleado; ?>" readonly>      
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
												<label for="carpeta_excellentia">Carpeta Excellentia</label>       
												<select class="form-control" name="carpeta_excellentia"> 
												    <?php if($fila->carpeta_excellentia == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select> 
												<label for="capacidad_correo">Capacidad Correo</label>       
												<select class="form-control" name="capacidad_correo"> 
												    <?php if($fila->capacidad_correo == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select> 
												<label for="otros_servicios">Otros Servicios</label>        
												<select class="form-control" name="otros_servicios"> 
												    <?php if($fila->otros_servicios == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
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