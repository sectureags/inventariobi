<div class="panel panel-info">
  	<div class="panel-heading text-center"><h1>EMPLEADOS</h1></div>
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
												<input type="text" class="form-control" name="codigo_empleado" id="codigo_empleado">
											</div>
											<div class="form-group">
												<label for="nombre_completo">Nombre Completo</label>       
												<input type="text" class="form-control" name="nombre_completo" id="nombre_completo">
											</div> 
											<div class="form-group">
												<label for="unidad">Unidad</label>       
												<input type="text" class="form-control" name="unidad" id="unidad">
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
												<input type="text" class="form-control" name="correo_electonico" id="correo_electonico">
											</div>
											<div class="form-group">       
												<label for="area">Area de Adscripcion</label>       
												<input type="text" class="form-control" name="area" id="area">
											</div>
											<div class="form-group">
												<label for="cargo">Cargo</label>       
												<input type="text" class="form-control" name="cargo" id="cargo">
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
				      	<ul class="nav navbar-nav">
					        <li class="dropdown">
					          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Filtrar por:
					          <span class="caret"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="#">x</a></li>
					            <li><a href="#">Y</a></li>
					          </ul>
					        </li>

					        <li class="dropdown">
					          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ordenar por:
					          <span class="caret"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="#">No. Empleado</a></li>
					            <li><a href="#">Nombre Ascendente</a></li>
					            <li><a href="#">Nombre Descendente</a></li>
					          </ul>
					        </li>
				      	</ul>
				      	<form class="navbar-form navbar-left" role="search">
					        <div class="form-group">
					          <input type="text" class="form-control" placeholder="Nombre">
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
					 <th>Codigo Empleado</th>         
					 <th>Nombre Completo</th>          
					 <th>Correo Electronico</th> 
					 <th>No. Extension</th> 
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
												<label for="unidad">Unidad</label>       
												<input type="text" class="form-control" name="unidad" id="unidad" value="<?php echo $fila->unidad; ?>">
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
												<input type="text" class="form-control" name="correo_electonico" id="correo_electonico" value="<?php echo $fila->correo_electonico; ?>">
											</div>
											<div class="form-group">       
												<label for="area">Area de Adscripcion</label>       
												<input type="text" class="form-control" name="area" id="area" value="<?php echo $fila->area; ?>">
											</div>
											<div class="form-group">
												<label for="cargo">Cargo</label>       
												<input type="text" class="form-control" name="cargo" id="cargo" value="<?php echo $fila->cargo; ?>">
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

						| <a href="" data-toggle="modal" data-target="#myModal2<?php echo $fila->id_empleado; ?>">Eliminar</a></td>


						<!-- Modal -->
						<div class="modal fade" id="myModal2<?php echo $fila->id_empleado; ?>" role="dialog">
						  <div id="moduloemp" class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Borrar Registro</h4>
						      </div>
						      <div class="modal-body">
						        <p><form role="form" action="<?php echo base_url('empleados/eliminar');?>" method="post">
										<input type="hidden" class="form-control" name="id_empleado" value="<?php echo $fila->id_empleado; ?>" readonly>
							 			<div class="modal-body">Se borrara todo el regisro del empleado <b><?php echo $fila->nombre_completo; ?></b> de manera permanente, 
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
						</div>
						<!-- Modal -->


					<td><a href="<?php echo base_url('empleados/detalles'); ?>/<?php echo $fila->id_empleado; ?>">Ver detalles</a></td>
						
					</tr>
					
				<?php endforeach; ?>
			</tbody> 
		</table> 

	</div>
</div>


