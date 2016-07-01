<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bi_cpu extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('encrypt');
		// Si la sesion no tiene datos, redireccionarlo fuera del sistema
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('entrar')); 
		}
		// Se Definen constantes para facilitar la programacion
		define("SUPERROL", 1); // "SuperAdministrador"
		define('ROL',$this->session->userdata('rol'));
	    define('COMPONENTE',$this->uri->segment(1));
	    define('USER',$this->session->userdata('username'));
	    
	    //
	    $this->load->model('permisos_model');
  		$this->load->model('tbl_cpu_crud_model');
  		$this->load->model('tbl_ipconfig_crud_model');
  		$this->load->model('tbl_roles_model');
  		$this->load->model('tbl_status_cpu_model');
  		/*
  		* Tabla de Roles:
  		* 1.- Super Administrador
  		* 2.- Administrador
  		* 3.- Capturista
  		*/
	}


	/**
	* Valida el campo del Codigo del Empleado en el formulario de alta
	*/
	public function validar_num_inventario($num_inventario = 0){

		if ( isset($num_inventario) AND $num_inventario > 0 ) {

			$num_inventario_todos=$this->tbl_cpu_crud_model->num_inventario_todos();
			$arrayName = array();
			foreach ($num_inventario_todos as $value) {
				array_push($arrayName, $value->num_inventario);			
			}
			
			if (in_array($num_inventario, $arrayName)) {
				echo "<span class='label label-danger'>El numero de inventario ya existe en el Sistema!</span>"; 
			}
			
		}else{
			echo "<span class='label label-danger'>El numero de inventario es requerido!</span>"; 
		}

	}

	/**
	* Obtiene los registros de Discos Duros del id_cpu correspondiente y los manda a AJAX
	*/
	public function dd_cpu($id_cpu){

		$fields = $this->db->list_fields('tbl_dd');		

		$this->load->model('tbl_dd_crud_model');
		$dds = $this->tbl_dd_crud_model->get_dds($id_cpu);
		
		if ( empty($dds) ) {
			
			echo "	<div class='panel panel-danger'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>DISCOS DUROS</h3>
					  </div>
					  <div class='panel-body'>
					    <h3>NO SE ENCONTRARON REGISTROS DE DISCOS DUROS ASOCIADOS A ESTE CPU.</h3>
					  </div>
					</div>
				";

		}else{

				echo "<div class='panel panel-info'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>DISCOS DUROS</h3>
					  </div>
					  <div class='panel-body'>
					  	<table class='table'><tr>";
							foreach ($fields as $field)
							{
								echo "<th>";
							    echo $field;
							    echo "</th>";
							}
							echo "</tr>";
							echo "<tr>";	
							foreach ($dds as $dd)
							{									
								foreach ($fields as $field)
								{
								echo "<td>";
							    echo $dd[$field];
							    echo "</td>";
								}
								echo "</tr>";
							}							
				echo "</table></div></div>";
			}
	}	

	/**
	* Obtiene los registros de Memorias RAM del id_cpu correspondiente y los manda a AJAX
	*/
	public function ram_cpu($id_cpu){

		$fields = $this->db->list_fields('tbl_ram');		

		$this->load->model('tbl_ram_crud_model');
		$dds = $this->tbl_ram_crud_model->get_rams($id_cpu);
		if ( empty($dds) ) {
			
			echo "	<div class='panel panel-danger'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>MEMORIAS RAM</h3>
					  </div>
					  <div class='panel-body'>
					    <h3>NO SE ENCONTRARON REGISTROS DE MEMORIAS RAM EN ESTE CPU.</h3>
					  </div>
					</div>
				";

		}else{

				echo "<p><div class='panel panel-info'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>MEMORIAS RAM</h3>
					  </div>
					  <div class='panel-body'>
					  	<table class='table'><tr>";
							foreach ($fields as $field)
							{
								echo "<th>";
							    echo $field;
							    echo "</th>";
							}
							echo "</tr>";
							echo "<tr>";	
							foreach ($dds as $dd)
							{									
								foreach ($fields as $field)
								{
								echo "<td>";
							    echo $dd[$field];
							    echo "</td>";
								}
								echo "</tr>";
							}							
				echo "</table></div></div>";
			}
	}	

	/**
	* Obtiene los registros de IPCONFIG del id_cpu correspondiente y los manda a AJAX
	*/
	public function ipconfig_cpu($id_cpu){

		$fieldseth = $this->db->list_fields('tbl_ipconfig');		

		$this->load->model('tbl_ipconfig_crud_model');
		$eth = $this->tbl_ipconfig_crud_model->get_ipconfigs($id_cpu);
		if ( empty($eth) ) {
			
			echo "	<div class='panel panel-danger'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>CONFIGURACION RED IPv4</h3>
					  </div>
					  <div class='panel-body'>
					    <h3>NO SE ENCONTRARON REGISTROS DE CONFIGURACION RED IPv4 EN ESTE CPU.</h3>
					  </div>
					</div>
				";

		}else{

				echo "<p><div class='panel panel-info'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>CONFIGURACION RED IPv4</h3>
					  </div>
					  <div class='panel-body'>
					  	<table class='table'><tr>";
							
							
							echo "<th>INTERFACE</th>";
							echo "<th>MAC</th>";
							echo "<th>IP</th>";
							
							
							echo "</tr>";
							echo "<tr>";	
							foreach ($eth as $dd)
							{									
							
							    echo "<td>";
							    echo $dd['interface'];
							    echo "</td>";
							    echo "<td>";
							    echo $dd['mac'];
							    echo "</td>";
							    echo "<td>";
							    echo $dd['ip'];
							    echo "</td>";
							
								echo "</tr>";
							}							
				echo "</table></div></div>";
			}
	}	

	/**
	* Obtiene los registros de PROCESADOR del id_cpu correspondiente y los manda a AJAX
	*/
	public function procesador_cpu($id_cpu){

		$fieldseth = $this->db->list_fields('tbl_procesador');		

		$this->load->model('tbl_procesador_crud_model');
		$eth = $this->tbl_procesador_crud_model->get_procesadores($id_cpu);
		if ( empty($eth) ) {
			
			echo "	<div class='panel panel-danger'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>PROCESADOR</h3>
					  </div>
					  <div class='panel-body'>
					    <h3>NO SE ENCONTRARON REGISTROS DEL PROCESADOR EN ESTE CPU.</h3>
					  </div>
					</div>
				";

		}else{

				echo "<p><div class='panel panel-info'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>PROCESADOR</h3>
					  </div>
					  <div class='panel-body'>
					  	<table class='table'><tr>";
							
							
							echo "<th>TIPO</th>";
							echo "<th>MARCA</th>";
							echo "<th>NOMBRE</th>";
							
							
							echo "</tr>";
							echo "<tr>";	
							foreach ($eth as $dd)
							{									
								
							    echo "<td>";
							    echo $dd['tipo'];
							    echo "</td>";
							    echo "<td>";
							    echo $dd['marca_proc'];
							    echo "</td>";
							    echo "<td>";
							    echo $dd['procesador'];
							    echo "</td>";
							    
								echo "</tr>";
							}							
				echo "</table></div></div>";
			}
	}		

	/**
	* Obtiene los registros de SISTEMAS OPERATIVOS del id_cpu correspondiente y los manda a AJAX
	
	public function so_cpu($id_cpu){

		$fieldseth = $this->db->list_fields('tbl_so');		

		$this->load->model('tbl_so_crud_model');
		$eth = $this->tbl_so_crud_model->get_sos($id_cpu);
		if ( empty($eth) ) {
			
			echo "	<div class='panel panel-danger'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>SISTEMAS OPERATIVOS</h3>
					  </div>
					  <div class='panel-body'>
					    <h3>NO SE ENCONTRARON REGISTROS DEL SISTEMA OPERATIVO EN ESTE CPU.</h3>
					  </div>
					</div>
				";

		}else{

				echo "<p><div class='panel panel-info'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>SISTEMAS OPERATIVOS</h3>
					  </div>
					  <div class='panel-body'>
					  	<table class='table'><tr>";
							
							
							echo "<th>TIPO</th>";
							echo "<th>MARCA</th>";
							echo "<th>NOMBRE</th>";
							
							
							echo "</tr>";
							echo "<tr>";	
							foreach ($eth as $dd)
							{									
								
							    echo "<td>";
							    echo $dd['tipo'];
							    echo "</td>";
							    echo "<td>";
							    echo $dd['marca_so'];
							    echo "</td>";
							    echo "<td>";
							    echo $dd['so'];
							    echo "</td>";
							    
								echo "</tr>";
							}							
				echo "</table></div></div>";
			}
	}		*/

	/**
	* Obtiene los registros de PROGRAMAS del id_cpu correspondiente y los manda a AJAX
	
	public function prog_cpu($id_cpu){

		$fieldseth = $this->db->list_fields('tbl_prog');		

		$this->load->model('tbl_so_crud_model');
		$eth = $this->tbl_prog_crud_model->get_programas($id_cpu);
		if ( empty($eth) ) {
			
			echo "	<div class='panel panel-danger'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>PROGRAMAS</h3>
					  </div>
					  <div class='panel-body'>
					    <h3>NO SE ENCONTRARON REGISTROS DE PROGRAMAS EN ESTE CPU.</h3>
					  </div>
					</div>
				";

		}else{

				echo "<p><div class='panel panel-info'>
					  <div class='panel-heading'>
					    <h3 class='panel-title'>PROGRAMAS</h3>
					  </div>
					  <div class='panel-body'>
					  	<table class='table'><tr>";
							
							
							echo "<th>TIPO</th>";
							echo "<th>MARCA</th>";
							echo "<th>NOMBRE</th>";
							
							
							echo "</tr>";
							echo "<tr>";	
							foreach ($eth as $dd)
							{									
								
							    echo "<td>";
							    echo $dd['tipo'];
							    echo "</td>";
							    echo "<td>";
							    echo $dd['marca_prog'];
							    echo "</td>";
							    echo "<td>";
							    echo $dd['programa'];
							    echo "</td>";
							    
								echo "</tr>";
							}							
				echo "</table></div></div>";
			}
	}		
*/
	public function index()
	{ 
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$this->load->model('tbl_empleado_crud_model'); 
			$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();
			$data['combo_empleados'] = $this->tbl_empleado_crud_model->combo_empleados();
			$this->load->model('tbl_status_cpu_model'); 
			$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
			
			$data['cargar_cpu'] = $this->tbl_cpu_crud_model->cargar_cpu();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			
			$this->load->view('header_view');
			$this->load->view('menu_view',$data);
			$this->load->view('contenedor_cpu_view',$data);
			$this->load->view('footer_view');

			}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

		 		$this->load->model('tbl_empleado_crud_model'); 
				$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();
				$data['combo_empleados'] = $this->tbl_empleado_crud_model->combo_empleados();
				$this->load->model('tbl_status_cpu_model'); 
				$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
			
				$data['cargar_cpu'] = $this->tbl_cpu_crud_model->cargar_cpu();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				
				$this->load->view('header_view');
				$this->load->view('menu_view',$data);
				$this->load->view('contenedor_cpu_view',$data);
				$this->load->view('footer_view');

				}else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

				$this->load->model('tbl_empleado_crud_model'); 
				$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();
				$this->load->model('tbl_status_cpu_model'); 
				$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();

				$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_cpu'] = $this->tbl_cpu_crud_model->cargar_cpu();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}				
			
		}

	}

	public function crear()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
		
			$cpu = array(
				'num_inventario' => $this->input->post('num_inventario'),
				'marca' 		 => $this->input->post('marca') ,
				'modelo' 		 => $this->input->post('modelo'),
				'hostname' 		 => $this->input->post('hostname'),
				'num_serie' 	 => $this->input->post('num_serie'),
				'tipo' 			 => $this->input->post('tipo'),
				'ubicacion' 	 => $this->input->post('ubicacion'),
				'categoria' 	 => $this->input->post('categoria'),
				'status' 		 => $this->input->post('status'),
				'id_empleado' 	 => $this->input->post('id_empleado')
			);

			
			$this->load->model('tbl_cpu_crud_model');
			$nuevo = $this->tbl_cpu_crud_model->agregar($cpu);
				
			if ( isset($nuevo) && is_int($nuevo) > 0 ) {
				redirect(base_url('cpus'));
			}

			show_404();	
			

			}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

		 		$cpu = array(
				'num_inventario' => $this->input->post('num_inventario'),
				'marca' 		 => $this->input->post('marca') ,
				'modelo' 		 => $this->input->post('modelo'),
				'hostname' 		 => $this->input->post('hostname'),
				'num_serie' 	 => $this->input->post('num_serie'),
				'tipo' 			 => $this->input->post('tipo'),
				'ubicacion' 	 => $this->input->post('ubicacion'),
				'categoria' 	 => $this->input->post('categoria'),
				'status' 		 => $this->input->post('status'),
				'id_empleado' 	 => $this->input->post('id_empleado')
			);

			$this->load->model('tbl_cpu_crud_model');
			$nuevo = $this->tbl_cpu_crud_model->agregar($cpu);
				
			if ( isset($nuevo) && is_int($nuevo) > 0 ) {
				redirect(base_url('cpus'));
			}

			show_404();	

				}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$this->load->view('sorry_view',$data);
			}				
			
		}
	}

	public function crearrapido()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
		
			$cpu = array(
				'num_inventario' => $this->input->post('num_inventario'),
				'marca' 		 => $this->input->post('marca') ,
				'modelo' 		 => $this->input->post('modelo'),				
				'num_serie' 	 => $this->input->post('num_serie'),
				'tipo' 			 => $this->input->post('tipo'),				
				'status' 		 => $this->input->post('status'),
				'ubicacion' 	 => 'SECTURE',
				'categoria' 	 => 'SECTURE',
				'hostname' 	 	 => 'SECTURE'.$this->input->post('num_inventario').'D',
				'id_empleado' 	 => $this->input->post('id_empleado')
			);

			#var_dump($cpu);
			#die();

			
			$this->load->model('tbl_cpu_crud_model');
			$nuevo = $this->tbl_cpu_crud_model->agregarrapido($cpu);
				
			if ( isset($nuevo) && is_int($nuevo) ) {
				redirect(base_url('cpus'));
			}

			show_404();	
			

			}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

		 		$cpu = array(
					'num_inventario' => $this->input->post('num_inventario'),
					'marca' 		 => $this->input->post('marca') ,
					'modelo' 		 => $this->input->post('modelo'),				
					'num_serie' 	 => $this->input->post('num_serie'),
					'tipo' 			 => $this->input->post('tipo'),				
					'status' 		 => $this->input->post('status'),
					'id_empleado' 	 => $this->input->post('id_empleado')
				);

			$this->load->model('tbl_cpu_crud_model');
			$nuevo = $this->tbl_cpu_crud_model->agregarrapido($cpu);
				
			if ( isset($nuevo) && is_int($nuevo) > 0 ) {
				redirect(base_url('cpus'));
			}

			show_404();	

				}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$this->load->view('sorry_view',$data);
			}				
			
		}
	}


	public function editar()
	{
		
	}

	public function actualizar()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$cpu = array(
				'id_cpu' 		 => $this->input->post('id_cpu'),
				'num_inventario' => $this->input->post('num_inventario'),
				'marca' 		 => $this->input->post('marca') ,
				'modelo' 		 => $this->input->post('modelo'),
				'hostname' 		 => $this->input->post('hostname'),
				'num_serie' 	 => $this->input->post('num_serie'),
				'tipo' 			 => $this->input->post('tipo'),
				'ubicacion' 	 => $this->input->post('ubicacion'),
				'categoria' 	 => $this->input->post('categoria'),
				'status' 		 => $this->input->post('status'),
				'id_empleado' 	 => $this->input->post('id_empleado')
			);

			$this->load->model('tbl_cpu_crud_model'); 
			$this->tbl_cpu_crud_model->actualizar_cpu($cpu);
			redirect(base_url('cpus'));

			}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

		 		$id_cpu=$_POST['id_cpu'];
				$num_inventario=$_POST['num_inventario'];
				$marca=$_POST['marca'];
				$modelo=$_POST['modelo'];
				$hostname=$_POST['hostname'];
				$num_serie=$_POST['num_serie'];
				$tipo=$_POST['tipo'];
				$ubicacion=$_POST['ubicacion'];
				$categoria=$_POST['categoria'];
				$status=$_POST['status'];
				$id_empleado=$_POST['id_empleado'];

				$this->load->model('tbl_cpu_crud_model'); 
				$this->tbl_cpu_crud_model->actualizar_cpu($id_cpu,$num_inventario,$marca,$modelo,$hostname,$num_serie,$tipo,$ubicacion,$categoria,$status,$id_empleado);
				redirect('bi_cpu/index');

				}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

				$id_cpu=$_POST['id_cpu'];
				$num_inventario=$_POST['num_inventario'];
				$modelo=$_POST['modelo'];
				$hostname=$_POST['hostname'];
				$num_serie=$_POST['num_serie'];
				$tipo=$_POST['tipo'];
				$ubicacion=$_POST['ubicacion'];
				$categoria=$_POST['categoria'];
				$status=$_POST['status'];
				$id_empleado=$_POST['id_empleado'];

				$this->load->model('tbl_cpu_crud_model'); 
				$this->load->view('sorry_view',$data);

			}
		}
	}

	public function reasignar()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all(); 

			$id_cpu=$_POST['id_cpu'];
			$num_inventario=$_POST['num_inventario'];
			$marca=$_POST['marca'];
			$hostname=$_POST['hostname'];
			$ubicacion=$_POST['ubicacion'];
			$status=$_POST['status'];
			$id_empleado=$_POST['id_empleado'];

			$this->load->model('tbl_cpu_crud_model'); 
			$this->tbl_cpu_crud_model->reasignar_cpu($id_cpu,$num_inventario,$marca,$hostname,$ubicacion,$status,$id_empleado);
			redirect('bi_cpu/index');

			}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

		 		$id_cpu=$_POST['id_cpu'];
				$num_inventario=$_POST['num_inventario'];
				$marca=$_POST['marca'];
				$hostname=$_POST['hostname'];
				$ubicacion=$_POST['ubicacion'];
				$status=$_POST['status'];
				$id_empleado=$_POST['id_empleado'];

				$this->load->model('tbl_cpu_crud_model'); 
				$this->tbl_cpu_crud_model->reasignar_cpu($id_cpu,$num_inventario,$marca,$hostname,$ubicacion,$status,$id_empleado);
				redirect('bi_cpu/index');

				}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

				$id_cpu=$_POST['id_cpu'];
				$num_inventario=$_POST['num_inventario'];
				$marca=$_POST['marca'];
				$hostname=$_POST['hostname'];
				$ubicacion=$_POST['ubicacion'];
				$status=$_POST['status'];
				$id_empleado=$_POST['id_empleado'];

				$this->load->model('tbl_cpu_crud_model'); 
				$this->load->view('sorry_view',$data);
			}
		}


	}

	public function actualizar2()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$id_cpu=$_POST['id_cpu'];
			$num_inventario=$_POST['num_inventario'];
			$marca=$_POST['marca'];
			$modelo=$_POST['modelo'];
			$hostname=$_POST['hostname'];
			$num_serie=$_POST['num_serie'];
			$tipo=$_POST['tipo'];
			$ubicacion=$_POST['ubicacion'];
			$categoria=$_POST['categoria'];
			$status=$_POST['status'];
			$id_empleado=$_POST['id_empleado'];

			$this->load->model('tbl_cpu_crud_model'); 
			$this->tbl_cpu_crud_model->actualizar_cpu($id_cpu,$num_inventario,$categoria,$marca,$modelo,$hostname,$num_serie,$tipo,$ubicacion,$status,$id_empleado);
			
			redirect(base_url('bi_cpu/cpu_empleado').'/'.$id_empleado);

			}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

			 		$id_cpu=$_POST['id_cpu'];
					$num_inventario=$_POST['num_inventario'];
					$marca=$_POST['marca'];
					$modelo=$_POST['modelo'];
					$hostname=$_POST['hostname'];
					$num_serie=$_POST['num_serie'];
					$tipo=$_POST['tipo'];
					$ubicacion=$_POST['ubicacion'];
					$categoria=$_POST['categoria'];
					$status=$_POST['status'];
					$id_empleado=$_POST['id_empleado'];

					$this->load->model('tbl_cpu_crud_model'); 
					$this->tbl_cpu_crud_model->actualizar_cpu($id_cpu,$num_inventario,$marca,$modelo,$hostname,$num_serie,$tipo,$ubicacion,$categoria,$status,$id_empleado);
					
					redirect(base_url('bi_cpu/cpu_empleado').'/'.$id_empleado);

					}
				else{
						$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
						$data['username'] = USER;
						$data['rol'] = ROL;
						$data['get_all'] = $this->permisos_model->get_all();

						$id_cpu=$_POST['id_cpu'];
						$num_inventario=$_POST['num_inventario'];
						$marca=$_POST['marca'];
						$modelo=$_POST['modelo'];
						$hostname=$_POST['hostname'];
						$num_serie=$_POST['num_serie'];
						$tipo=$_POST['tipo'];
						$ubicacion=$_POST['ubicacion'];
						$categoria=$_POST['categoria'];
						$status=$_POST['status'];
						$id_empleado=$_POST['id_empleado'];

						$this->load->model('tbl_cpu_crud_model'); 
						$this->load->view('sorry_view',$data);
				}
			}
	}

	public function reasignar2()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$id_cpu=$_POST['id_cpu'];
			$num_inventario=$_POST['num_inventario'];
			$marca=$_POST['marca'];
			$hostname=$_POST['hostname'];
			$ubicacion=$_POST['ubicacion'];
			$status=$_POST['status'];
			$id_empleado=$_POST['id_empleado'];

			$this->load->model('tbl_cpu_crud_model'); 
			$this->tbl_cpu_crud_model->reasignar_cpu($id_cpu,$num_inventario,$marca,$hostname,$ubicacion,$status,$id_empleado);
			
			redirect(base_url('bi_cpu/cpu_empleado').'/'.$id_empleado);

			}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

		 		$id_cpu=$_POST['id_cpu'];
				$num_inventario=$_POST['num_inventario'];
				$marca=$_POST['marca'];
				$hostname=$_POST['hostname'];
				$ubicacion=$_POST['ubicacion'];
				$status=$_POST['status'];
				$id_empleado=$_POST['id_empleado'];

				$this->load->model('tbl_cpu_crud_model'); 
				$this->tbl_cpu_crud_model->reasignar_cpu($id_cpu,$num_inventario,$marca,$hostname,$ubicacion,$status,$id_empleado);
				
				redirect(base_url('bi_cpu/cpu_empleado').'/'.$id_empleado);

				}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

				$id_cpu=$_POST['id_cpu'];
				$num_inventario=$_POST['num_inventario'];
				$marca=$_POST['marca'];
				$hostname=$_POST['hostname'];
				$ubicacion=$_POST['ubicacion'];
				$status=$_POST['status'];
				$id_empleado=$_POST['id_empleado'];

				$this->load->model('tbl_cpu_crud_model'); 
				
				$this->load->view('sorry_view',$data);
			}
		}

	}

	public function eliminar()
	{
		
	}

	public function detalles($id_cpu) // Se recibe por la URL el id_del CPU
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			
			$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			//$this->load->model('tbl_dd_crud_model'); // Model para administracion de Discos Duros
			$data['cargar_cpu'] = $this->tbl_cpu_crud_model->cargar_cpu();

			$data['cargar_cpu_detalles'] = $this->tbl_cpu_crud_model->cargar_cpu_detalles($id_cpu);
			
			$this->load->view('header_view');
			$this->load->view('menu_view',$data);
			$this->load->view('contenedor_super_detalles_cpu',$data);
			$this->load->view('footer_view');

		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		
		 		$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_cpu'] = $this->tbl_cpu_crud_model->cargar_cpu();
				$data['cargar_cpu_detalles'] = $this->tbl_cpu_crud_model->cargar_cpu_detalles($id_cpu);
				
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				//$this->load->view('menu_detalles_empleado_view',$data);
				$this->load->view('contenedor_super_detalles_cpu',$data);
				$this->load->view('footer_view');
				}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

				$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_cpu_detalles'] = $this->tbl_cpu_crud_model->cargar_cpu_detalles($id_cpu);
				
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}				
			
		}
	
	}

	public function cpu_empleado($id_empleado)
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$this->load->model('tbl_cpu_crud_model');

			$existe=$this->tbl_cpu_crud_model->existe_cpu_empleado($id_empleado);

			if ($existe==TRUE) {
				$this->load->model('tbl_status_cpu_model'); 
				$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
				$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_cpu_empleado'] = $this->tbl_cpu_crud_model->cargar_cpu_empleado($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado); 
				$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				//$this->load->view('menu_detalles_empleado_view',$data);
				//$this->load->view('contenedor_super_detalles_empleado_view',$data);
				$this->load->view('cpu_empleado_view',$data);
				/*$this->load->view('contenedor_cpu_empleados_view',$data);*/
				$this->load->view('footer_view');
			}
			else
			{
				/*$id_empleado=$_POST['id_empleado'];*/
				$this->load->model('tbl_status_cpu_model'); 
				$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
				$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_cpu_empleado'] = $this->tbl_cpu_crud_model->cargar_cpu_empleado($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				//$this->load->view('menu_detalles_empleado_view',$data);
				//$this->load->view('contenedor_super_detalles_empleado_view',$data);
				$this->load->view('sin_cpu_empleado_view',$data);
				/*$this->load->view('contenedor_cpu_empleados_view',$data);*/
				$this->load->view('footer_view');
			}

			}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

		 		$this->load->model('tbl_cpu_crud_model');

				$existe=$this->tbl_cpu_crud_model->existe_cpu_empleado($id_empleado);

				if ($existe==TRUE) {
					$this->load->model('tbl_status_cpu_model'); 
					$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
					$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_cpu_empleado'] = $this->tbl_cpu_crud_model->cargar_cpu_empleado($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
					$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado); 
					$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();
					$this->load->view('header_view');
					//$this->load->view('cabecera_view');
					$this->load->view('menu_view',$data);
					//$this->load->view('menu_detalles_empleado_view',$data);
					//$this->load->view('contenedor_super_detalles_empleado_view',$data);
					$this->load->view('cpu_empleado_view',$data);
					/*$this->load->view('contenedor_cpu_empleados_view',$data);*/
					$this->load->view('footer_view');
				}
				else
				{
					/*$id_empleado=$_POST['id_empleado'];*/
					$this->load->model('tbl_status_cpu_model'); 
					$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
					$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_cpu_empleado'] = $this->tbl_cpu_crud_model->cargar_cpu_empleado($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
					$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
					$this->load->view('header_view');
					//$this->load->view('cabecera_view');
					$this->load->view('menu_view',$data);
					//$this->load->view('menu_detalles_empleado_view',$data);
					//$this->load->view('contenedor_super_detalles_empleado_view',$data);
					$this->load->view('sin_cpu_empleado_view',$data);
					/*$this->load->view('contenedor_cpu_empleados_view',$data);*/
					$this->load->view('footer_view');
				}

				}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

					$this->load->model('tbl_cpu_crud_model');

				$existe=$this->tbl_cpu_crud_model->existe_cpu_empleado($id_empleado);

				if ($existe==TRUE) {
					$this->load->model('tbl_status_cpu_model'); 
					$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
					$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_cpu_empleado'] = $this->tbl_cpu_crud_model->cargar_cpu_empleado($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
					$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado); 
					$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();
					$this->load->view('header_view');
					//$this->load->view('cabecera_view');
					$this->load->view('menu_view',$data);
					//$this->load->view('menu_detalles_empleado_view',$data);
					//$this->load->view('contenedor_super_detalles_empleado_view',$data);
					$this->load->view('sorry_view',$data);
					/*$this->load->view('contenedor_cpu_empleados_view',$data);*/
					$this->load->view('footer_view');
				}
				else
				{
					/*$id_empleado=$_POST['id_empleado'];*/
					$this->load->model('tbl_status_cpu_model'); 
					$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
					$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_cpu_empleado'] = $this->tbl_cpu_crud_model->cargar_cpu_empleado($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
					$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
					$this->load->view('header_view');
					//$this->load->view('cabecera_view');
					$this->load->view('menu_view',$data);
					//$this->load->view('menu_detalles_empleado_view',$data);
					//$this->load->view('contenedor_super_detalles_empleado_view',$data);
					$this->load->view('sorry_view',$data);
					/*$this->load->view('contenedor_cpu_empleados_view',$data);*/
					$this->load->view('footer_view');
				}
			}
		}
	}


	public function filtrar_por_status($status)
	{
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$this->load->model('tbl_cpu_crud_model');
			$this->load->model('tbl_status_cpu_model');
			$this->load->model('tbl_empleado_crud_model');

			

			$data['cargar_cpu'] = $this->tbl_cpu_crud_model->cargar_por_status($status);

			
			 
			$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
			
			$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();
			$this->load->view('header_view');
			//$this->load->view('cabecera_view');
			$this->load->view('menu_view',$data);
			$this->load->view('contenedor_cpu_view',$data);
			$this->load->view('footer_view');
			
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		
				$this->load->model('tbl_cpu_crud_model');
				$this->load->model('tbl_status_cpu_model');
				$this->load->model('tbl_empleado_crud_model');

				

				$data['cargar_cpu'] = $this->tbl_cpu_crud_model->cargar_por_status($status);

				
				 
				$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
				
				$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				$this->load->view('contenedor_cpu_view',$data);
				$this->load->view('footer_view');

			}else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

				$this->load->model('tbl_cpu_crud_model');
				$this->load->model('tbl_status_cpu_model');
				$this->load->model('tbl_empleado_crud_model');

				

				$data['cargar_cpu'] = $this->tbl_cpu_crud_model->cargar_por_status($status);

				
				 
				$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
				
				$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');

			}				
			
		}
				
	}

	public function buscar_inventario()
	{
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$num_inventario = $this->input->post('num_inventario');//con este post de codeigniter se hacen una serie de validaciones para que no vallan a ingresar errores

			$this->load->model('tbl_cpu_crud_model');
			$this->load->model('tbl_status_cpu_model');
			$this->load->model('tbl_empleado_crud_model');

			$data['cargar_cpu'] = $this->tbl_cpu_crud_model->buscar_inventario($num_inventario);
			$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
			$data['combo_empleados'] = $this->tbl_empleado_crud_model->combo_empleados();
			$this->load->view('header_view');
				//$this->load->view('cabecera_view');
			$this->load->view('menu_view',$data);
			$this->load->view('contenedor_cpu_view',$data);
			$this->load->view('footer_view');

		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
					$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
					$data['username'] = USER;
					$data['rol'] = ROL;
			 		$data['get_all'] = $this->permisos_model->get_all();

					$num_inventario = $this->input->post('num_inventario');//con este post de codeigniter se hacen una serie de validaciones para que no vallan a ingresar errores

					$this->load->model('tbl_cpu_crud_model');
					$this->load->model('tbl_status_cpu_model');
					$this->load->model('tbl_empleado_crud_model');

					$data['cargar_cpu'] = $this->tbl_cpu_crud_model->buscar_inventario($num_inventario);
					$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
					$data['combo_empleados'] = $this->tbl_empleado_crud_model->combo_empleados();
					$this->load->view('header_view');
						//$this->load->view('cabecera_view');
					$this->load->view('menu_view',$data);
					$this->load->view('contenedor_cpu_view',$data);
					$this->load->view('footer_view');
				
			}else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

				$num_inventario = $this->input->post('num_inventario');//con este post de codeigniter se hacen una serie de validaciones para que no vallan a ingresar errores

				$this->load->model('tbl_cpu_crud_model');
				$this->load->model('tbl_status_cpu_model');
				$this->load->model('tbl_empleado_crud_model');

				$data['cargar_cpu'] = $this->tbl_cpu_crud_model->buscar_inventario($num_inventario);
				$data['cargar_status'] = $this->tbl_status_cpu_model->cargar_status();
				$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();
				$this->load->view('header_view');
					//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */