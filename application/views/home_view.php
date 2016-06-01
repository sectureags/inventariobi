<div class="container">

	    <section id="wizard">
			  <div class="page-header">
	            <h1>Captura Rápida</h1>
	          </div>

				    
				    <div id="rootwizard">
				    	<ul>
				    		<li><a href="#tab1" data-toggle="tab">Computadora</a></li>
				    		<li><a href="#tab2" data-toggle="tab">Monitor</a></li>
				    		<li><a href="#tab3" data-toggle="tab">Teclado</a></li>
				    		<li><a href="#tab4" data-toggle="tab">Mouse</a></li>
				    		<li><a href="#tab5" data-toggle="tab">Teléfono</a></li>
				    		<li><a href="#tab6" data-toggle="tab">Regulador</a></li>
				    		<li><a href="#tab7" data-toggle="tab">Otro</a></li>
				    	</ul>
				    	<div class="tab-content">
				    	    <div class="tab-pane" id="tab1">
				    	    	<hr>
				    	    	<h2>CPU</h2>
				    	    	<hr>
				    			<div>

						         <form id="Nuevocpu" class="" role="form" method="post" action="<?php echo base_url('bi_cpu/crearrapido');?>">
						         	
									<div class="form-group">       
									  	<label for="tipo">Tipo</label>       
										<input type="text" class="form-control" name="tipo" id="tipo" required>
									</div>
									<div class="form-group">
										   	<label for="marca">Marca</label>       
											<input type="text" class="form-control" name="marca" id="marca" required> 
									</div>
									<div class="form-group">
									  		<label for="modelo">Modelo</label>       
											<input type="text" class="form-control" name="modelo" id="modelo" required>
									</div>
									<div class="form-group"> 
											<label for="num_serie">num_serie</label>       
											<input type="text" class="form-control" name="num_serie" id="num_serie" required>
									</div>
									
									<div class="form-group"> 
											<label for="num_inventario">num_inventario</label>       
											<input type="text" class="form-control" name="num_inventario" id="num_inventario" required>
									</div>
								  
					      		  <div class="form-group">      
										<label for="id_empleado">Asignar a Empleado</label> 
										<select class="form-control" name="id_empleado" id="id_empleado">
											<?php foreach ($cargar_empleados as $st) :?>      
											 	<option value="<?php echo $st->id_empleado; ?>">Empleado: <?php echo $st->nombre_completo;?> [<?php echo $st->codigo_empleado;?>]</option>                 
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
				    	    <div class="tab-pane" id="tab2">
				    	    	<hr>
				    	    	<h2>Monitor</h2>
				    	    	<hr>
				    	      <div>

						         <form id="Nuevomonitor" class="" role="form" method="post" action="<?php echo base_url('bi_monitor/crear');?>">
						         	<div class="form-group">       
									  	<label for="categoria">Categoria</label>       
										<input type="text" class="form-control" name="categoria" id="categoria" required>
									</div>
									<div class="form-group">       
									  	<label for="tipo">Tipo</label>       
										<input type="text" class="form-control" name="tipo" id="tipo" required>
									</div>
								  <div class="form-group">
									   	<label for="marca">Marca</label>       
										<input type="text" class="form-control" name="marca" id="marca" required> 
								  </div>
								  <div class="form-group">
								  		<label for="modelo">Modelo</label>       
										<input type="text" class="form-control" name="modelo" id="modelo" required>
								  </div>
								  <div class="form-group"> 
										<label for="num_serie">num_serie</label>       
										<input type="text" class="form-control" name="num_serie" id="num_serie" required>
								  </div>
								  <div class="form-group"> 
										<label for="num_inventario">num_inventario</label>       
										<input type="text" class="form-control" name="num_inventario" id="num_inventario" required>
								  </div>
								  
					      		  <div class="form-group">      
											<label for="id_empleado">Asignar a Empleado</label> 
											<select class="form-control" name="id_empleado" id="id_empleado">
											    <?php foreach ($cargar_empleados as $st) :?>      
											 	<option value="<?php echo $st->id_empleado; ?>">Empleado: <?php echo $st->nombre_completo;?> [<?php echo $st->codigo_empleado;?>]</option>                 
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
				    		<div class="tab-pane" id="tab3">
				    			<hr>
				    			<h2>Teclado</h2>
				    	    	<hr>
				    			<div>

						         <form id="Nuevoteclado" class="" role="form" method="post" action="<?php echo base_url('bi_teclado/crear');?>">
						         	
									<div class="form-group">       
									  	<label for="tipo">Tipo</label>       
										<input type="text" class="form-control" name="tipo" id="tipo" required>
									</div>
								  <div class="form-group">
									   	<label for="marca">Marca</label>       
										<input type="text" class="form-control" name="marca" id="marca" required> 
								  </div>
								  <div class="form-group">
								  		<label for="modelo">Modelo</label>       
										<input type="text" class="form-control" name="modelo" id="modelo" required>
								  </div>
								  <div class="form-group"> 
										<label for="num_serie">num_serie</label>       
										<input type="text" class="form-control" name="num_serie" id="num_serie" required>
								  </div>
								  <div class="form-group"> 
										<label for="num_inventario">num_inventario</label>       
										<input type="text" class="form-control" name="num_inventario" id="num_inventario" required>
								  </div>
								  
					      		  <div class="form-group">      
											<label for="id_empleado">Asignar a Empleado</label> 
											<select class="form-control" name="id_empleado" id="id_empleado">
											    <?php foreach ($cargar_empleados as $st) :?>      
											 	<option value="<?php echo $st->id_empleado; ?>">Empleado: <?php echo $st->nombre_completo;?> [<?php echo $st->codigo_empleado;?>]</option>                 
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
				    	    <div class="tab-pane" id="tab4">
				    	    	<hr>
				    	    	<h2>Mouse</h2>
				    	    	<hr>
				    			<div>

						         <form id="Nuevomouse" class="" role="form" method="post" action="<?php echo base_url('bi_mouse/crear');?>">
						         	
									<div class="form-group">       
									  	<label for="tipo">Tipo</label>       
										<input type="text" class="form-control" name="tipo" id="tipo" required>
									</div>
								  <div class="form-group">
									   	<label for="marca">Marca</label>       
										<input type="text" class="form-control" name="marca" id="marca" required> 
								  </div>
								  <div class="form-group">
								  		<label for="modelo">Modelo</label>       
										<input type="text" class="form-control" name="modelo" id="modelo" required>
								  </div>
								  <div class="form-group"> 
										<label for="num_serie">num_serie</label>       
										<input type="text" class="form-control" name="num_serie" id="num_serie" required>
								  </div>
								  <div class="form-group"> 
										<label for="num_inventario">num_inventario</label>       
										<input type="text" class="form-control" name="num_inventario" id="num_inventario" required>
								  </div>
								  
					      		  <div class="form-group">      
										<label for="id_empleado">Asignar a Empleado</label> 
										<select class="form-control" name="id_empleado" id="id_empleado">
											<?php foreach ($cargar_empleados as $st) :?>      
											 	<option value="<?php echo $st->id_empleado; ?>">Empleado: <?php echo $st->nombre_completo;?> [<?php echo $st->codigo_empleado;?>]</option>                 
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

				    	    <div class="tab-pane" id="tab5">
				    	    	<hr>
				    	    	<h2>Teléfono</h2>
				    	    	<hr>
				    			<div>

						         <form id="Nuevotelefono" class="" role="form" method="post" action="<?php echo base_url('bi_telefono/crear');?>">
						         	
									<div class="form-group">       
									  	<label for="tipo">Tipo</label>       
										<input type="text" class="form-control" name="tipo" id="tipo" required>
									</div>
									<div class="form-group">
										   	<label for="marca">Marca</label>       
											<input type="text" class="form-control" name="marca" id="marca" required> 
									</div>
									<div class="form-group">
									  		<label for="modelo">Modelo</label>       
											<input type="text" class="form-control" name="modelo" id="modelo" required>
									</div>
									<div class="form-group"> 
											<label for="num_serie">num_serie</label>       
											<input type="text" class="form-control" name="num_serie" id="num_serie" required>
									</div>
									<div class="form-group"> 
											<label for="mac_add">mac_add</label>       
											<input type="text" class="form-control" name="mac_add" id="mac_add" required>
									</div>
									<div class="form-group"> 
											<label for="num_inventario">num_inventario</label>       
											<input type="text" class="form-control" name="num_inventario" id="num_inventario" required>
									</div>
								  
					      		  <div class="form-group">      
										<label for="id_empleado">Asignar a Empleado</label> 
										<select class="form-control" name="id_empleado" id="id_empleado">
											<?php foreach ($cargar_empleados as $st) :?>      
											 	<option value="<?php echo $st->id_empleado; ?>">Empleado: <?php echo $st->nombre_completo;?> [<?php echo $st->codigo_empleado;?>]</option>                 
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

				    	    <div class="tab-pane" id="tab6">
				    	    	<hr>
				    	    	<h2>Regulador</h2>
				    	    	<hr>
				    			<div>

						         <form id="Nuevoregulador" class="" role="form" method="post" action="<?php echo base_url('bi_regulador/crear');?>">
						         	
									<div class="form-group">       
									  	<label for="tipo">Tipo</label>       
										<input type="text" class="form-control" name="tipo" id="tipo" required>
									</div>
									<div class="form-group">
										   	<label for="marca">Marca</label>       
											<input type="text" class="form-control" name="marca" id="marca" required> 
									</div>
									<div class="form-group">
									  		<label for="modelo">Modelo</label>       
											<input type="text" class="form-control" name="modelo" id="modelo" required>
									</div>
									<div class="form-group"> 
											<label for="num_serie">num_serie</label>       
											<input type="text" class="form-control" name="num_serie" id="num_serie" required>
									</div>
									
									<div class="form-group"> 
											<label for="num_inventario">num_inventario</label>       
											<input type="text" class="form-control" name="num_inventario" id="num_inventario" required>
									</div>
								  
					      		  <div class="form-group">      
										<label for="id_empleado">Asignar a Empleado</label> 
										<select class="form-control" name="id_empleado" id="id_empleado">
											<?php foreach ($cargar_empleados as $st) :?>      
											 	<option value="<?php echo $st->id_empleado; ?>">Empleado: <?php echo $st->nombre_completo;?> [<?php echo $st->codigo_empleado;?>]</option>                 
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
				    	    
				    	    <div class="tab-pane" id="tab7">
				    	    	<hr>
				    	    	<h2>Otros</h2>
				    	    	<hr>
				    			<div>

						         <form id="Nuevootro" class="" role="form" method="post" action="<?php echo base_url('bi_otro/crear');?>">
						         	
									<div class="form-group">       
									  	<label for="tipo">Tipo</label>       
										<input type="text" class="form-control" name="tipo" id="tipo" required>
									</div>
									<div class="form-group">
										   	<label for="marca">Marca</label>       
											<input type="text" class="form-control" name="marca" id="marca" required> 
									</div>
									<div class="form-group">
									  		<label for="modelo">Modelo</label>       
											<input type="text" class="form-control" name="modelo" id="modelo" required>
									</div>
									<div class="form-group"> 
											<label for="num_serie">num_serie</label>       
											<input type="text" class="form-control" name="num_serie" id="num_serie" required>
									</div>
									
									<div class="form-group"> 
											<label for="num_inventario">num_inventario</label>       
											<input type="text" class="form-control" name="num_inventario" id="num_inventario" required>
									</div>
								  
					      		  <div class="form-group">      
										<label for="id_empleado">Asignar a Empleado</label> 
										<select class="form-control" name="id_empleado" id="id_empleado">
											<?php foreach ($cargar_empleados as $st) :?>      
											 	<option value="<?php echo $st->id_empleado; ?>">Empleado: <?php echo $st->nombre_completo;?> [<?php echo $st->codigo_empleado;?>]</option>                 
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
				    

			</section>

</div>