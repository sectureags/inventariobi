<ol class="breadcrumb">
	  		<li><a href="<?php echo base_url('bi_cpu/index');?>">CPU'S</a></li>
	  		<?php foreach ($cargar_cpu_detalles as $fila) :?>          
			      	<li><a href="<?php echo base_url('bi_cpu/detalles');?>/<?php echo $fila->id_cpu; ?>"><?php echo $fila->hostname; ?></a></li>
		<?php endforeach; ?>
	  		
	  	</ol>
<div class="panel panel-primary">
  	<div class="panel-heading text-center"><h3>
	  	<?php foreach ($cargar_cpu_detalles as $fila) :?>          

			      	<H2><STRONG><?php echo $fila->hostname; ?></STRONG></H2>

		<?php endforeach; ?>
	</h3></div>
  	<div class="panel-body">
  		


  		
			   		 <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">GENERALES</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">LICENCIAS</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">COMPONENTES INTERNOS</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">WINAUDIT</a></li>
    <li role="presentation"><a href="#ipconfig" aria-controls="ipconfig" role="tab" data-toggle="tab">IPCONFIG</a></li>
    <li role="presentation"><a href="#historial" aria-controls="historial" role="tab" data-toggle="tab">HISTORIAL DE MOVIMIENTOS</a></li>
  </ul>


  <!-- Tab panes -->
  <div class="tab-content">
  	<br>
    <div role="tabpanel" class="tab-pane active" id="home">
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
    <div role="tabpanel" class="tab-pane" id="profile">LICENCIAS</div>
    <div role="tabpanel" class="tab-pane" id="messages">COMPONENTES INTERNOS</div>
    <div role="tabpanel" class="tab-pane" id="settings">WINAUDIT</div>
    <div role="tabpanel" class="tab-pane" id="ipconfig">IPCONFIG</div>
    <div role="tabpanel" class="tab-pane" id="historial">HISTORIAL DE MOVIMIENTOS</div>
  </div>

</div>



  	</div>
</div>