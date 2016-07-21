<div class="form-group">       
									  	<label for="ubicacion">ubicacion</label>       
										<input type="text" class="form-control" name="ubicacion" id="ubicacion" value="<?php echo $fila->ubicacion; ?>" required>
									</div>
									<div class="form-group">       
									  	<label for="tipo">Tipo</label>       
										<input type="text" class="form-control" name="tipo" id="tipo" value="<?php echo $fila->tipo; ?>" required>
									</div>
								  <div class="form-group">
									   	<label for="marca">Marca</label>       
										<input type="text" class="form-control" name="marca" id="marca" value="<?php echo $fila->marca; ?>" required> 
								  </div>
								  <div class="form-group">
								  		<label for="modelo">Modelo</label>       
										<input type="text" class="form-control" name="modelo" id="modelo" value="<?php echo $fila->modelo; ?>" required>
								  </div>
								  <div class="form-group"> 
										<label for="num_serie">num_serie</label>       
										<input type="text" class="form-control" name="num_serie" id="num_serie" value="<?php echo $fila->num_serie; ?>" required>
								  </div>
								  <div class="form-group"> 
										<label for="num_inventario">num_inventario</label>       
										<input type="text" class="form-control" name="num_inventario" id="num_inventario" value="<?php echo $fila->num_inventario; ?>" required>
								  </div>
								  
					      		  <div class="form-group">      
											<label for="id_empleado">Asignar a Empleado</label> 

									<select class="form-control" name="id_empleado" id="id_empleado">
									    <?php foreach ($cargar_empleados as $st) :?>      
									    <?php if($fila->id_empleado == $st->id_empleado){  ?>    
													<option value="<?php echo $st->id_empleado; ?>" selected>Empleado: <?php echo $st->nombre_completo;?> [<?php echo $st->codigo_empleado;?>]</option>                 
												 	<?php } else {?> 
											 		<option value="<?php echo $st->id_empleado; ?>">Empleado: <?php echo $st->nombre_completo;?> [<?php echo $st->codigo_empleado;?>]</option>                 
												 	<?php }?>									 	
									 	<?php endforeach; ?>       
									</select>
										</div>							 				
												<div class="form-group">   																								  
												<?php 
												switch ($fila->status) {
													case 0:?>
														<label for="status">Instalado</label>
										 					<input type="radio" name="status" value="1">
											 			<label for="status">No instalado</label>
											 				<input type="radio" name="status" value="0" checked>
														<?php break;						
													case 1:?>
														<label for="status">Instalado</label>
										 					<input type="radio" name="status" value="1" checked>
											 			<label for="status">No instalado</label>
											 				<input type="radio" name="status" value="0">										 				
									      				<?php break;
												} ?>
												</div>	