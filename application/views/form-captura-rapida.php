<div class="form-group">       
	<label for="ubicacion">ubicacion</label>       
	<input type="text" class="form-control" name="ubicacion" id="ubicacion" required>
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