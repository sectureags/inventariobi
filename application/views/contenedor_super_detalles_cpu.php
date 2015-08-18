<div class="panel panel-primary">
  	<div class="panel-heading text-center"><h3>
	  	<?php foreach ($cargar_cpu_detalles as $fila) :?>          
			      	<p>CPU - No. Inventario: <b> <?php echo $fila->num_inventario; ?> </b></p>	
		<?php endforeach; ?>
	</h3></div>
  	<div class="panel-body">


  		<div class="caption">
	    	<nav class="navbar navbar-default navbar-static-top">
			  	<div class="container-fluid">
			   		 <div class="navbar-header">
				      	<!-- Links -->
				      	<ul class="nav nav-tab">
							<?php foreach ($cargar_cpu_detalles as $fila) :?>
								<a class="navbar-brand" href="<?php echo base_url('bi_cpu/detalles');?>/<?php echo $fila->id_cpu; ?>">Detalles</a>
								<a class="navbar-brand" href="#">Opcion 1</a>
								<a class="navbar-brand" href="#">Opcion 2</a>
							<?php endforeach; ?>
						</ul>
					</div>
			  	</div>
		    </nav>
		</div>


		<div class="panel-heading text-center">
			<?php foreach ($cargar_cpu_detalles as $fila) :?>  
				<p>No. Inventario: <b> <?php echo $fila->num_inventario; ?> </b> 
			    <p>Marca: <b> <?php echo $fila->marca; ?> </b>	
			    <p>Modelo: <b> <?php echo $fila->modelo; ?> </b>	
			   	<p>Host Name: <b> <?php echo $fila->hostname; ?> </b>	
			   	<p>No. Serie: <b> <?php echo $fila->num_serie; ?> </b>
			   	<p>Tipo: <b> <?php echo $fila->tipo; ?> </b>
			   	<p>Ubicacion: <b> <?php echo $fila->ubicacion; ?> </b>	
			   	<p>Categoria: <b> <?php echo $fila->categoria; ?> </b>		
			<?php endforeach; ?>
		</div>

  	</div>
</div>