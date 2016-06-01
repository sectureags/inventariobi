<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';

/*
| -------------------------------------------------------------------------
| URI ROUTING entrar
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['entrar'] = "welcome/logout";

/*
| -------------------------------------------------------------------------
| URI ROUTING entrar
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['inicio'] = "home/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING SEGURIDAD
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['seguridad'] = "home/seguridad";

/*
| -------------------------------------------------------------------------
| URI ROUTING BIENES INFORMATICOS
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['bienes_informaticos'] = "home/bienes_informaticos";

/*
| -------------------------------------------------------------------------
| URI ROUTING CPU's
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['cpus'] = "bi_cpu/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING IPCONFIG
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['ipconfigs'] = "bi_ipconfig/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING PROCESADORES
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['procesadores'] = "bi_procesador/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING DISCOS DUROS
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['discos_duros'] = "bi_dd/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING MEMORIA RAM
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['memorias_ram'] = "bi_ram/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING MONITORES
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['monitores'] = "bi_monitor/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING TECLADOS
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['teclados'] = "bi_teclado/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING MOUSES
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['mouses'] = "bi_mouse/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING TELEFONOS
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['telefonos'] = "bi_telefono/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING REGULADORES
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['reguladores'] = "bi_regulador/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING OTROS
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['otros'] = "bi_otro/index";

/*
| -------------------------------------------------------------------------
| URI ROUTING REPORTES
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['reportes'] = "home/reportes";

/*
| -------------------------------------------------------------------------
| URI ROUTING EMPLEADOS
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['empleados'] = "home/empleados";

/*
| -------------------------------------------------------------------------
| URI ROUTING EMPLEADOS
| -------------------------------------------------------------------------
| Reglas de mapeo
|
*/
$route['permisos'] = "permisos/index";

/* End of file routes.php */
/* Location: ./application/config/routes.php */