<div class="col-md-3 well">
	<ul class="nav nav-tab">
		<?php foreach ($cargar_empleado_detalles as $fila) :?>
			<li><a href="<?php echo base_url('internet/existe_permiso');?>/<?php echo $fila->id_empleado; ?>">Internet</a></li>
			<li><a href="<?php echo base_url('carpetas/existe_permiso');?>/<?php echo $fila->id_empleado; ?>">Carpetas</a></li>
			<li><a href="<?php echo base_url('bi_cpu/cpu_empleado');?>/<?php echo $fila->id_empleado; ?>">CPU's</a></li>
		<?php endforeach; ?>
	</ul>
</div>



	


