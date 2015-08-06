<div class="panel panel-primary">
  <div class="panel-heading text-center"><h1>CPUs</h1></div>
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
						        <p><form role="form" action="<?php echo base_url('bi_cpu/crear');?>" method="post">     
										<div class="form-group">       
											<label for="num_inventario">No. Inventario</label>       
											<input type="text" class="form-control" name="num_inventario">       
											<label for="categoria">Categoria</label>       
											<input type="text" class="form-control" name="categoria"> 
											<label for="marca">Marca</label>       
											<input type="text" class="form-control" name="marca"> 
											<label for="modelo">Modelo</label>       
											<input type="text" class="form-control" name="modelo"> 
											<label for="hostname">HostName</label>       
											<input type="text" class="form-control" name="hostname">
											<label for="num_serie">No. Serie</label>       
											<input type="text" class="form-control" name="num_serie">
											<label for="tipo">Tipo</label>       
											<input type="text" class="form-control" name="tipo">
											<label for="ubicacion">Ubicacion</label>       
											<input type="text" class="form-control" name="ubicacion">       
											<label for="status">Status</label> 
											<select class="form-control" name="status">
											    <?php foreach ($cargar_status as $st) :?>      
											 	<option value="<?php echo $st->id; ?>"><?php echo $st->nombre;?></option>                 
											 	<?php endforeach; ?>       
											</select>    
											<label for="id_empleado">Empleado</label>   
											<select class="form-control" name="id_empleado">
											    <?php foreach ($cargar_empleados as $empleados) :?>      
											 	<option value="<?php echo $empleados->id_empleado; ?>"><?php echo $empleados->nombre_completo;?></option>                 
											 	<?php endforeach; ?>       
											</select>  
			      						</div> 

			      						<div class="modal-footer">
										    <button type="submit" class="btn btn-primary">Guardar</button>
										</div>    
			      					</form> 
			      				</p>
						      </div>
						    </div>

						  </div>
						</div>
						<!-- Modal -->

						<!-- Modal -->
									<div id="myModal" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title">Editar CPU</h4>
									      </div>
									      <div class="modal-body">
									        <p><form role="form" action="<?php echo base_url('bi_cpu/crear');?>" method="post">     
										<div class="form-group">       
											<label for="num_inventario">No. Inventario</label>       
											<input type="text" class="form-control" name="num_inventario">       
											<label for="categoria">Categoria</label>       
											<input type="text" class="form-control" name="categoria"> 
											<label for="marca">Marca</label>       
											<input type="text" class="form-control" name="marca"> 
											<label for="modelo">Modelo</label>       
											<input type="text" class="form-control" name="modelo"> 
											<label for="hostname">HostName</label>       
											<input type="text" class="form-control" name="hostname">
											<label for="num_serie">No. Serie</label>       
											<input type="text" class="form-control" name="num_serie">
											<label for="tipo">Tipo</label>       
											<input type="text" class="form-control" name="tipo">
											<label for="ubicacion">Ubicacion</label>       
											<input type="text" class="form-control" name="ubicacion">       
											<label for="status">Status</label> 
											<select class="form-control" name="status">
											    <?php foreach ($cargar_status as $st) :?>      
											 	<option value="<?php echo $st->id; ?>"><?php echo $st->nombre;?></option>                 
											 	<?php endforeach; ?>       
											</select>    
											<label for="id_empleado">Empleado</label>   
											<select class="form-control" name="id_empleado">
											    <?php foreach ($cargar_empleados as $empleados) :?>      
											 	<option value="<?php echo $empleados->id_empleado; ?>"><?php echo $empleados->nombre_completo;?></option>                 
											 	<?php endforeach; ?>       
											</select>  
			      						</div> 

			      						<div class="modal-footer">
										    <button type="submit" class="btn btn-primary">Guardar</button>
										</div>    
			      					</form> </p>
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
			            <li><a href="#">Marca</a></li>
			            <li><a href="#">Modelo</a></li>
			            <li><a href="#">Status</a></li>
			          </ul>
			        </li>

			        <li class="dropdown">
			          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ordenar por:
			          <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">No. Inventario</a></li>
			            <li><a href="#">Host Name</a></li>
			            <li><a href="#">Empleado</a></li>
			          </ul>
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
							    <li><a href="#">Ver detalle</a></li>
							    <li><a href="#">Reasignación</a></li>
							    <li><a data-toggle="modal" data-target="#myModal">Editar</a>

									<!-- Modal -->
									<div id="myModal" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title">Modal Header</h4>
									      </div>
									      <div class="modal-body">
									        <p>Some text in the modal.</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									      </div>
									    </div>

									  </div>
									</div>
									<!-- Modal -->
							    </li>

							    <li><a href="#">Dar de Baja</a></li>
							  </ul>
							</div>
						</td>
						</tr>
					<?php endforeach; ?>
				</tbody> 
			</table>  


  	</div>
</div>
