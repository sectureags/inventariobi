<div> <!-- Inicio del container --> 


	<button class="btn btn-primary btn-ms" data-toggle="modal" data-target="#myModal">   
		 Nuevo Registro 
	</button> 

	<!-- Modal --> 
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    
			<div class="modal-dialog">       
				<div class="modal-content">          
				<div class="modal-header">             
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
					<h4 class="modal-title" id="myModalLabel">Ingresar Nuevo Empleado</h4>             
					
						<form role="form" action="<?php echo base_url('empleados/crear');?>" method="post">     
							<div class="form-group">       
								<label for="codigo_empleado">Codigo Empleado</label>       
								<input type="text" class="form-control" name="codigo_empleado">       
								<label for="nombre_completo">Nombre Completo</label>       
								<input type="text" class="form-control" name="nombre_completo"> 
								<label for="unidad">Unidad</label>       
								<input type="text" class="form-control" name="unidad"> 
								<label for="usuario_de_red">Usuario de Dominio</label>       
								<input type="text" class="form-control" name="usuario_de_red"> 
								<label for="contrasena">Contraseña</label>       
								<input type="text" class="form-control" name="contrasena">
								<label for="num_extension">No. Extension</label>       
								<input type="text" class="form-control" name="num_extension">
								<label for="correo_electonico">Correo Electonico</label>       
								<input type="text" class="form-control" name="correo_electonico">       
								<label for="area">Area de Adscripcion</label>       
								<input type="text" class="form-control" name="area">
								<label for="cargo">Cargo</label>       
								<input type="text" class="form-control" name="cargo">
      						</div>    
      						<button type="submit" class="btn btn-default">Guardar</button> 
      					</form> 

				</div>       
				</div><!-- /.modal-content -->    
			</div><!-- /.modal-dialog --> 
		</div><!-- /.modal -->


	<div class="row" id="tabla_empleados">
		<table class="table table-bordered">    
			<caption><h3>Tabla Empleados</h3></caption>    
			<thead>       
				<tr>       
					 <th>Codigo Empleado</th>         
					 <th>Nombre Completo</th>          
					 <th>Unidad</th> 
					 <th>Usuario de Dominio</th> 
					 <th>Contraseña</th>
					 <th>Correo Electronico</th> 
					 <th>No. Extension</th> 
					 <th>Area de Adscripcion</th>  
					 <th>Cargo</th>
					 <th>Accion</th>
					 <th>Detalles</th> 

				</tr>   
			</thead>    
			<tbody> 
				<?php foreach ($cargar_empleados as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					
					<tr>
					<td> <?php echo $fila->codigo_empleado; ?></td>
					<td> <?php	echo $fila->nombre_completo; ?></td>
					<td> <?php	echo $fila->unidad; ?></td>
					<td> <?php	echo $fila->usuario_de_red; ?></td>
					<td> <?php	echo $fila->contrasena; ?></td>
					<td> <?php	echo $fila->correo_electonico; ?></td>
					<td> <?php	echo $fila->num_extension; ?></td>
					<td> <?php	echo $fila->area; ?></td>
					<td> <?php	echo $fila->cargo; ?></td>
					<td><a href="" data-toggle="modal" data-target="#miModal<?php echo $fila->id_empleado; ?>">Editar</a><b>

						<!-- Modal --> 
						<div class="modal fade" id="miModal<?php echo $fila->id_empleado; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    
							<div class="modal-dialog">       
								<div class="modal-content">          
									<div class="modal-header">             
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button> 
										<h4 class="modal-title" id="myModalLabel">Editar Empleado</h4>            
									
										<form role="form" action="<?php echo base_url('empleados/actualizar');?>" method="post">     
											<div class="form-group"> 
											<label for="id_empleado">Id_Interno</label>       
												<input type="text" class="form-control" name="id_empleado" value="<?php echo $fila->id_empleado; ?>" readonly>      
												<label for="codigo_empleado">Codigo Empleado</label>       
												<input type="text" class="form-control" name="codigo_empleado" value="<?php echo $fila->codigo_empleado; ?>" readonly>       
												<label for="nombre_completo">Nombre Completo</label>       
												<input type="text" class="form-control" name="nombre_completo" value="<?php echo $fila->nombre_completo; ?>"> 
												<label for="unidad">Unidad</label>       
												<input type="text" class="form-control" name="unidad" value="<?php echo $fila->unidad; ?>"> 
												<label for="usuario_de_red">Usuario de Dominio</label>       
												<input type="text" class="form-control" name="usuario_de_red" value="<?php echo $fila->usuario_de_red; ?>"> 
												<label for="contrasena">Contraseña</label>       
												<input type="text" class="form-control" name="contrasena" value="<?php echo $fila->contrasena; ?>"> 
												<label for="num_extension">No. Extension</label>       
												<input type="text" class="form-control" name="num_extension" value="<?php echo $fila->num_extension; ?>"> 
												<label for="correo_electonico">Correo Electonico</label>       
												<input type="text" class="form-control" name="correo_electonico" value="<?php echo $fila->correo_electonico; ?>">       
												<label for="area">Area de Adscripcion</label>       
												<input type="text" class="form-control" name="area" value="<?php echo $fila->area; ?>">
												<label for="cargo">Cargo</label>       
												<input type="text" class="form-control" name="cargo" value="<?php echo $fila->cargo; ?>">
				      						</div>    
				      						<button type="submit" class="btn btn-default">Guardar</button> 
      									</form> 
				      				</div> 
				      			</div> 
				      		</div> 
				      	</div> 


						| <a href="" data-toggle="modal" data-target="#myModal2<?php echo $fila->id_empleado; ?>">Eliminar</a></td>

						<!-- Modal --> 
						<div class="modal fade" id="myModal2<?php echo $fila->id_empleado; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    
							<div class="modal-dialog">       
								<div class="modal-content">          
									<div class="modal-header">             
										<button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>             
										<h4 class="modal-title" id="myModalLabel">Borar Registro</h4>         
									</div>

									<form action="<?php echo base_url('empleados/eliminar');?>" method="post">
						 			<div class="modal-body">Se borrara todo el regisro del empleado <?php echo $fila->nombre_completo; ?> de manera permanente, 
						 				¿estas seguro que deseas eliminar?</div>      
						    		<div class="modal-footer">           
						      			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        
						            	
						            	<button type="submit" class="btn btn-primary">Eliminar</button> 
						            	
						            </div>
						            </form>      
						        </div>      
						    </div><!-- /.modal-content --> 
						</div><!-- /.modal --> 

					<td><a href="<?php echo base_url('empleados/detalles'); ?>" id="<?php echo $fila->id_empleado; ?>">Ver detalles</a></td>
						
					</tr>
					
				<?php endforeach; ?>
			</tbody> 
		</table>  
	</div>
</div>
