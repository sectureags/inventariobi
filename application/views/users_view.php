<div class="panel panel-danger">
  <div class="panel-heading text-center"><h1>USUARIOS</h1></div>
  <div class="panel-body">



  		<div class="caption">
	      	<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <!-- Links --> 
			      <a class="navbar-brand" data-toggle="modal" href="#myModal">Crear nuevo</a>
			      		<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div id="moduloseg" class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						     <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Ingresar Nuevo Usuario</h4>
						      </div>
						      <div class="modal-body">
						        <p><form role="form" action="<?php echo base_url('users/crear');?>" method="post">     
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
			      						<div class="modal-footer">
										    <button type="submit" class="btn btn-danger">Guardar</button>
										</div>  
			      					</form> 
			      				</p>
						      </div>
						      
						    </div>

						  </div>
						</div>
						<!-- Modal -->
			    </div>
			    <div>
			      <ul class="nav navbar-nav">
			      	<li>
						<form  class="navbar-form navbar-right" role="form" method="post" action="<?php echo base_url('users/filtrar_por_rol');?>">
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
			        </li>
			        <li><form class="navbar-form navbar-right" role="form" method="post" action="<?php echo base_url('users/filtrar_por_usuario');?>">
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
				     </li>			        
			      </ul>
			      <form class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="No. Inventario">
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
					
					<td><a href="" data-toggle="modal" data-target="#miModal<?php echo $fila->id_user; ?>">Editar</a>
			 			


						<!-- Modal -->
						<div id="miModal<?php echo $fila->id_user; ?>" class="modal fade" role="dialog">
						  	<div id="moduloeseg" class="modal-dialog">

						    <!-- Modal content-->
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Editar Usuario</h4>
							      	</div>
							      	<div class="modal-body">
							        	<p><form role="form" action="<?php echo base_url('users/actualizar');?>" method="post">     
											<div class="form-group">    
												<label for="id_user">Id</label>       
												<input type="text" class="form-control" name="id_user" value="<?php echo $fila->id_user; ?>" readonly>    
												<label for="nombre">Nombre</label>       
												<input type="text" class="form-control" name="nombre" value="<?php echo $fila->nombre; ?>"> 
												<label for="id_tipo">Rol</label>  
												<select class="form-control" name="id_tipo">
								    			<?php foreach ($cargar_roles as $rol) :?> 
													<?php if($fila->id_tipo == $rol->id_tipo){  ?>
									 					<option value="<?php echo $fila->id_tipo; ?>"selected><?php echo $rol->descripcion;?></option>                 
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
														<?php if($fila->id_tipo == FALSE){  ?>
										 					<input type="checkbox" name="id_status" value="<?php echo $fila->id_status; ?>" checked>
											 				<?php } else {?>
											 				<input type="checkbox" name="id_status" value="1">
										 				<?php }?>														
														<?php break;						
													case TRUE:?>
														<?php if( $fila->id_tipo == TRUE){  ?>
										 					<input type="checkbox" name="id_status" value="<?php echo $fila->id_status; ?>" checked>
											 				<?php } else {?>
											 				<input type="checkbox" name="id_status" value="0">
										 				<?php }?>														
									      				<?php break;
												}
												?>
																			
					      						  
				      						</div>    
				      						<div class="modal-footer">
							        			<button type="submit" class="btn btn-danger">Guardar</button>
							      			</div>
				      						</form>
				      					</p>
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