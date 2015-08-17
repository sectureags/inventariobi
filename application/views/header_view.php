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
  #username {text-transform: lowercase }
  #email {text-transform: lowercase }
  #otros_servicios {text-transform: uppercase }
  #categoria {text-transform: uppercase }
  #marca {text-transform: uppercase }
  #modelo {text-transform: uppercase }
  #hostname {text-transform: uppercase }
  #num_serie {text-transform: uppercase }
  #ubicacion {text-transform: uppercase }
  #componente {text-transform: lowercase }
  #recurso {text-transform: lowercase }
  #tipo {text-transform: uppercase }
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


function ejecutar2AJAX() {
// Declaramos una variable para guardar la informacion
// a pasar al servidro

var num_inventario=document.forms['ModalCPUNuevo'].num_inventario.value;
//var rand=parseInt(Math.random()*99999999)+
          //new Date().getTime();
//Construimos la url que vamos a llamar
var url = "http://localhost/inventariobi/bi_cpu/validar_num_inventario/" + num_inventario;
// Abrimos la conexion de tipo GET
myRequest2.open("GET", url, true);
// Cuando la respuesta llegue se llamara
// el metodo respuestaAJAX
myRequest2.onreadystatechange = respuesta2AJAX;
// y finalmente enviamos la peticion
myRequest2.send(null);
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

function respuesta2AJAX() {
    // Solo entra cuando se completa la peticion
    if(myRequest2.readyState == 4) {
          // Si la respuesta HTTP es OK
           if(myRequest2.status == 200) {
             document.getElementById('respuesta').innerHTML= myRequest2.responseText;
        } else {
            // Manejamos el error con el statusText
            document.getElementById('respuesta').innerHTML= myRequest2.status;
        }
    }else{
      document.getElementById('respuesta').innerHTML="<img src='' />";
    }
   
}


</script>

<body><!--Contenido de la pagina principal-->
	<div class="container">
