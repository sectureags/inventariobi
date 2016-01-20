  <script src="<?php echo base_url(); ?>/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>/js/bootstrap-dropdown.js"></script>
	<script src="<?php echo base_url(); ?>/js/bootstrap-modal.js"></script>
	<script src="<?php echo base_url(); ?>/js/bootstrapValidator.min.js"></script>
	<script src="<?php echo base_url(); ?>/js/validator.js"></script>

  <script src="<?php echo base_url(); ?>/js/jquery.bootstrap.wizard.js"></script>
  <script src="<?php echo base_url(); ?>/js/prettify.js"></script>


<script type="text/javascript">

    $(document).ready(function() {
      
        var $validator = $("#commentForm").validate({
          rules: {
            emailfield: {
              required: true,
              email: true,
              minlength: 3
            },
            namefield: {
              required: true,
              minlength: 3
            },
            urlfield: {
              required: true,
              minlength: 3,
              url: true
            }
          }
        });
     
          $('#rootwizard').bootstrapWizard({
            'tabClass': 'nav nav-pills',
            'onNext': function(tab, navigation, index) {
              var $valid = $("#commentForm").valid();
              if(!$valid) {
                $validator.focusInvalid();
                return false;
              }
            }
          }); 
    });
</script>


	<script type="text/javascript" >
var myRequest = getXMLHTTPRequest();

    $(document).ready(function() {
        $('#rootwizard').bootstrapWizard();
    });

function getXMLHTTPRequest()
{

  var request = false;
  if(window.XMLHttpRequest)
  {
      request = new XMLHttpRequest();
    } else {
      if(window.ActiveXObject)
      {
        try
        {
          request = new ActiveXObject("Msml2.XMLHTTP");
        }
        catch(err1)
        {
          try
          {
            request = new ActiveXObject("Microsoft.XMLHTTP");
          }
          catch(err2)
          {
            request = false;
          }
       }
      }
  }
  return request;
}

function ejecutarAJAX() {
// Declaramos una variable para guardar la informacion
// a pasar al servidro

var codigo_empleado=document.getElementById("ModalEmpleadoNuevo").elements.namedItem("codigo_empleado").value;
//Construimos la url que vamos a llamar
var url = "<?php echo base_url('empleados/validar_codigo_empleado');?>/" + codigo_empleado;
// Abrimos la conexion de tipo GET
myRequest.open("GET", url, true);
// Cuando la respuesta llegue se llamara
// el metodo respuestaAJAX
myRequest.onreadystatechange = respuestaAJAX;
// y finalmente enviamos la peticion
myRequest.send(null);
}

function respuestaAJAX() {
    // Solo entra cuando se completa la peticion
    if(myRequest.readyState == 4) {
          // Si la respuesta HTTP es OK
           if(myRequest.status == 200) {
             document.getElementById('respuesta').innerHTML= myRequest.responseText;
        } else {
            // Manejamos el error con el statusText
            document.getElementById('respuesta').innerHTML= myRequest.status;
        }
    }else{
      document.getElementById('respuesta').innerHTML=myRequest.status;
    }
   
}


function ejecutar2AJAX() {
// Declaramos una variable para guardar la informacion
// a pasar al servidro

var num_inventario=document.forms['ModalCPUNuevo'].num_inventario.value;
//var rand=parseInt(Math.random()*99999999)+
          //new Date().getTime();
//Construimos la url que vamos a llamar
var url = "<?php echo base_url('bi_cpu/validar_num_inventario');?>/" + num_inventario;
// Abrimos la conexion de tipo GET
myRequest.open("GET", url, true);
// Cuando la respuesta llegue se llamara
// el metodo respuestaAJAX
myRequest.onreadystatechange = respuesta2AJAX;
// y finalmente enviamos la peticion
myRequest.send(null);
}

function respuesta2AJAX() {
    // Solo entra cuando se completa la peticion
    if(myRequest.readyState == 4) {
          // Si la respuesta HTTP es OK
           if(myRequest.status == 200) {
             document.getElementById('respuesta').innerHTML= myRequest.responseText;
        } else {
            // Manejamos el error con el statusText
            document.getElementById('respuesta').innerHTML= myRequest.status;
        }
    }else{
      document.getElementById('respuesta').innerHTML="<img src='' />";
    }
   
}


function ejecutarWINAUDIT() {
// Declaramos una variable para guardar la informacion
// a pasar al servidro

//var codigo_empleado=document.forms['ModalEmpleadoNuevo'].codigo_empleado.value;
//var rand=parseInt(Math.random()*99999999)+ new Date().getTime();
//Construimos la url que vamos a llamar
var url = "<?php echo base_url();?>/license.txt";
// Abrimos la conexion de tipo GET
myRequest.open("GET", url, true);
// Cuando la respuesta llegue se llamara
// el metodo respuestaAJAX
myRequest.onreadystatechange = respuestaWINAUDIT;
// y finalmente enviamos la peticion
myRequest.send(null);
}

