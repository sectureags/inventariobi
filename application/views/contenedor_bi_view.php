<div class="container" >
<div class="row">
	<?php $modulos = array(
		'cpus', 
		'discos_duros',
		'memorias_ram',
		'monitores',
		'ipconfigs',
		'procesadores',
		'sistemas_operativos',
		'programas',
		'teclados',
		'mouses',
		'telefonos',
		'reguladores',
		'otros'); 

	foreach ($modulos as $modulo) { ?>
		<div class="col-md-3" >
			<div id="modulobi">
				<div class="panel panel-primary text-center">
				  <div class="panel-heading"><h3><?php echo $modulo;?></h3></div>
				  <div class="panel-body"><small></small></div>
				  <div class="caption">
			        <p><a href="<?php echo base_url($modulo);?>" class="btn btn-default btn-lg" role="button">Entrar</a></p>
			      </div>
				</div>	      
			</div>
		</div>		
	<?php } ?>

</div>
</div>