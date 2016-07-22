<div class="panel panel-primary">
  <div class="panel-heading text-center"><h1><?php echo $title; ?></h1></div>
  <div class="panel-body">



  		<div class="caption">
	      	<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			     		<!--link-->
						<a class="navbar-brand" data-toggle="modal" href="#myModalNuevoregulador">Crear nuevo</a>
			      		<!-- Modal -->
						<div id="myModalNuevoregulador" class="modal fade" role="dialog">
						  <div id="moduloseg" class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Agregar Datos del regulador</h4>
						      </div>
						      <div class="modal-body">

						         <form id="ModalNuevoregulador" class="" role="form" method="post" action="<?php echo base_url('bi_regulador/crear');?>">
						         	
						         	<?php $this->load->view('form-captura-rapida'); ?>
								  
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
			      		<a href="<?php echo base_url('reguladores');?>">Recargar</a>
			      	</li>
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

		
	
		<table class="table table-bordered">    
				<thead>       
					<tr>
					<?php
						foreach ($fields as $field)
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
				<?php foreach ($cargar_lista_reguladores as $fila) :?>
					
					<tr>
					<td> <?php echo $fila->id_regulador; ?></td>
					<td> <?php echo $fila->num_inventario; ?></td>
					<td> <?php echo $fila->ubicacion; ?></td>
					<td> <?php	echo $fila->tipo; ?></td>
					<td> <?php	echo $fila->marca; ?></td>
					<td> <?php	echo $fila->modelo; ?></td>
					<td> <?php	echo $fila->num_serie; ?></td>
										
					<td> 
						<?php 
							foreach ($cargar_empleados as $st) :
							    if( $fila->id_empleado == $st->id_empleado ){  
							    	$segments = array('empleados', 'detalles', $fila->id_empleado );
							    	$url = base_url($segments);
							    	echo '<a href="'.$url.'" class="btn">'.$st->nombre_completo;
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
						      <li><a data-toggle="modal" data-target="#moModalEditarregulador<?php echo $fila->id_regulador; ?>">Actualizar</a></li>
						      <li><a data-toggle="modal" data-target="#XmoModalEliminarregulador<?php echo $fila->id_regulador; ?>">Eliminar</a></li>
						    </ul>
						</div>
												<!-- Modal -->
						<div id="moModalEditarregulador<?php echo $fila->id_regulador; ?>" class="modal fade" role="dialog">
						  	<div id="moduloseg" class="modal-dialog">

						    <!-- Modal content-->
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Editar regulador</h4>
							      	</div>
							      	<div class="modal-body">
							        	<form id="ModalEditarregulador" role="form" action="<?php echo base_url('bi_regulador/actualizar');?>" method="post">     
												<div class="form-group">    
												<label for="id_regulador">Id</label>       
												<input type="text" class="form-control" id="id_regulador" name="id_regulador" value="<?php echo $fila->id_regulador; ?>" required>
												</div>
												
												<?php include('form-editar-rapida.php'); ?>

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
						<div id="XmoModalEliminarregulador<?php echo $fila->id_regulador; ?>" class="modal fade" role="dialog">
						  	<div id="moduloseg" class="modal-dialog">
						    <!-- Modal content-->
							    <div class="modal-content">
							      	<div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Confirmar Eliminar Registro</h4>
							      	</div>
							      	<div class="modal-body">				      						
		      							<p>Está a punto de eliminar permanentemente el registro.</p>
		      							<p>Desea eliminar el registro permanentemente?</p>
		      							<p>ID: <?php echo $fila->id_regulador; ?></p>
							      	</div>
							      	<div class="modal-footer">
					                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					                    <a href="<?php echo base_url('bi_regulador/eliminar'); ?>/<?php echo $fila->id_regulador; ?>" class="btn btn-danger danger">Sí, eliminar</a>
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