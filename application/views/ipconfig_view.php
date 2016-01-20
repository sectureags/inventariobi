<div class="panel panel-primary">
  <div class="panel-heading text-center"><h1><?php echo $title; ?></h1></div>
  <div class="panel-body">



  		<div class="caption">
	      	<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			     		<!--link-->
						<a class="navbar-brand" data-toggle="modal" href="#myModalNuevoIPC">Crear nuevo</a>
			      		<!-- Modal -->
						<div id="myModalNuevoIPC" class="modal fade" role="dialog">
						  <div id="moduloseg" class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Agregar Datos de IP_CONFIG</h4>
						      </div>
						      <div class="modal-body">

						         <form id="ModalNuevoIPC" class="" role="form" method="post" action="<?php echo base_url('bi_ipconfig/crear');?>">
						         	<div class="form-group">       
									  	<label for="mac">mac</label>       
										<input type="text" class="form-control" name="mac" id="mac" required>
									</div>
									<div class="form-group">       
									  	<label for="ip">ip</label>       
										<input type="text" class="form-control" name="ip" id="ip" required>
									</div>
								  
					  	    		<div class="form-group">      
											<label for="id_cpu">Asignar a Computadora</label> 
											<select class="form-control" name="id_cpu" id="id_cpu">
											    <?php foreach ($cargar_cpus_lista as $st) :?>      
											 	<option value="<?php echo $st->id_cpu; ?>">Computadora: <?php echo $st->marca;?> <?php echo $st->modelo;?> [<?php echo $st->hostname;?>]</option>                 
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
						foreach ($ipconfigs as $field)
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
				<?php foreach ($cargar_ipconfigs as $fila) :?> <!--//es ip un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
					
					<tr>
					<td> <?php echo $fila->id_ipconfig; ?></td>
					<td> <?php echo $fila->interface; ?></td>
					<td> <?php echo $fila->mac; ?></td>
					<td> <?php echo $fila->ip; ?></td>
					<td> <?php echo $fila->broadcast; ?></td>
					<td> <?php echo $fila->mask; ?></td>
					<td> <?php echo $fila->puerta; ?></td>
					<td> <?php echo $fila->dns1; ?></td>
					<td> <?php echo $fila->dns2; ?></td>
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
						      <li><a data-toggle="modal" data-target="#moModalEditarIPC<?php echo $fila->id_ipconfig; ?>">Actualizar</a></li>
						      <li><a data-toggle="modal" data-target="#XmoModalEliminarIPC<?php echo $fila->id_ipconfig; ?>">Eliminar</a></li>
						    </ul>
						</div>
												<!-- Modal -->
						<div id="moModalEditarIPC<?php echo $fila->id_ipconfig; ?>" class="modal fade" role="dialog">
						  	<div id="moduloseg" class="modal-dialog">

						    <!-- Modal content-->
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Editar Registro IP CONFIG</h4>
							      	</div>
							      	<div class="modal-body">
							        	<form id="ModalEditarIpC" role="form" action="<?php echo base_url('bi_ipconfig/actualizar');?>" method="post">     
												<div class="form-group">    
												<label for="id_ipconfig">Id</label>       
												<input type="text" class="form-control" id="id_ipconfig" name="id_ipconfig" value="<?php echo $fila->id_ipconfig; ?>" required>
												</div>
											<div class="form-group">       
									  			<label for="mac">mac</label>       
												<input type="text" class="form-control" name="mac" id="mac" value="<?php echo $fila->mac; ?>" required>
											</div>
											<div class="form-group">       
											  	<label for="ip">ip</label>       
												<input type="text" class="form-control" name="ip" id="ip" value="<?php echo $fila->ip; ?>" required>
											</div>
										  <div class="form-group">
											   	<label for="interface">interface</label>       
												<input type="text" class="form-control" name="interface" id="interface" value="<?php echo $fila->interface; ?>" required> 
										  </div>
										  <div class="form-group">
										  		<label for="broadcast">broadcast</label>       
												<input type="text" class="form-control" name="broadcast" id="broadcast" value="<?php echo $fila->broadcast; ?>" required>
										  </div>
										  <div class="form-group"> 
												<label for="mask">mask</label>       
												<input type="text" class="form-control" name="mask" id="mask" value="<?php echo $fila->mask; ?>" required>
										  </div>
										  <div class="form-group"> 
												<label for="puerta">puerta</label>       
												<input type="text" class="form-control" name="puerta" id="puerta" value="<?php echo $fila->puerta; ?>" required>
										  </div>
										  <div class="form-group"> 
												<label for="dns1">dns1</label>       
												<input type="text" class="form-control" name="dns1" id="dns1" value="<?php echo $fila->dns1; ?>" required>
										  </div>
										  <div class="form-group"> 
												<label for="dns2">dns2</label>       
												<input type="text" class="form-control" name="dns2" id="dns2" value="<?php echo $fila->dns2; ?>" required>
										  </div>
					      		  <div class="form-group">      
											<label for="id_cpu">Asignar a Computadora</label> 

									<select class="form-control" name="id_cpu" id="id_cpu">
									    <?php foreach ($cargar_cpus_lista as $st) :?>      
									    <?php if($fila->id_cpu == $st->id_cpu){  ?>    
													<option value="<?php echo $st->id_cpu; ?>" selected>Computadora: <?php echo $st->marca;?> <?php echo $st->modelo;?> [<?php echo $st->hostname;?>]</option>                 
												 	<?php } else {?> 
											 		<option value="<?php echo $st->id_cpu; ?>">Computadora: <?php echo $st->marca;?> <?php echo $st->modelo;?> [<?php echo $st->hostname;?>]</option>                 
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
						<div id="XmoModalEliminarIPC<?php echo $fila->id_ipconfig; ?>" class="modal fade" role="dialog">
						  	<div id="moduloseg" class="modal-dialog">
						    <!-- Modal content-->
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Confirmar Eliminar Registro - Disco Duro</h4>
							      	</div>
							      	<div class="modal-body">				      						
		      							<p>Está a punto de eliminar permanentemente el registro.</p>
		      							<p>Desea eliminar el registro permanentemente?</p>
		      							<p>ID: <?php echo $fila->id_ipconfig; ?></p>
							      	</div>
							      	<div class="modal-footer">
					                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					                    <a href="<?php echo base_url('bi_ipconfig/eliminar'); ?>/<?php echo $fila->id_ipconfig; ?>" class="btn btn-danger danger">Sí, eliminar</a>
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