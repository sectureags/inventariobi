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
						<td><div class="btn-group">
							  <button type="button" class="btn btn-primary">Acciones</button>
							  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
							    <li><a href="<?php echo base_url('bi_cpu/detalles'); ?>/<?php echo $fila->id_cpu; ?>">Ver detalles</a></li>
							    <li><a href="" data-toggle="modal" data-target="#myModalreasignar<?php echo $fila->id_cpu; ?>">Reasignación</a></li>
							    <li><a href="" data-toggle="modal" data-target="#myModaleditar<?php echo $fila->id_cpu; ?>">Editar</a>

									
							    </li>

							    <li><a href="#">Dar de Baja</a></li>
							  </ul>

							</div>

							<!-- Modal -->
									<div id="myModaleditar<?php echo $fila->id_cpu; ?>" class="modal fade" role="dialog">
									  <div id="modulobi" class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title">Editar CPU</h4>
									      </div>
									      <div class="modal-body">
									        <form id="ModalCPUEditar" role="form" action="<?php echo base_url('bi_cpu/actualizar2');?>/<?php echo $fila->id_empleado; ?>" method="post">     
												<div class="form-group">         
													<input type="hidden" class="form-control" name="id_cpu" value="<?php echo $fila->id_cpu; ?>" readonly>
												</div>
												<div class="form-group">   
													<label for="num_inventario">No. Inventario</label>       
													<input type="text" class="form-control" name="num_inventario" id="num_inventario" value="<?php echo $fila->num_inventario; ?>">
												</div>
												<div class="form-group">       
													<label for="categoria">Categoria</label>       
													<input type="text" class="form-control" name="categoria" id="categoria" value="<?php echo $fila->categoria; ?>"> 
												</div>
												<div class="form-group">
													<label for="marca">Marca</label>       
													<input type="text" class="form-control" name="marca" id="marca" value="<?php echo $fila->marca; ?>">
												</div>
												<div class="form-group">
													<label for="modelo">Modelo</label>       
													<input type="text" class="form-control" name="modelo" id="modelo"value="<?php echo $fila->modelo; ?>">
												</div> 
												<div class="form-group">
													<label for="hostname">HostName</label>       
													<input type="text" class="form-control" name="hostname" id="hostname" value="<?php echo $fila->hostname; ?>">
												</div>
												<div class="form-group">
													<label for="num_serie">No. Serie</label>       
													<input type="text" class="form-control" name="num_serie" id="num_serie" value="<?php echo $fila->num_serie; ?>">
												</div>
												<div class="form-group">
													<label for="tipo">Tipo</label>       
													<input type="text" class="form-control" name="tipo" id="tipo" value="<?php echo $fila->tipo; ?>">
												</div>
												<div class="form-group">
													<label for="ubicacion">Ubicacion</label>       
													<input type="text" class="form-control" name="ubicacion" id="ubicacion" value="<?php echo $fila->ubicacion; ?>">
												</div>
												<div class="form-group">       
													<label for="status">Status</label> 
													<select class="form-control" name="status" id="status">
													    <?php foreach ($cargar_status as $st) :?>  
														    <?php if($fila->status == $st->id){  ?>    
														 		<option value="<?php echo $st->id; ?>" selected><?php echo $st->nombre;?></option> 
														 	<?php } else {?> 
														 		<option value="<?php echo $st->id; ?>"><?php echo $st->nombre;?></option> 
														 	<?php }?>               
													 	<?php endforeach; ?>       
													</select>
												</div>    
												<div class="form-group">
													<label for="id_empleado">Empleado</label>   
													<select class="form-control" name="id_empleado" id="id_empleado">
													    <?php foreach ($cargar_empleados as $empleados) :?> 
														    <?php if($fila->id_empleado == $empleados->id_empleado){  ?>     
														 		<option value="<?php echo $empleados->id_empleado; ?>" selected><?php echo $empleados->nombre_completo;?></option>  
														 	<?php } else {?> 
														 		<option value="<?php echo $empleados->id_empleado; ?>"><?php echo $empleados->nombre_completo;?></option>
														 	<?php }?>               
													 	<?php endforeach; ?>       
													</select>  
					      						</div>  

					      						<div class="modal-footer">
												    <button type="submit" class="btn btn-primary">Guardar</button>
												</div>    
					      					</form> 
									      </div>
									    </div>

									  </div>
									</div>
									<!-- Modal -->



									<!-- Modal -->
									<div id="myModalreasignar<?php echo $fila->id_cpu; ?>" class="modal fade" role="dialog">
									  <div id="modulobi" class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title">Reasignar CPU</h4>
									      </div>
									      <div class="modal-body">
									        <form id="ModalCPUReasignar" role="form" action="<?php echo base_url('bi_cpu/reasignar2');?>/<?php echo $fila->id_empleado; ?>" method="post">     
												<div class="form-group">       
													<input type="hidden" class="form-control" name="id_cpu" value="<?php echo $fila->id_cpu; ?>">
												</div> 
												<div class="form-group">      
													<label for="num_inventario">No. Inventario</label>       
													<input type="text" class="form-control" name="num_inventario" value="<?php echo $fila->num_inventario; ?>" readonly>
												</div> 
												<div class="form-group">
													<label for="marca">Marca</label>       
													<input type="text" class="form-control" name="marca" value="<?php echo $fila->marca; ?>" readonly>
												</div> 
												<div class="form-group">
													<label for="hostname">HostName</label>       
													<input type="text" class="form-control" name="hostname" value="<?php echo $fila->hostname; ?>" readonly>
												</div> 
												<div class="form-group">
													<label for="ubicacion">Ubicacion</label>       
													<input type="text" class="form-control" name="ubicacion" id="ubicacion" value="<?php echo $fila->ubicacion; ?>">
												</div>  
												<div class="form-group">      
													<label for="status">Status</label> 
													<select class="form-control" name="status">
													    <?php foreach ($cargar_status as $st) :?>  
														    <?php if($fila->status == $st->id){  ?>    
														 		<option value="<?php echo $st->id; ?>" selected><?php echo $st->nombre;?></option> 
														 	<?php } else {?> 
														 		<option value="<?php echo $st->id; ?>"><?php echo $st->nombre;?></option> 
														 	<?php }?>               
													 	<?php endforeach; ?>       
													</select>
												</div>    
												<div class="form-group"> 
													<label for="id_empleado">Empleado</label>   
													<select class="form-control" name="id_empleado">
													    <?php foreach ($cargar_empleados as $empleados) :?> 
														    <?php if($fila->id_empleado == $empleados->id_empleado){  ?>     
														 		<option value="<?php echo $empleados->id_empleado; ?>" selected><?php echo $empleados->nombre_completo;?></option>  
														 	<?php } else {?> 
														 		<option value="<?php echo $empleados->id_empleado; ?>"><?php echo $empleados->nombre_completo;?></option>
														 	<?php }?>               
													 	<?php endforeach; ?>       
													</select>  
					      						</div> 

					      						<div class="modal-footer">
												    <button type="submit" class="btn btn-primary">Guardar</button>
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