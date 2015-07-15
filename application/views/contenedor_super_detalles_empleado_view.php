<div class="col-md-9">
		
	<div class="panel panel-default"> 
		<?php foreach ($cargar_permiso_internet as $fila) :?>   
			<div class="panel-heading">    
				<div class="panel-body">        
		      		 <p>Empleado:  <?php echo $fila->nombre_completo; ?></p> 
		      		 
		      		 <p>Usuario de dominio:  <?php echo $fila->usuario_de_red; ?></p> 
					 
					 <p>No. Extensión:  <?php echo $fila->num_extension; ?></p>  
				</div>
			</div> 
		<?php endforeach; ?> 
	</div>  
		
</div>
