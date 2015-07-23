<div id="container">
	<div class="row well">        
		User: <?php echo $username; ?><br>
		Rol: (
			<?php
				foreach ($cargar_roles as $tipo) :
					if ($rol == $tipo->id_tipo ) {
						echo "<strong>";
						echo $tipo->descripcion;				
						echo "</strong>";
					}
		 		endforeach; ?> 
			)
	</div>
	<div class="row">
	  <ul class="nav navbar-nav navbar-left">
        <li>
        <?php $attributes = array('class' => 'navbar-form navbar-left', 'role' => 'menu');
            echo form_open(base_url('permisos/create'), $attributes); ?>   
            <div class="form-group">
              <label for="name">Rol</label>       
			  	<select class="form-control" name="rol" id="rol" placeholder="Rol">
				  	<option>Seleccione un Rol</option>
					<?php foreach ($cargar_roles as $rol) :?>      
					 	<option value="<?php echo $rol->id_tipo; ?>"><?php echo $rol->descripcion;?></option>                 
				 	<?php endforeach; ?>       
			 	</select>

            </div>
            <div class="form-group">
              <?php 
                echo form_label('Componente: ',  'componente' ) ; 
                echo form_input('componente', '', 'id="componente" class="form-control" placeholder="Componente"');
            ?>
            </div>
            <div class="form-group">
              <?php 
                echo form_label('Recurso: ',  'recurso' ) ; 
                echo form_input('recurso', '', 'id="recurso" class="form-control" placeholder="Recurso"');
              ?>
            </div>
            <?php echo form_submit('submit',  'Agregar Nuevo', 'class="btn btn-primary"' ); ?>
          <?php echo form_close(); ?>
        </li>            
      </ul>
	</div>
		
	<div class="row">	
	<table class="table table-bordered">
		<tr>		
		<th class="text-center">Rol</th>
		<th class="text-center">Componente</th>
		<th class="text-center">Recurso</th>
		<th class="text-center">Permiso</th>
		<th class="text-center">Accion</th>
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
			  	  	echo "$value->permiso";		  	  	
			  		echo "</td>";
			  		echo "<td class='text-center'>";
			  		if ($value->permiso != TRUE) { ?>
			  			<a href="<?php echo base_url('permisos/activar/'.$value->id) ;?>">Activar</a>
			  		<?php } else { ?>				  		
			  			<a href="<?php echo base_url('permisos/desactivar/'.$value->id) ;?>">Desactivar</a>
			  		<?php }	
			  		echo "</td>";
			  		echo "</tr>";
				}
			}else{ ?>
		
		
		
			<?php } ?>
		
	</table>
	</div>
</div>