<ol class="breadcrumb">
	  		<li><a href="<?php echo base_url('empleados/index');?>">EMPLEADOS</a></li>
	  		<?php foreach ($cargar_empleado_detalles as $fila) :?>          
			      	<li><a href="<?php echo base_url('empleados/detalles');?>/<?php echo $fila->id_empleado; ?>"><?php echo $fila->nombre_completo; ?></a></li>
		<?php endforeach; ?>
	  		
	  	</ol>
<div class="panel panel-info">
  	<div class="panel-heading text-center"><h3>
	  	<?php foreach ($cargar_empleado_detalles as $fila) :?>          
			    <H2><STRONG><?php echo $fila->nombre_completo; ?></STRONG></H2>
		<?php endforeach; ?>
	</h3></div>
  	<div class="panel-body">



<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#empl_grals" aria-controls="empl_grals" role="tab" data-toggle="tab">GENERALES</a></li>
    <li role="presentation"><a href="#empl_per_int" aria-controls="empl_per_int" role="tab" data-toggle="tab">PERMISOS INTERNET</a></li>
    <li role="presentation"><a href="#empl_per_carp" aria-controls="empl_per_carp" role="tab" data-toggle="tab">PERMISOS CARPETAS</a></li>
    <li role="presentation"><a href="#res_pcs" aria-controls="res_pcs" role="tab" data-toggle="tab">RESGUARDO PC's</a></li>
  </ul>


  <!-- Tab panes -->
  <div class="tab-content">
  	<br>
    <div role="tabpanel" class="tab-pane active" id="empl_grals">
    	<?php foreach ($cargar_empleado_detalles as $fila) :?>  
				<p>No. Empleado: <b> <?php echo $fila->codigo_empleado; ?> </b> 

				<?php $unidades = array(
						'SECTURE',
						'PLAZA DE LAS 3 CENTURIAS',
						'OFICINA DE ATENCION AL VISITANTE EN PALACIO'
				);?>
			  	<?php foreach ($unidades as $key => $value) {?>
					<?php if ( $key == $fila->unidad ) {?>
						<p>Unidad Administrativa: <b><?php echo $value; ?></b> </p>
					<?php } ?>
				<?php } ?>											    
			    
			    <p>Usuario de Dominio: <b> <?php echo $fila->usuario_de_red; ?> </b>
			    <p>Contraseña: <b> <?php echo $fila->contrasena; ?> </b>
			    <p>No. Extension: <b> <?php echo $fila->num_extension; ?> </b>
			    <p>Email: <b> <?php	echo $fila->correo_electonico; ?> </b>

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
						'SECRETARIO'														
				);?>

				<?php foreach ($areas as $key => $value) {?>
					<?php if ( $key == $fila->area ) {?>
						<p>Area de Adscripcion: <b> <?php echo $value; ?> </b>
					<?php } ?>
				<?php } ?>	

			    <p>Cargo: <b> <?php echo $fila->cargo; ?> </b>	
			<?php endforeach; ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="empl_per_int"><br>

    	<?php if ( empty($cargar_permiso_internet) ) { ?>
	    	<form id="NuevoPermisosInternet" role="form" action="<?php echo base_url('internet/crear');?>" method="post">     
	    	<input type="hidden" name="internet" value="SI">
	    	<input type="hidden" name="messenger" value="SI">
	    	<input type="hidden" name="redes_sociales" value="SI">
	    	<input type="hidden" name="ftp" value="SI">
	    	<input type="hidden" name="sigue" value="SI">
	    	<input type="hidden" name="permiso_usuario_local" value="SI">
	    	<input type="hidden" name="tipo_cuenta_ws" value="ESTANDAR">
			<?php foreach ($cargar_empleado_detalles as $fila) :?>      
			<input type="hidden" name="id_empleado" value="<?php echo $fila->id_empleado; ?>">
			<?php endforeach; ?>
		    <button type="submit" class="btn btn-info">Crear Permisos Internet</button>
			</form><br>					
    	<?php } ?>
    		
    	<table class="table table-bordered">  
					<thead>       
						<tr>      
							 <th>Internet</th>         
							 <th>Messenger</th>          
							 <th>Redes Sociales</th> 
							 <th>FTP</th> 
							 <th>Sigue</th> 
							 <th>Permiso Usuario</th>
							 <th>Tipo de Cuenta Windows</th>
							 <th>Accion</th>
							 </tr>   
					</thead>  

					<tbody> 
						<?php foreach ($cargar_permiso_internet as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
							
							<tr>
							<td> <?php echo $fila->internet; ?></td>
							<td> <?php	echo $fila->messenger; ?></td>
							<td> <?php	echo $fila->redes_sociales; ?></td>
							<td> <?php	echo $fila->ftp; ?></td>
							<td> <?php	echo $fila->sigue; ?></td>
							<td> <?php	echo $fila->permiso_usuario_local; ?></td>
							<td> <?php	echo $fila->tipo_cuenta_ws; ?></td>
							<td><a href="" data-toggle="modal" data-target="#myModal<?php echo $fila->id; ?>">Editar</a></td>

								<!-- Modal -->
								<div id="myModal<?php echo $fila->id; ?>" class="modal fade" role="dialog">
								  <div id="moduloemp" class="modal-dialog">

								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Editar Permiso Internet Empleado</h4>

								       <label for="id_empleado">Empleado:</label>       
										<input type="text" class="form-control" name="id_empleado" value="<?php echo $fila->nombre_completo; ?>" readonly>
								      
								      </div>
								      <div class="modal-body">
								        <form id="NuevoPermisosInternet" role="form" action="<?php echo base_url('internet/actualizar');?>/<?php echo $fila->id; ?>" method="post">     
											<div class="form-group">        
												<input type="hidden" class="form-control" name="id" value="<?php echo $fila->id; ?>">       
												<input type="hidden" class="form-control" name="id_empleado" value="<?php echo $fila->id_empleado; ?>"> 
											<div class="form-group">      
												<label for="internet">Internet</label>              
												<select class="form-control" name="internet"> 
												    <?php if($fila->internet == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select>
											</div> 
											<div class="form-group">  
												<label for="messenger">Messenger</label>        
												<select class="form-control" name="messenger"> 
												    <?php if($fila->messenger == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select>
											</div>
											<div class="form-group"> 
												<label for="redes_sociales">Redes Sociales</label>       
												<select class="form-control" name="redes_sociales"> 
												    <?php if($fila->redes_sociales == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select>
											</div>
											<div class="form-group"> 
												<label for="ftp">FTP</label>       
												<select class="form-control" name="ftp"> 
												    <?php if($fila->ftp == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select>
											</div>
											<div class="form-group"> 
												<label for="sigue">Sigue</label>        
												<select class="form-control" name="sigue"> 
												    <?php if($fila->sigue == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select> 
											</div>
											<div class="form-group"> 
												<label for="permiso_usuario_local">Permiso Usuario</label>       
				      							<select class="form-control" name="permiso_usuario_local"> 
												    <?php if($fila->permiso_usuario_local == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select>
											</div>
											<div class="form-group"> 
												<label for="tipo_cuenta_ws">Tipo de Cuenta Windows</label>       
				      							<select class="form-control" name="tipo_cuenta_ws">
				      								<?php switch ($fila->tipo_cuenta_ws) {
				      									case 'ESTANDAR':?>
				      										<option value="ESTANDAR" selected>ESTANDAR</option>
														 	<option value="AVANZADO">AVANZADO</option>
														 	<option value="ADMINISTRADOR">ADMINISTRADOR</option>
				      									<?php	break;
				      									case 'AVANZADO':?>
				      										<option value="ESTANDAR">ESTANDAR</option>
														 	<option value="AVANZADO" selected>AVANZADO</option>
														 	<option value="ADMINISTRADOR">ADMINISTRADOR</option>
				      									<?php	break;
				      									case 'ADMINISTRADOR':?>
				      										<option value="ESTANDAR">ESTANDAR</option>
														 	<option value="AVANZADO">AVANZADO</option>
														 	<option value="ADMINISTRADOR" selected>ADMINISTRADOR</option>
				      									<?php	break;
				      								} ?>												    
												</select>
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

						<?php endforeach; ?>
					</tbody> 
				</table> 
    </div>
    <div role="tabpanel" class="tab-pane" id="empl_per_carp"><br>

    	<?php if ( empty($cargar_permiso_carpetas) ) { ?>
	    	<form id="NuevoPermisosCarpeta" role="form" action="<?php echo base_url('carpetas/crear');?>" method="post"> 
				<input type="hidden" name="carpetas_geaco06" value="SI">
				<input type="hidden" name="carpeta_imagenes" value="SI">	    
				<input type="hidden" name="capacidad_correo" value="10 MB"> 
				<input type="hidden" name="otros_servicios" value="">
				<?php foreach ($cargar_empleado_detalles as $fila) :?>      
					<input type="hidden" name="id_empleado" value="<?php echo $fila->id_empleado; ?>">
				<?php endforeach; ?>
      			<button type="submit" class="btn btn-info">Crear Permisos Carpetas</button>			
			</form><br>					
    	<?php } ?>


    	<table class="table table-bordered">  
					<thead>       
						<tr>      
							 <th>Carpetas GEACO06</th>         
							 <th>Carpeta Imágenes</th>  
							 <th>Capacidad Correo</th> 
							 <th>Otros Servicios</th>
							 <th>Accion</th> 
					</thead>  
					
					<tbody> 
						<?php foreach ($cargar_permiso_carpetas as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
							
							<tr>
							<td> <?php echo $fila->carpetas_geaco06; ?></td>
							<td> <?php	echo $fila->carpeta_imagenes; ?></td>
							<td> <?php	echo $fila->capacidad_correo; ?></td>
							<td> <?php	echo $fila->otros_servicios; ?></td>
							<td><a href="" data-toggle="modal" data-target="#myModal<?php echo $fila->id; ?>">Editar</a>

								<!-- Modal -->
								<div id="myModal<?php echo $fila->id; ?>" class="modal fade" role="dialog">
								  <div id="moduloemp" class="modal-dialog">

								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Editar Permiso Carpetas Empleado</h4>

								        
											<label for="id_empleado">Empleado:</label>       
											<input type="text" class="form-control" name="id_empleado" value="<?php echo $fila->nombre_completo; ?>" readonly>
										

								      </div>
								      <div class="modal-body">
								       <form id="NuevoPermisosCarpeta" role="form" action="<?php echo base_url('carpetas/actualizar');?>/<?php echo $fila->id; ?>" method="post">     
											<div class="form-group">       
												<input type="hidden" class="form-control" name="id" value="<?php echo $fila->id; ?>">       
												<input type="hidden" class="form-control" name="id_empleado" value="<?php echo $fila->id_empleado; ?>">
											</div>  
											<div class="form-group">    
												<label for="carpetas_geaco06">Carpetas GEACO06</label>              
												<select class="form-control" name="carpetas_geaco06"> 
												    <?php if($fila->carpetas_geaco06 == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select> 
											</div>
											<div class="form-group">
												<label for="carpeta_imagenes">Carpeta Imágenes</label>        
												<select class="form-control" name="carpeta_imagenes"> 
												    <?php if($fila->carpeta_imagenes == 'SI'){  ?>   
												 	<option value="SI" selected>SI</option>
												 	<option value="NO">NO</option>
												 	
												 	<?php } else {?>
												 	<option value="NO">NO</option>      
												 	<option value="SI">SI</option>
												 	<?php }?>
												</select> 
											</div>
											<div class="form-group">
												<label for="capacidad_correo">Capacidad Correo</label>       
												<input type="text" class="form-control" id="capacidad_correo" name="capacidad_correo" value="<?php	echo $fila->capacidad_correo; ?>">
												</select> 
											</div>
											<div class="form-group">
												<label for="otros_servicios">Otros Servicios</label>        
												<input type="text" class="form-control" id="otros_servicios" name="otros_servicios" value="<?php	echo $fila->otros_servicios; ?>">
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
								</td>
							</tr>
							
						<?php endforeach; ?>
					</tbody> 
				</table> 
    </div>
    <div role="tabpanel" class="tab-pane" id="res_pcs"><br>
    	<table class="table table-bordered">  
					<thead>       
						<tr>      
							<th>No. Inventario</th>         
						 <th>Marca</th> 
						 <th>Modelo</th> 
						 <th>HostName</th> 
						 <th>Status</th>
						
						</tr>   
					</thead>    
					<tbody> 
						<?php foreach ($cargar_cpu_empleado as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
							
							<tr>
						<td> <?php echo $fila->num_inventario; ?></td>
						<td> <?php	echo $fila->marca; ?></td>
						<td> <?php	echo $fila->modelo; ?></td>
						<td><a href="<?php echo base_url('bi_cpu/detalles');?>/<?php echo $fila->id_cpu; ?>"><?php	echo $fila->hostname; ?></a> </td>
						<td><?php echo $fila->nombre; ?></td>
						

						</tr>
						<?php endforeach; ?>
					</tbody> 
				</table> 
    </div>
  </div>

</div>


  	</div>
</div>