<div id="container">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    	<a class="navbar-brand" href="<?php echo base_url('permisos/index');?>">Módulo Permisos</a>
	    	<h5 class="text-center">Bienvenido: <small>(<?php echo $username; ?>)</small></h5>
	    </div>
	    <div>
	      <ul class="nav navbar-nav navbar-left">
	        
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
	      
	      </ul>
	    </div>
	  </div>
	</nav>
	
	<div class="">	
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
			  		echo "<tr class='warning'>";		  	  	
		
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