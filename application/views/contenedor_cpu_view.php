<div class="panel panel-primary">
  <div class="panel-heading text-center"><h1>CPUs</h1></div>
  <div class="panel-body">
	
	      <div class="caption">
	      	<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <!-- Links -->
			      <a class="navbar-brand" data-toggle="modal" href="#myModal">Crear nuevo</a>
			      		<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
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
			        
			        <li class="dropdown">
			          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Foltrar por:
			          <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Marca</a></li>
			            <li><a href="#">Modelo</a></li>
			            <li><a href="#">Status</a></li>
			          </ul>
			        </li>

			        <li class="dropdown">
			          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ordenar por:
			          <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">No. Inventario</a></li>
			            <li><a href="#">Host Name</a></li>
			            <li><a href="#">Empleado</a></li>
			          </ul>
			        </li>
			      </ul>
			      <form class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="No. Inventario">
			        </div>
			        <button type="submit" class="btn btn-default">Buscar</span></button>
			      </form>
			      <ul class="nav navbar-nav navbar-right">
			        <li></li>
			      </ul>
			    </div>
			  </div>
		    </nav>
		  </div>
		 
			<table class="table table-bordered">    
				<thead>       
					<tr>      
						 <th>No. Inventario</th>         
						 <th>Marca</th> 
						 <th>Modelo</th> 
						 <th>HostName</th> 
						 <th>Nombre Empleado</th>
						 <th>Status</th>
						 <th>Operaciones</th> 

					</tr>   
				</thead>    
				<tbody> 
					<?php foreach ($cargar_cpu as $fila) :?> <!--//es tipo un contador que entra a un arreglo y me trae todos los registros hasta que terminen-->
						<tr>
						<td> <?php echo $fila->num_inventario; ?></td>
						<td> <?php	echo $fila->marca; ?></td>
						<td> <?php	echo $fila->modelo; ?></td>
						<td> <?php	echo $fila->hostname; ?></td>
						<td><a href="<?php echo base_url('empleados/detalles');?>/<?php echo $fila->id_empleado; ?>"><?php echo $fila->nombre_completo; ?></a></td>
						<td><?php echo $fila->nombre; ?></td>
						<td><div class="btn-group">
							  <button type="button" class="btn btn-primary">Acciones</button>
							  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
							    <li><a href="#">Ver detalle</a></li>
							    <li><a href="#">Reasignación</a></li>
							    <li><a href="#">Editar</a></li>
							    <li><a href="#">Dar de Baja</a></li>
							  </ul>
							</div>
						</td>
						</tr>
					<?php endforeach; ?>
				</tbody> 
			</table>  


  </div>
  </div>
</div>
