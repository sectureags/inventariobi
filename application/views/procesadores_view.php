<div class="panel panel-primary">
  <div class="panel-heading text-center"><h1><?php echo $title; ?></h1></div>
  <div class="panel-body">



  		<div class="caption">
	      	<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			     		<!--link-->
						<a class="navbar-brand" data-toggle="modal" href="#myModalNuevoPROC">Crear nuevo</a>
			      		<!-- Modal -->
						<div id="myModalNuevoPROC" class="modal fade" role="dialog">
						  <div id="moduloseg" class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Agregar Datos de PROCESADOR</h4>
						      </div>
						      <div class="modal-body">

						         <form id="ModalNuevoIPC" class="" role="form" method="post" action="<?php echo base_url('bi_procesador/crear');?>">
						         	<div class="form-group">       
									  	<label for="tipo">tipo</label>       
										<input type="text" class="form-control" name="tipo" id="tipo" required>
									</div>
									<div class="form-group">       
									  	<label for="marca_proc">marca_proc</label>       
										<input type="text" class="form-control" name="marca_proc" id="marca_proc" required>
									</div>
									<div class="form-group">       
									  	<label for="procesador">procesador</label>       
										<input type="text" class="form-control" name="procesador" id="procesador" required>
									</div>
								  
					  	    		<div class="form-group">      
											<label for="id_cpu">Asignar a Computadora</label> 
											<select class="form-control" name="id_cpu" id="id_cpu">
											    <?php foreach ($cargar_cpus_lista as $st) :?>      
											 	<option value="<?php echo $st->id_cpu; ?>">Computadora: <?php echo $st->marca_proc;?> <?php echo $st->modelo;?> [<?php echo $st->hostname;?>]</option>                 
											 	<?php endforeach; ?>       
											</select>
						 			</div> 

									<div class="form-group">        
											<label for="status">Instalado</label>
						 					<input type="radio" name="status" value="1">
								 			<label for="status">No instalado</label>
							 				<input type="radio" name="status" value="0">
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


			    </div>
			    <div>
			      <ul class="nav navbar-nav">
			      	<li>
						<form  class="navbar-form navbar-right" role="form" method="post" action="<?php echo base_url('users/filtrar_por_rol');?>">
							<div class="form-group">       
					
							</div>
						 
				     	</form>
			        </li>
			        
			      </ul>			      
			      <ul class="nav navbar-nav navbar-right">
			        <li></li>
			      </ul>
			    </div>
			  </div>
		    </nav>
		  </div>

		
	<div class="table-responsive">
		<table class="table table-bordered">    
				<thead>       
					<tr>
					<?php
						foreach ($procesadores as $field)
						{
							echo "<th>";
						    echo $field;
						    echo "</th>";
						}
					?> 
						<th>Acción</th>
					</tr>   
				</thead>    
				<tbody> 
				<?php foreach ($cargar_procesadores as $fila) :?> <!--//es ip un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					
					<tr>
					<td> <?php echo $fila->id_procesador; ?></td>
					<td> <?php echo $fila->tipo; ?></td>
					<td> <?php echo $fila->marca_proc; ?></td>
					<td> <?php echo $fila->procesador; ?></td>
					<td> 
						<?php 
							foreach ($cargar_cpus_lista as $st) :
							    if( $fila->id_cpu == $st->id_cpu ){  
							    	$segments = array('bi_cpu', 'detalles', $fila->id_cpu );
							    	$url = base_url($segments);
							    	echo '<a href="'.$url.'" class="btn"> [ '.$st->hostname.' ]';
								}							
					 		endforeach; 				 		
				 		?>
					</td>
					<?php 
					switch ($fila->status) {
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
					
					<td>
						<div class="btn-group" role="group">
						    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						      Acciones
						      <span class="caret"></span>
						    </button>
						    <ul class="dropdown-menu">
						      <li><a data-toggle="modal" data-target="#moModalEditarPROC<?php echo $fila->id_procesador; ?>">Actualizar</a></li>
						      <li><a data-toggle="modal" data-target="#XmoModalEliminarPROC<?php echo $fila->id_procesador; ?>">Eliminar</a></li>
						    </ul>
						</div>
												<!-- Modal -->
						<div id="moModalEditarPROC<?php echo $fila->id_procesador; ?>" class="modal fade" role="dialog">
						  	<div id="moduloseg" class="modal-dialog">

						    <!-- Modal content-->
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Editar Registro PROCESADOR</h4>
							      	</div>
							      	<div class="modal-body">
							        	<form id="ModalEditarIpC" role="form" action="<?php echo base_url('bi_procesador/actualizar');?>" method="post">     
												<div class="form-group">    
												<label for="id_procesador">Id</label>       
												<input type="text" class="form-control" id="id_procesador" name="id_procesador" value="<?php echo $fila->id_procesador; ?>" required>
												</div>
											<div class="form-group">       
									  			<label for="marca_proc">marca_proc</label>       
												<input type="text" class="form-control" name="marca_proc" id="marca_proc" value="<?php echo $fila->marca_proc; ?>" required>
											</div>
											<div class="form-group">       
											  	<label for="procesador">procesador</label>       
												<input type="text" class="form-control" name="procesador" id="procesador" value="<?php echo $fila->procesador; ?>" required>
											</div>
										 
					      		  <div class="form-group">      
											<label for="id_cpu">Asignar a Computadora</label> 

									<select class="form-control" name="id_cpu" id="id_cpu">
									    <?php foreach ($cargar_cpus_lista as $st) :?>      
									    <?php if($fila->id_cpu == $st->id_cpu){  ?>    
													<option value="<?php echo $st->id_cpu; ?>" selected>Computadora: <?php echo $st->marca_proc;?> <?php echo $st->modelo;?> [<?php echo $st->hostname;?>]</option>                 
												 	<?php } else {?> 
											 		<option value="<?php echo $st->id_cpu; ?>">Computadora: <?php echo $st->marca_proc;?> <?php echo $st->modelo;?> [<?php echo $st->hostname;?>]</option>                 
												 	<?php }?>									 	
									 	<?php endforeach; ?>       
									</select>
										</div>							 				
												<div class="form-group">   																								  
												<?php 
												switch ($fila->status) {
													case "0":?>
														<label for="status">Instalado</label>
										 					<input type="radio" name="status" value="1">
											 			<label for="status">No instalado</label>
											 				<input type="radio" name="status" value="0" checked>										 				
														<?php break;						
													case "1":?>
														<label for="status">Instalado</label>
										 					<input type="radio" name="id_status" value="1" checked>
											 			<label for="status">No instalado</label>
											 				<input type="radio" name="id_status" value="0">										 				
									      				<?php break;
												} ?>
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

						<!-- Modal Eliminar -->
						<div id="XmoModalEliminarPROC<?php echo $fila->id_procesador; ?>" class="modal fade" role="dialog">
						  	<div id="moduloseg" class="modal-dialog">
						    <!-- Modal content-->
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Confirmar Eliminar Registro - Procesador</h4>
							      	</div>
							      	<div class="modal-body">				      						
		      							<p>Está a punto de eliminar permanentemente el registro.</p>
		      							<p>Desea eliminar el registro permanentemente?</p>
		      							<p>ID: <?php echo $fila->id_procesador; ?></p>
							      	</div>
							      	<div class="modal-footer">
					                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					                    <a href="<?php echo base_url('bi_procesador/eliminar'); ?>/<?php echo $fila->id_procesador; ?>" class="btn btn-danger danger">Sí, eliminar</a>
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
</div>