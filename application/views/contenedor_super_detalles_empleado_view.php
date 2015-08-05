<div class="panel panel-info">
  	<div class="panel-heading text-center"><h3>
	  	<?php foreach ($cargar_empleado_detalles as $fila) :?>          
			      	<p>Empleado: <b> <?php echo $fila->nombre_completo; ?> </b></p>	
		<?php endforeach; ?>
	</h3></div>
  	<div class="panel-body">


  		<div class="caption">
	    	<nav class="navbar navbar-default">
			  	<div class="container-fluid">
			   		 <div class="navbar-header">
				      	<!-- Links -->
				      	<ul class="nav nav-tab">
							<?php foreach ($cargar_empleado_detalles as $fila) :?>
								<a class="navbar-brand" href="<?php echo base_url('empleados/detalles');?>/<?php echo $fila->id_empleado; ?>">Detalles</a>
								<a class="navbar-brand" href="<?php echo base_url('internet/existe_permiso');?>/<?php echo $fila->id_empleado; ?>">Internet</a>
								<a class="navbar-brand" href="<?php echo base_url('carpetas/existe_permiso');?>/<?php echo $fila->id_empleado; ?>">Carpetas</a>
								<a class="navbar-brand" href="<?php echo base_url('bi_cpu/cpu_empleado');?>/<?php echo $fila->id_empleado; ?>">CPU's</a>
							<?php endforeach; ?>
						</ul>
					</div>
			  	</div>
		    </nav>
		</div>


		<div class="panel-heading text-center">
			<?php foreach ($cargar_empleado_detalles as $fila) :?>  
				<p>No. Empleado: <b> <?php echo $fila->codigo_empleado; ?> </b> 
			    <p>Unidad: <b><?php echo $fila->unidad; ?></b> </p>
			    <p>Usuario de Dominio: <b> <?php echo $fila->usuario_de_red; ?> </b>
			    <p>Contraseña: <b> <?php echo $fila->contrasena; ?> </b>
			    <p>No. Extension: <b> <?php echo $fila->num_extension; ?> </b>
			    <p>Email: <b> <?php	echo $fila->correo_electonico; ?> </b>
			    <p>Area: <b> <?php echo $fila->area; ?> </b>
			    <p>Cargo: <b> <?php echo $fila->cargo; ?> </b>	
			<?php endforeach; ?>
		</div>

  	</div>
</div>