
<div class="panel panel-primary">
  <div class="panel-heading text-center"><h1>LISTADO DE CPU's</h1></div>
  <div class="panel-body">
	      <div class="caption">
	      	<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <!-- Links -->
			      <a class="navbar-brand" data-toggle="modal" href="#miModal">Crear nuevo</a>
			      		<!-- Modal -->
						<div id="miModal" class="modal fade" role="dialog">
						  <div id="modulobi" class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Ingresar Nuevo CPU</h4>
						      </div>
						      <div class="modal-body">
						        <form id="ModalCPUNuevo" role="form" action="<?php echo base_url('bi_cpu/crear');?>" method="post">     
										<div class="form-group">       
											<label for="num_inventario">No. Inventario</label>       
											<input type="text" class="form-control" name="num_inventario" id="num_inventario"  onblur='ejecutar2AJAX()' required>
											<td>
												<div id='respuesta'></div>
											</td>
										</div> 
										<div class="form-group">
											<label for="marca">Marca</label>       
											<input type="text" class="form-control" name="marca" id="marca"> 
										</div>
										<div class="form-group">
											<label for="modelo">Modelo</label>       
											<input type="text" class="form-control" name="modelo" id="modelo">
										</div>
										<div class="form-group"> 
											<label for="hostname">HostName</label>       
											<input type="text" class="form-control" name="hostname" id="hostname">
										</div>
										<div class="form-group">
											<label for="num_serie">No. Serie</label>       
											<input type="text" class="form-control" name="num_serie" id="num_serie">
										</div>
										<div class="form-group">
											<label for="tipo">Tipo</label>       
											<input type="text" class="form-control" name="tipo" id="tipo">
										</div>
										<div class="form-group">
											<label for="ubicacion">Ubicacion</label>       
											<input type="text" class="form-control" name="ubicacion" id="ubicacion">
										</div>
										<div class="form-group">     
											<label for="categoria">Categoria</label>       
											<input type="text" class="form-control" name="categoria" id="categoria"> 
										</div>
										<div class="form-group">      
											<label for="status">Status</label> 
											<select class="form-control" name="status" id="status">
											    <?php foreach ($cargar_status as $st) :?>      
											 	<option value="<?php echo $st->id; ?>"><?php echo $st->nombre;?></option>                 
											 	<?php endforeach; ?>       
											</select>
										</div>    
										<div class="form-group">
											<label for="id_empleado">Empleado</label>   
											<select class="form-control" name="id_empleado" id="id_empleado">
											    <?php foreach ($combo_empleados as $empleados) :?>      
											 	<option value="<?php echo $empleados->id_empleado; ?>"><?php echo $empleados->nombre_completo;?></option>                 
											 	<?php endforeach; ?>       
											</select>  
			      						</div> 

			      						<div class="modal-footer">
									        <button type="submit" class="btn btn-danger">Guardar</button> 
									    </div>  
			      					</form> 
						      </div>
						    </div>

						  </div>
						</div>
						<!-- Modal -->

					
			    </div>
			    <div>
			      <ul class="nav navbar-nav">
			        <li class="dropdown">
			          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Filtrar por:
			          <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			          	<li class="dropdown-header">Status</li>
			            	<?php foreach ($cargar_status as $st) :?> 
								<li><a href="<?php echo base_url('bi_cpu/filtrar_por_status');?>/<?php echo $st->id; ?>"><?php echo $st->nombre;?></a></li> 
							<?php endforeach; ?>
			            </li>
			            <li role="separator" class="divider"></li>
			            <li><a href="<?php echo base_url('bi_cpu/index');?>">Todos</a></li>
			        </ul>
			        </ul>

			      <form class="navbar-form navbar-left" role="search" action="<?php echo base_url('bi_cpu/buscar_inventario');?>" method="post">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="No. Inventario" name="num_inventario" id="num_inventario">
			        </div>
			        <button type="submit" class="btn btn-default">Buscar</span></button>
			      </form>

			      <ul class="nav navbar-nav navbar-right">
			        <li></li>
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
						 <th>Nombre Empleado</th>
						 <th>Status</th>
						 <th>Operaciones</th> 
					</tr>   
				</thead>    
				<tbody> 
					<?php foreach ($cargar_cpu as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
						<tr>
						<td> <?php echo $fila->num_inventario; ?></td>
						<td> <?php	echo $fila->marca; ?></td>
						<td> <?php	echo $fila->modelo; ?></td>
						<td> <?php	echo $fila->hostname; ?></td>
						<td><a href="<?php echo base_url('empleados/detalles');?>/<?php echo $fila->id_empleado; ?>"><?php echo $fila->nombre_completo; ?></a></td>
						<td><?php echo $fila->nombre; ?></td>
						<td><div class="btn-group">
							  <button type="button" class="btn btn-primary">Acciones</button>
							  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
							    <li><a href="<?php echo base_url('bi_cpu/detalles'); ?>/<?php echo $fila->id_cpu; ?>">Ver detalles</a></li>
							    <li><a href="" data-toggle="modal" data-target="#myModalreasignar<?php echo $fila->id_cpu; ?>">Reasignación</a></li>

							    <li><a href="" data-toggle="modal" data-id="<?php echo $fila->id_cpu; ?>" data-target="#myModaleditar<?php echo $fila->id_cpu; ?>">Editar</a>


									
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
									        <form id="ModalCPUEditar" role="form" action="<?php echo base_url('bi_cpu/actualizar');?>" method="post">     
												<div class="form-group">         
													<input type="hidden" class="form-control" name="id_cpu" id="id_cpu" value="<?php echo $fila->id_cpu; ?>" readonly>
												</div>
												<div class="form-group">   
													<label for="num_inventario">No. Inventario</label>       
													<input type="text" class="form-control" name="num_inventario" id="num_inventario" value="<?php echo $fila->num_inventario; ?>">
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
													<label for="categoria">Categoria</label>       
													<input type="text" class="form-control" name="categoria" id="categoria" value="<?php echo $fila->categoria; ?>"> 
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
													    <?php foreach ($combo_empleados as $empleados) :?> 
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
									        <form id="ModalCPUReasignar" role="form" action="<?php echo base_url('bi_cpu/reasignar');?>" method="post">     
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
													    <?php foreach ($combo_empleados as $empleados) :?> 
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
