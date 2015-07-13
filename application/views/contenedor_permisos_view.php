<div id="container">
<div class="row well">        
	User: <?php echo $username; ?><br>
	Rol: (<?php echo $rol; ?>)
	  </div>
		<div>
		  <ul class="nav navbar-nav navbar-left">
            <li>
            <?php $attributes = array('class' => 'navbar-form navbar-left', 'role' => 'menu');
                echo form_open(base_url('permisos/create'), $attributes); ?>   
                <div class="form-group">
                  <?php 
                    echo form_label('Rol: ',  'rol' ) ; 
                    echo form_input('rol', '', 'id="rol" class="form-control" placeholder="Rol"');
                  ?>
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
                <?php echo form_submit('submit',  'Agregar Nuevo', 'class="btn btn-default"' ); ?>
              <?php echo form_close(); ?>
            </li>            
          </ul>
		</div>
	
		<table class="table table-condensed">
			<tr>
			<th>ID</th>
			<th>Rol</th>
			<th>Componente</th>
			<th>Recurso</th>
			<th>Permiso</th>
			<th>Accion</th>
			</tr>
			<?php
			  foreach ($get_all as $value) {
			  	# code...
			  		echo "<tr>";		  	  	
				  	  	echo "<td>";
				  	  	echo "$value->id";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->rol";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->componente";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->recurso";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->permiso";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  		if ($value->permiso != TRUE) {
				  			echo "<input type='checkbox' id='permiso'>"; # code...
				  			echo "<a href='si_permiso/$value->id'>Permitir</a>";
				  		} else { 
  				  			echo "<input type='checkbox' id='permiso' checked='checked'>";
				  			echo "<a href='no_permiso/$value->id'>Quitar</a>";
				  		}				  	  			  	  	
				  		echo "</td>";
				  		echo "<td class='danger'>";
				  	  	echo "<a href='../permisos/delete/$value->id'>delete</a>";		  	  	
				  		echo "</td>";
			  		echo "</tr>";
			  }
			?>
			
		</table>
	</div>