<div class="col-md-9">
		
	<div class="panel panel-default"> 
		<?php foreach ($cargar_permiso_internet as $fila) :?>   
			<div class="panel-heading">       Empleado:  <?php echo $fila->nombre_completo; ?> </div>    
			<div class="panel-body">       
					    
				<div class="form-group">       
					<label for="codigo_empleado">Internet</label>       
					<input type="text" class="form-control" name="internet" value="<?php echo $fila->internet; ?>" readonly>       
					<label for="nombre_completo">Messenger</label>       
					<input type="text" class="form-control" name="messenger" value="<?php echo $fila->messenger; ?>" readonly> 
					<label for="unidad">Redes Sociales</label>       
					<input type="text" class="form-control" name="redes_sociales" value="<?php echo $fila->redes_sociales; ?>" readonly> 
					<label for="usuario_de_red">FTP</label>       
					<input type="text" class="form-control" name="ftp" value="<?php echo $fila->ftp; ?>" readonly> 
					<label for="contrasena">Sigue</label>       
					<input type="text" class="form-control" name="sigue" value="<?php echo $fila->sigue; ?>" readonly>
					<label for="num_extension">Permiso de Usuario Local</label>       
					<input type="text" class="form-control" name="permiso_usuario_local" value="<?php echo $fila->permiso_usuario_local; ?>" readonly>
      			</div>   
      				  
			</div>
		<?php endforeach; ?> 
	</div>  
		
</div>
