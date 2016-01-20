<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inventario de Bienes Informáticos SECTUR Aguascalientes</title>
	<!--<link rel="stylesheet" href="http://localhost:8080/inventariobi/css/bootstrap.css">-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/estilo.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/prettify.css">
  
</head>


<style type="text/css">

.bwizard-steps {
  display: inline-block;
  margin: 0; padding: 0;
  background: #fff }
  .bwizard-steps .active {
    color: #fff;
    background: #007ACC }
  .bwizard-steps .active:after {
    border-left-color: #007ACC }
  .bwizard-steps .active a {
    color: #fff;
    cursor: default }
  .bwizard-steps .label {
    position: relative;
    top: -1px;
    margin: 0 5px 0 0; padding: 1px 5px 2px }
  .bwizard-steps .active .label {
    background-color: #333;}
  .bwizard-steps li {
    display: inline-block; position: relative;
    margin-right: 5px;
    padding: 12px 17px 10px 30px;
    *display: inline;
    *padding-left: 17px;
    background: #efefef;
    line-height: 18px;
    list-style: none;
    zoom: 1; }
  .bwizard-steps li:first-child {
    padding-left: 12px;
    -moz-border-radius: 4px 0 0 4px;
    -webkit-border-radius: 4px 0 0 4px;
    border-radius: 4px 0 0 4px; }
  .bwizard-steps li:first-child:before {
    border: none }
  .bwizard-steps li:last-child {
    margin-right: 0;
    -moz-border-radius: 0 4px 4px 0;
    -webkit-border-radius: 0 4px 4px 0;
    border-radius: 0 4px 4px 0; }
  .bwizard-steps li:last-child:after {
    border: none }
  .bwizard-steps li:before {
    position: absolute;
    left: 0; top: 0;
    height: 0; width: 0;
    border-bottom: 20px inset transparent;
    border-left: 20px solid #fff;
    border-top: 20px inset transparent;
    content: "" }
  .bwizard-steps li:after {
    position: absolute;
    right: -20px; top: 0;
    height: 0; width: 0;
    border-bottom: 20px inset transparent;
    border-left: 20px solid #efefef;
    border-top: 20px inset transparent;
    content: "";
    z-index: 2; }
  .bwizard-steps a {
    color: #333 }
  .bwizard-steps a:hover {
    text-decoration: none }
.bwizard-steps.clickable li:not(.active) {
  cursor: pointer }
.bwizard-steps.clickable li:hover:not(.active) {
  background: #ccc }
.bwizard-steps.clickable li:hover:not(.active):after {
  border-left-color: #ccc }
.bwizard-steps.clickable li:hover:not(.active) a {
  color: #08c }
@media (max-width: 480px) {
  /* badges only on small screens */
  .bwizard-steps li:after,
  .bwizard-steps li:before {
    border: none }
  .bwizard-steps li,
  .bwizard-steps li.active,
  .bwizard-steps li:first-child,
  .bwizard-steps li:last-child {
    margin-right: 0;
    padding: 0;
    background-color: transparent }
}

	#nombre_completo { text-transform: uppercase; }
  #nombre { text-transform: uppercase; }
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
  #nombre { text-transform: uppercase }
</style>



<body><!--Contenido de la pagina principal-->
	<div class="container-fluid">
    <div class="row-fluid">
