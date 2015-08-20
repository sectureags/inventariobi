<div class="panel panel-info">
  	<div class="panel-heading text-center"><h1>LISTADO DE EMPLEADOS SECTURE</h1></div>
  	<div class="panel-body">

  		<div class="caption">
	    	<nav class="navbar navbar-default">
			  	<div class="container-fluid">
			   		 <div class="navbar-header">
				      	<!-- Links -->
				      	<a class="navbar-brand" data-toggle="modal" href="#myModal">Crear nuevo</a>
			      		<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  	<div id="moduloemp" class="modal-dialog">

						    <!-- Modal content-->
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Ingresar Nuevo Empleado</h4>
							      	</div>
							      	<div class="modal-body">
							        	<form id="ModalEmpleadoNuevo" role="form" action="<?php echo base_url('empleados/crear');?>" method="post">     
											<div class="form-group">       
												<label for="codigo_empleado">Codigo Empleado</label>       
												<input type="text" class="form-control" name="codigo_empleado" id="codigo_empleado" onblur='ejecutarAJAX()' required>
												<td>
													<div id='respuesta'></div>
												</td>
											</div>
											<div class="form-group">
												<label for="nombre_completo">Nombre Completo</label>       
												<input type="text" class="form-control" name="nombre_completo" id="nombre_completo" required>
											</div>
											 <div class="form-group">
											  <label for="unidad">Unidad Administrativa:</label>
											  <?php $unidades = array('SECTURE','PLAZA DE LAS 3 CENTURIAS','OFICINA DE ATENCION AL VISITANTE EN PALACIO','OCV','PARTICULAR'); ?>
											  <select class="form-control" name="unidad" id="unidad">
											  	<?php foreach ($unidades as $key => $value) {?>
													<option value="<?php echo $key ;?>"><?php echo $value ;?></option>
												<?php } ?>											    
											    
											  </select>
											</div>
											
											<div class="form-group"> 
												<label for="usuario_de_red">Usuario de Dominio</label>       
												<input type="text" class="form-control" name="usuario_de_red" id="usuario_de_red">
											</div>
											<div class="form-group"> 
												<label for="contrasena">Contraseña</label>       
												<input type="text" class="form-control" name="contrasena" id="contrasena">
											</div>
											<div class="form-group">
												<label for="num_extension">No. Extension</label>       
												<input type="text" class="form-control" name="num_extension" id="num_extension">
											</div>
											<div class="form-group">
												<label for="correo_electonico">Correo Electonico</label>
												<input type="text" class="form-control" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="correo_electonico" name="correo_electonico" required/>
											</div>
											<div class="form-group">       
												<label for="area">Area de Adscripcion</label>       
												<?php $areas = array(
														'COMUNICACION Y DIFUSION',
														'COORD. RELACIONES PUBLICAS',
														'DIR. ADMINISTRATIVO',
														'DIR. CENTROS DE ATENCION AL VISITANTE',
														'DIR. DE ASUNTOS JURIDICOS',
														'DIR. DE CAPACITACION Y ASISTENCIA TURISTICA',
														'DIR. DE DESARROLLO Y PROYECTOS TURISTICOS',
														'DIR. DE MERCADOTECNIA Y DIFUSION',
														'DIR. DE PLANEACION ESTADISTICA E INFORMATICA',
														'DIR. DE PROMOCION Y FOMENTO',
														'DIR. PLAZA TRES CENTURIAS',
														'OFICINA DEL SECRETARIO'														
												);?>
											  <select class="form-control" name="area" id="area">
											  	<?php foreach ($areas as $key => $value) {?>
													<option value="<?php echo $key ;?>"><?php echo $value ;?></option>
												<?php } ?>											    
											    
											  </select>
											</div>
											<div class="form-group">
												<label for="cargo">Cargo</label>       
												<input type="text" class="form-control" name="cargo" id="cargo">
			      							</div> 
			      							<div class="form-group">       
												<label for="id_status"> </label>      
												<input type="hidden"  name="id_status" value="1" id="id_status">
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

					<div>
				      
				      	<form class="navbar-form navbar-left" role="search" action="<?php echo base_url('empleados/buscar_empleado');?>" method="post">
					        <div class="form-group">
					          <input type="text" class="form-control" placeholder="Nombre" name="nombre_completo" id="nombre_completo">
					        </div>
					        <button type="submit" class="btn btn-default">Buscar</span></button>
					    </form>

					    <a class="navbar-brand"  href="<?php echo base_url('empleados/index');?>">Mostrar Todos</a>

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
					 <th>Codigo Empleado</th>         
					 <th>Nombre Completo</th>          
					 <th>Correo Electronico</th> 
					 <th>No. Extension</th>
					 <th>Activo</th> 
					 <th>Accion</th>
					 <th>Detalles</th> 

				</tr>   
			</thead>    
			<tbody> 
				<?php foreach ($cargar_empleados as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					
					<tr>
					<td> <?php echo $fila->codigo_empleado; ?></td>
					<td> <?php	echo $fila->nombre_completo; ?></td>
					<td> <?php	echo $fila->correo_electonico; ?></td>
					<td> <?php	echo $fila->num_extension; ?></td>
					<?php 
					switch ($fila->id_status) {
						case FALSE:?>
							<td> 
							<img class="icon" src="<?php echo base_url(); ?>img/icon/tacha.jpg">  
		      				</td>
							<?php break;						
						case TRUE:?>
							<td> 
							<img class="icon" src="<?php echo base_url(); ?>img/icon/ploma.png">  
		      				</td>
							<?php break;
					}
					?>
					<td><a href="" data-toggle="modal" data-target="#miModal<?php echo $fila->id_empleado; ?>">Editar</a><b>

				      	<!-- Modal -->
						<div id="miModal<?php echo $fila->id_empleado; ?>" class="modal fade" role="dialog">
						  	<div id="moduloemp" class="modal-dialog">

						    <!-- Modal content-->
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Editar Empleado</h4>
							      	</div>
							      	<div class="modal-body">
							        	<form id="ModalEmpleadoEditar" role="form" action="<?php echo base_url('empleados/actualizar');?>" method="post">     
											<div class="form-group">       
												<input type="hidden" class="form-control" name="id_empleado" id="id_empleado" value="<?php echo $fila->id_empleado; ?>" readonly>
											</div> 

											<div class="form-group">     
												<label for="codigo_empleado">Codigo Empleado</label>       
												<input type="text" class="form-control" name="codigo_empleado" id="codigo_empleado" value="<?php echo $fila->codigo_empleado; ?>" readonly>
											</div>
											<div class="form-group">       
												<label for="nombre_completo">Nombre Completo</label>       
												<input type="text" class="form-control" name="nombre_completo" id="nombre_completo" value="<?php echo $fila->nombre_completo; ?>">
											</div>

											 <div class="form-group">
											  <label for="unidad">Unidad:</label>
											  <?php $unidades = array('SECTURE','PLAZA DE LAS 3 CENTURIAS','OFICINA DE ATENCION AL VISITANTE EN PALACIO','OCV','PARTICULAR'); ?>
											  <select class="form-control" name="unidad" id="unidad">
											  	<?php foreach ($unidades as $key => $value) {?>
											  		<?php if ( $key == $fila->unidad ) {?>
											  			<option value="<?php echo $key ;?>" selected><?php echo $value ;?></option>											  			
											  		<?php }else{?>
											  			<option value="<?php echo $key ;?>"><?php echo $value ;?></option>
											  		<?php } ?>													
												<?php } ?>											    
											  </select>
											</div>
											<div class="form-group">
												<label for="usuario_de_red">Usuario de Dominio</label>       
												<input type="text" class="form-control" name="usuario_de_red" id="usuario_de_red" value="<?php echo $fila->usuario_de_red; ?>"> 
											</div>
											<div class="form-group">
												<label for="contrasena">Contraseña</label>       
												<input type="text" class="form-control" name="contrasena" id="contrasena" value="<?php echo $fila->contrasena; ?>">
											</div>
											<div class="form-group"> 
												<label for="num_extension">No. Extension</label>       
												<input type="text" class="form-control" name="num_extension" id="num_extension" value="<?php echo $fila->num_extension; ?>"> 
											</div>
											<div class="form-group">
												<label for="correo_electonico">Correo Electonico</label>       
												<input type="text" class="form-control" name="correo_electonico" id="correo_electonico"  pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" value="<?php echo $fila->correo_electonico; ?>">
											</div>
											<div class="form-group">       
												<label for="area">Area de Adscripcion</label>       
												<?php $areas = array(
														'COMUNICACION Y DIFUSION',
														'COORD. RELACIONES PUBLICAS',
														'DIR. ADMINISTRATIVO',
														'DIR. CENTROS DE ATENCION AL VISITANTE',
														'DIR. DE ASUNTOS JURIDICOS',
														'DIR. DE CAPACITACION Y ASISTENCIA TURISTICA',
														'DIR. DE DESARROLLO Y PROYECTOS TURISTICOS',
														'DIR. DE MERCADOTECNIA Y DIFUSION',
														'DIR. DE PLANEACION ESTADISTICA E INFORMATICA',
														'DIR. DE PROMOCION Y FOMENTO',
														'DIR. PLAZA TRES CENTURIAS',
														'OFICINA DEL SECRETARIO'														
												);?>
											  <select class="form-control" name="area" id="area">
											  	<?php foreach ($areas as $key => $value) {?>
											  		<?php if ( $key == $fila->area ) {?>
											  			<option value="<?php echo $key ;?>" selected><?php echo $value ;?></option>
											  		<?php }else{?>
											  			<option value="<?php echo $key ;?>"><?php echo $value ;?></option>
											  		<?php } ?>
													
												<?php } ?>											    
											    
											  </select>
											</div>
											
											<div class="form-group">
												<label for="cargo">Cargo</label>       
												<input type="text" class="form-control" name="cargo" id="cargo" value="<?php echo $fila->cargo; ?>">
				      						</div> 
				      						<div class="form-group">        
												<label for="id_status">Activo</label>  
												<?php 
												switch ($fila->id_status) {
													case FALSE:?>
														<?php if($fila->id_status == TRUE){  ?>
										 					<input type="checkbox" name="id_status" id="id_status" value="<?php echo $fila->id_status; ?>" checked>
											 				<?php } else {?>
											 				<input type="checkbox" id="id_status" name="id_status" value="1">
										 				<?php }?>														
														<?php break;						
													case TRUE:?>
														<?php if( $fila->id_status == FALSE){  ?>
										 					<input type="checkbox" name="id_status"  id="id_status"value="<?php echo $fila->id_status; ?>" checked>
											 				<?php } else {?>
											 				<input type="checkbox" name="id_status" id="id_status" value="0" checked>
										 				<?php }?>														
									      				<?php break;
												}
												?>
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

						<!--| <a href="" data-toggle="modal" data-target="#myModal2<?php //echo $fila->id_empleado; ?>">Eliminar</a></td>-->


						<!-- Modal -->
						<!--<div class="modal fade" id="myModal2<?php //echo $fila->id_empleado; ?>" role="dialog">
						  <div id="moduloemp" class="modal-dialog">-->

						    <!-- Modal content-->
						    <!-- <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Borrar Registro</h4>
						      </div>
						      <div class="modal-body">
						        <p><form role="form" action="<?php //echo base_url('empleados/eliminar');?>" method="post">
										<input type="hidden" class="form-control" name="id_empleado" value="<?php //echo $fila->id_empleado; ?>" readonly>
							 			<div class="modal-body">Se borrara todo el regisro del empleado <b><?php //echo $fila->nombre_completo; ?></b> de manera permanente, 
							 				¿estas seguro que deseas eliminar?
							 			</div>
							 			<div class="modal-footer">
							        		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        
								            	
								    		<button type="submit" class="btn btn-info">Eliminar</button> 
						      			</div>      
						            </form>  </p>
						      </div>
						      
						    </div>

						  </div>
						</div>-->
						<!-- Modal -->


					<td><a href="<?php echo base_url('empleados/detalles'); ?>/<?php echo $fila->id_empleado; ?>">Ver detalles</a></td>
						
					</tr>
					
				<?php endforeach; ?>
			</tbody> 
		</table> 

	</div>
</div>


