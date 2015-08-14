<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Inventario de Bienes Informáticos SECTUR Aguascalientes</title>
	<!--<link rel="stylesheet" href="http://localhost:8080/inventariobi/css/bootstrap.css">-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/estilo.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
</head>

<style type="text/css">
	#nombre_completo { text-transform: uppercase; }
	#cargo { text-transform: uppercase; }
	#correo_electonico { text-transform: lowercase }
</style>

<script type="text/javascript" >
var myRequest = getXMLHTTPRequest();
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

var codigo_empleado=document.forms['ModalEmpleadoNuevo'].codigo_empleado.value;
var rand=parseInt(Math.random()*99999999)+
          new Date().getTime();
//Construimos la url que vamos a llamar
var url = "http://localhost/inventariobi/empleados/validar_codigo_empleado/" + codigo_empleado;
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
      document.getElementById('respuesta').innerHTML="<img src='' />";
    }
   
}

</script>

<body><!--Contenido de la pagina principal-->
	<div class="container">
