<div class="panel panel-danger">
  <div class="panel-heading text-center"><h1>PERMISOS DE ROLES</h1></div>
  <div class="panel-body">
	
	      <div class="caption">
	      	<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <!-- Links -->
			      <a class="navbar-brand" data-toggle="modal" href="#myModalPermisosRol">Crear nuevo</a>
			      		<!-- Modal -->
						<div id="myModalPermisosRol" class="modal fade" role="dialog">
						  <div id="modulobi" class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Encabezado</h4>
						      </div>
						      <div class="modal-body">
						        <p>Aquí el cuerpo del Modal</p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						      </div>
						    </div>

						  </div>
						</div>
						<!-- Modal -->
			    </div>
			    <div>
			      <ul class="nav navbar-nav">
			      	<li>
			        	<form class="navbar-form navbar-right" role="form" method="post" action="<?php echo base_url('permisos/index');?>">
						<div class="form-group">       
						  	<label for="id_tipo">Filtrar por Rol</label> 
							<select class="form-control" name="id_tipo" id="id_tipo" onchange="this.form.submit()"><!--Cuando detectes un cambio en tus selects traeme los datos de la seleccion-->
							<option>Roles</option>
						    <?php foreach ($cargar_roles as $rol) :?>      
						 	<option value="<?php echo $rol->id_tipo; ?>"><?php echo $rol->descripcion;?></option>                 
						 	<?php endforeach; ?>       
							</select>
						</div>
						</form>
			        </li>
			        <li></li>			        
			      </ul>			      
			      <ul class="nav navbar-nav navbar-right">
			        <li></li>
			      </ul>
			    </div>
			  </div>
		    </nav>
		  </div>
		 
			<table class="table table-bordered table-hover table-condensed">
				<tr>		
				<th class="text-center">Rol</th>
				<th class="text-center">Componente</th>
				<th class="text-center">Recurso</th>
				<th class="text-center">Permiso</th>
				
				</tr>
				<?php
					if ( (is_array($get_all) == TRUE ) ) {
						
						foreach ($get_all as $value) {
					  		echo "<tr>";		  	  	
				
					  		echo "<td>";
				  	  		foreach ($cargar_roles as $rol) :
				  	  			if ($value->rol == $rol->id_tipo) {
				  	  				echo "$rol->descripcion";
				  	  			}						 		
					 		endforeach;			  	  	
					  		echo "</td>";
					  		echo "<td>";
					  	  	echo "$value->componente";		  	  	
					  		echo "</td>";
					  		echo "<td>";
					  	  	echo "$value->recurso";		  	  	
					  		echo "</td>";
					  		
					  		echo "<td class='text-center'>";
					  		if ($value->permiso != TRUE) { ?>
					  			<a href="<?php echo base_url('permisos/activar/'.$value->id) ;?>"><input type="checkbox"></a>
					  			
					  		<?php } else { ?>				  		
					  			<a href="<?php echo base_url('permisos/desactivar/'.$value->id) ;?>"><input type="checkbox" checked></a>
					  			
					  		<?php }	
					  		echo "</td>";
					  		echo "</tr>";
						}
					}else{ ?>
				
				
				
					<?php } ?>
				
			</table> 


  </div>
  </div>
