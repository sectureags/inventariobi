<div class="col-md-9 well">
		 <!-- Inicio del container --> 

			<div class="row" id="tabla_cpu">
				<table class="table table-bordered">  
					<thead>       
						<tr>      
							 <th>No. Inventario</th>         
							 <th>Marca</th> 
							 <th>Modelo</th> 
							 <th>HostName</th>
							 <th>Status</th>
							 <th>Operaciones</th>
						</tr>   
					</thead>    
					<tbody> 
						<?php foreach ($cargar_cpu_empleado as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
							
							<tr>
								<td> <?php echo $fila->num_inventario; ?></td>
								<td> <?php	echo $fila->marca; ?></td>
								<td> <?php	echo $fila->modelo; ?></td>
								<td> <?php	echo $fila->hostname; ?></td>
								<td><?php echo $fila->nombre; ?></td>
								<td>
									<div class="btn-group">
									  <button type="button" class="btn btn-primary">Acciones</button>
									  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									    <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu" role="menu">
									    <li><a href="#">Ver detalle</a></li>
									    <li><a href="#">Reasignación</a></li>
									    <li><a href="#">WinAudit</a></li>
									  </ul>
									</div>
							</td>
					</tr>
						<?php endforeach; ?>
					</tbody> 
				</table>  
			</div>
		
</div>