function respuestaWINAUDIT() {
    // Solo entra cuando se completa la peticion
    if(myRequest.readyState == 4) {
          // Si la respuesta HTTP es OK
           if(myRequest.status == 200) {
             document.getElementById('winaudit').innerHTML= myRequest.responseText;
        } else {
            // Manejamos el error con el statusText
            document.getElementById('winaudit').innerHTML= myRequest.status;
        }
    }else{
      document.getElementById('winaudit').innerHTML=myRequest.status;
    }
   
}

// ********************************  PETICION DE DISCOS DUROS ******************************** //
// Se recibe el id_cpu para poder hacer la peticion a la BD con la URL y poder enviar la respuesta al usuario //
function ejecutarDD(cpu) {
//Construimos la url que vamos a llamar
var url = "<?php echo base_url('bi_cpu/dd_cpu');?>/" + cpu;
// Abrimos la conexion de tipo GET
myRequest.open("GET", url, true);
// Cuando la respuesta llegue se llamara
// el metodo respuestaDD
myRequest.onreadystatechange = respuestaDD;
// y finalmente enviamos la peticion
myRequest.send(null);
}

function respuestaDD() {
    // Solo entra cuando se completa la peticion
    if(myRequest.readyState == 4) {
          // Si la respuesta HTTP es OK
           if(myRequest.status == 200) {
             document.getElementById('resp_comp_int').innerHTML= myRequest.responseText;
        } else {
            // Manejamos el error con el statusText
            document.getElementById('resp_comp_int').innerHTML= myRequest.responseText;
        }
    }else{
      document.getElementById('resp_comp_int').innerHTML=myRequest.responseText;
    }
}

// ********************************  PETICION DE MEMORIAS RAM ******************************** //
// Se recibe el id_cpu para poder hacer la peticion a la BD con la URL y poder enviar la respuesta al usuario //
function ejecutarRAM(cpu) {
//Construimos la url que vamos a llamar
var url = "<?php echo base_url('bi_cpu/ram_cpu');?>/" + cpu;
// Abrimos la conexion de tipo GET
myRequest.open("GET", url, true);
// Cuando la respuesta llegue se llamara
// el metodo respuestaRAM
myRequest.onreadystatechange = respuestaRAM;
// y finalmente enviamos la peticion
myRequest.send(null);
}
function respuestaRAM() {
    // Solo entra cuando se completa la peticion
    if(myRequest.readyState == 4) {
          // Si la respuesta HTTP es OK
           if(myRequest.status == 200) {
             document.getElementById('resp_comp_int').innerHTML= myRequest.responseText;
        } else {
            // Manejamos el error con el statusText
            document.getElementById('resp_comp_int').innerHTML= myRequest.responseText;
        }
    }else{
      document.getElementById('resp_comp_int').innerHTML=myRequest.responseText;
    }
}

// ********************************  PETICION DE IPCONFIG ******************************** //
// Se recibe el id_cpu para poder hacer la peticion a la BD con la URL y poder enviar la respuesta al usuario //
function ejecutarIPCONFIG(cpu) {
//Construimos la url que vamos a llamar
var url = "<?php echo base_url('bi_cpu/ipconfig_cpu');?>/" + cpu;
// Abrimos la conexion de tipo GET
myRequest.open("GET", url, true);
// Cuando la respuesta llegue se llamara
// el metodo respuestaIPCONFIG
myRequest.onreadystatechange = respuestaIPCONFIG;
// y finalmente enviamos la peticion
myRequest.send(null);
}
function respuestaIPCONFIG() {
    // Solo entra cuando se completa la peticion
    if(myRequest.readyState == 4) {
          // Si la respuesta HTTP es OK
           if(myRequest.status == 200) {
             document.getElementById('resp_comp_int').innerHTML= myRequest.responseText;
        } else {
            // Manejamos el error con el statusText
            document.getElementById('resp_comp_int').innerHTML= myRequest.responseText;
        }
    }else{
      document.getElementById('resp_comp_int').innerHTML=myRequest.responseText;
    }
}

// ********************************  PETICION DE PROCESADOR ******************************** //
// Se recibe el id_cpu para poder hacer la peticion a la BD con la URL y poder enviar la respuesta al usuario //
function ejecutarPROCESADOR(cpu) {
//Construimos la url que vamos a llamar
var url = "<?php echo base_url('bi_cpu/procesador_cpu');?>/" + cpu;
// Abrimos la conexion de tipo GET
myRequest.open("GET", url, true);
// Cuando la respuesta llegue se llamara
// el metodo respuestaIPCONFIG
myRequest.onreadystatechange = respuestaPROCESADOR;
// y finalmente enviamos la peticion
myRequest.send(null);
}
function respuestaPROCESADOR() {
    // Solo entra cuando se completa la peticion
    if(myRequest.readyState == 4) {
          // Si la respuesta HTTP es OK
           if(myRequest.status == 200) {
             document.getElementById('resp_comp_int').innerHTML= myRequest.responseText;
        } else {
            // Manejamos el error con el statusText
            document.getElementById('resp_comp_int').innerHTML= myRequest.responseText;
        }
    }else{
      document.getElementById('resp_comp_int').innerHTML=myRequest.responseText;
    }
}



</script>
	
</div>
</div>
</body><!--Fin de contenido de la pagina principal-->
</html>
