<div class="well"> <!-- Inicio del container -->
		
	<div class="row"> 
		<form class="form-inline" role="form" method="post" action="<?php echo base_url('users/filtrar_por_rol');?>">
			<div class="form-group">       
			  	<label for="id_tipo">Filtrar por Rol</label> 
				<select class="form-control" name="id_tipo" id="id_tipo" onchange="this.form.submit()"><!--Cuando detectes un cambio en tus selects traeme los datos de la seleccion-->
				<option>Roles</option>
			    <?php foreach ($cargar_roles as $rol) :?>      
			 	<option value="<?php echo $rol->id_tipo; ?>"><?php echo $rol->descripcion;?></option>                 
			 	<?php endforeach; ?>       
				</select>
			</div>
		</button> 
     	</form>

     	<form class="form-inline" role="form" method="post" action="<?php echo base_url('users/filtrar_por_usuario');?>">
			<div class="form-group">       
			  	<label for="name">Filtrar por Usuario</label>       
			  	<select class="form-control" name="id_user" id="id_user" onchange="this.form.submit()">
			  	 <option>Usuarios</option>
			    <?php foreach ($cargar_users_lista as $users_nom) :?>      
			 	<option value="<?php echo $users_nom->id_user; ?>"><?php echo $users_nom->nombre;?></option>                 
			 	<?php endforeach; ?>       
				 </select>
	     	</div> 

	     	
     	</form>
	
	<!-- Button trigger modal -->   <!--pag 133 bootstrap-->
		<button class="btn btn-primary btn-ms" data-toggle="modal" data-target="#myModal">   
		 Nuevo Usuario 
		</button> 
			


		<!-- Modal --> 
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    
			<div class="modal-dialog">       
				<div class="modal-content">          
				<div class="modal-header">             
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
					<h4 class="modal-title" id="myModalLabel">Ingresar Nuevo Usuario</h4>             
					
						<form role="form" action="<?php echo base_url('users/crear');?>" method="post">     
							<div class="form-group">       
								<label for="nombre">Nombre</label>       
								<input type="text" class="form-control" name="nombre"> 
								<label for="id_tipo">Rol</label> 
								 <select class="form-control" name="id_tipo">
								    <?php foreach ($cargar_roles as $rol) :?>      
								 	<option value="<?php echo $rol->id_tipo; ?>"><?php echo $rol->descripcion;?></option>                 
								 	<?php endforeach; ?>       
								 </select>       
								<label for="username">Username</label>       
								<input type="text" class="form-control" name="username"> 
								<label for="password">Password</label>       
								<input type="text" class="form-control" name="password"> 
								<label for="email">Email</label>       
								<input type="text" class="form-control" name="email"> 
								<label for="tel">Telefono</label>       
								<input type="text" class="form-control" name="tel">       
								<label for="id_status">       
									<input type="hidden"  name="id_status" value="1">
	      						</label>    
      						</div>    
      						<button type="submit" class="btn btn-default">Guardar</button> 
      					</form> 

				</div>       
				</div><!-- /.modal-content -->    
			</div><!-- /.modal-dialog --> 
		</div><!-- /.modal --> 

	</div>  

	<div class="row" id="tabla_usuarios">
		<table class="table table-bordered">    
			<caption><h3>Tabla Usuarios</h3></caption>    
			<thead>       
				<tr>         
					 <th>Id</th>         
					 <th>Nombre</th>          
					 <th>Rol</th> 
					 <th>Username</th> 
					 <th>Password</th>  
					 <th>Email</th>  
					 <th>Telefono</th> 
					 <th>Activo</th>
					 <th>Acción</th>
				</tr>    
			</thead>    
			<tbody> 
				<?php foreach ($cargar_users as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					
					<tr>
					<td> <?php echo $fila->id_user; ?></td>
					<td> <?php echo $fila->nombre; ?></td>
					<td> <?php	echo $fila->descripcion; ?></td>
					<td> <?php	echo $fila->username; ?></td>
					<td> <?php	echo $fila->password; ?></td>
					<td> <?php	echo $fila->email; ?></td>
					<td> <?php	echo $fila->tel; ?></td>
					<?php 
					switch ($fila->id_status) {
						case FALSE:?>
							<td> 
							<img class="icon" src="../img/icon/tacha.jpg">  
		      				</td>
							<?php break;						
						case TRUE:?>
							<td> 
							<img class="icon" src="../img/icon/ploma.png">  
		      				</td>
							<?php break;
					}
					?>
					
					<td><a href="" data-toggle="modal" data-target="#miModal<?php echo $fila->id_user; ?>">Editar</a>
			 

						<!-- Modal --> 
						<div class="modal fade" id="miModal<?php echo $fila->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    
							<div class="modal-dialog">       
								<div class="modal-content">          
									<div class="modal-header">             
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button> 
										<h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>            
									
										<form role="form" action="<?php echo base_url('users/actualizar');?>" method="post">     
											<div class="form-group">    
												<label for="id_user">Id</label>       
												<input type="text" class="form-control" name="id_user" value="<?php echo $fila->id_user; ?>" readonly>    
												<label for="nombre">Nombre</label>       
												<input type="text" class="form-control" name="nombre" value="<?php echo $fila->nombre; ?>"> 
												<label for="id_tipo">Rol</label>  
												<select class="form-control" name="id_tipo">
								    			<?php foreach ($cargar_roles as $rol) :?> 
													<?php if($fila->id_tipo==$rol->id_tipo){  ?>
									 					<option value="<?php echo $fila->id_tipo; ?>" selected><?php echo $rol->descripcion;?></option>                 
									 				<?php } else {?>
									 					<option value="<?php echo $rol->id_tipo; ?>"><?php echo $rol->descripcion;?></option>
									 				<?php }?>
									 			<?php endforeach;?> 
								 				</select>
												<label for="username">Username</label>       
												<input type="text" class="form-control" name="username" value="<?php	echo $fila->username; ?>"> 
												<label for="password">Password</label>       
												<input type="text" class="form-control" name="password" value="<?php	echo $fila->password; ?>"> 
												<label for="email">Email</label>       
												<input type="text" class="form-control" name="email" value="<?php	echo $fila->email; ?>"> 
												<label for="tel">Telefono</label>       
												<input type="text" class="form-control" name="tel" value="<?php	echo $fila->tel; ?>">       
												<label for="id_status">Activo</label>  
												<?php 
												switch ($fila->id_status) {
													case FALSE:?>
														<input type="checkbox" name="id_status" value="<?php	echo $fila->id_status; ?>">
														<?php break;						
													case TRUE:?>
														
														<input type="checkbox" name="id_status" value="<?php	echo $fila->id_status; ?>" checked>  
									      				
														<?php break;
												}
												?>
																			
					      						  
				      						</div>    
				      						<button type="submit" class="btn btn-default">Modificar</button>
				      					</form> 
				      				</div> 
				      			</div> 
				      		</div> 
				      	</div> 
				      					

					</td>
					</tr>
					
				<?php endforeach; ?>
			</tbody> 
		</table>  
	</div>
</div>
