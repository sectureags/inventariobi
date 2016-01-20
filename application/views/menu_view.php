
  
<div id="menu1"> <!--Menu principa de navegación-->
	<ol class="breadcrumb text-center">	  
	  	<li>
	  		Bienvenido! <strong><?php echo $username;?></strong>
	  	</li>
		<li>
			<a href="<?php echo base_url('entrar');?>">Salir</a>
		</li>
	</ol>
			<ul id="menu1_1">
				<li class="contenedor" id="">
					<a href="<?php echo base_url('inicio');?>"><img class="icon" src="<?php echo base_url(); ?>img/icon/icon1.png"></a>
					<p class="texto">Captura Rápida</p>
				</li>
				<li class="contenedor" id="seguridad">
					<a href="<?php echo base_url('seguridad');?>"><img class="icon" src="<?php echo base_url(); ?>img/icon/icon1.png"></a>
					<p class="texto">Seguridad</p>
				</li>
				<li class="contenedor" id="inventario"><!--LI-->
					<a href="<?php echo base_url('bienes_informaticos');?>"><img class="icon" src="<?php echo base_url(); ?>img/icon/icon1.png"></a>
					<p class="texto">Bienes Informaticos</p>
				</li>
				<li class="contenedor" id="reportes"><!--LI-->
					<a href="<?php echo base_url('reportes');?>"><img class="icon" src="<?php echo base_url(); ?>img/icon/icon1.png"></a>
					<p class="texto">Reportes</p>
				</li>
				<li class="contenedor" id="empleados"><!--LI-->
					<a href="<?php echo base_url('empleados');?>"><img class="icon" src="<?php echo base_url(); ?>img/icon/icon1.png"></a>
					<p class="texto">Empleados</p>
				</li>

			</ul>
</div>
