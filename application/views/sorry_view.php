 <div class="container">
  <div class="row well">
    <div class="col-sm-2">
      User: <?php echo $username; ?><br>
    Rol: (
      <?php
        foreach ($cargar_roles as $tipo) :
          if ($rol == $tipo->id_tipo ) {
            echo "<strong>";
            echo $tipo->descripcion;        
            echo "</strong>";
          }
        endforeach; ?> 
      )  
    </div>
    <div class="col-sm-4">
      <img src="<?php echo base_url('img/forbidden-512.png');?>" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
    </div>
    <div class="col-sm-4">
      <h1>Uups!!!</h1>
      <h3>Parece que su usuario no tiene permisos para accesar a esta zona!</h3>
      <h4>Solicite apoyo técnico con el Administrador del Sistema a la Ext. 4336</h4>
    </div>
    <div class="col-sm-2"></div>
  </div>

</div>

