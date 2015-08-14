<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleados extends CI_Controller {

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
			redirect(base_url('welcome/logout')); 
		}
		// Se Definen constantes para facilitar la programacion
		define("SUPERROL", 1); // "SuperAdministrador"
		define('ROL',$this->session->userdata('rol'));
	    define('COMPONENTE',$this->uri->segment(1));
	    define('USER',$this->session->userdata('username'));
	    //
	    $this->load->model('permisos_model');
  		$this->load->model('tbl_empleado_crud_model');
  		$this->load->model('tbl_roles_model');
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
	public function validar_codigo_empleado($codigo_empleado = 0){

		if ( isset($codigo_empleado) AND $codigo_empleado > 0 ) {

			$codigos_empleado=$this->tbl_empleado_crud_model->codigos_empleado();
			$arrayName = array();
			foreach ($codigos_empleado as $value) {
				array_push($arrayName, $value->codigo_empleado);			
			}
			
			if (in_array($codigo_empleado, $arrayName)) {
				echo "<span class='label label-danger'>El codigo ya existe en el Sistema!</span>"; 
			}
			
		}else{
			echo "<span class='label label-danger'>El codigo es requerido!</span>"; 
		}

	}


	public function index()
	{ 
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			$this->load->view('header_view');
			//$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('empleados_view',$data);
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
		 		$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('empleados_view',$data);
				$this->load->view('footer_view');
			}else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view');
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
			$codigo_empleado=$_POST['codigo_empleado'];
			$nombre_completo=$_POST['nombre_completo'];
			$unidad=$_POST['unidad'];
			$usuario_de_red=$_POST['usuario_de_red'];
			$contrasena=$_POST['contrasena'];
			$num_extension=$_POST['num_extension'];
			$correo_electonico=$_POST['correo_electonico'];
			$area=$_POST['area'];
			$cargo=$_POST['cargo'];

			$this->load->model('tbl_empleado_crud_model'); 
			$nuevo = $this->tbl_empleado_crud_model->agregar_empleados($codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo);
			
			$this->index();
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
		 		$codigo_empleado=$_POST['codigo_empleado'];
				$nombre_completo=$_POST['nombre_completo'];
				$unidad=$_POST['unidad'];
				$usuario_de_red=$_POST['usuario_de_red'];
				$contrasena=$_POST['contrasena'];
				$num_extension=$_POST['num_extension'];
				$correo_electonico=$_POST['correo_electonico'];
				$area=$_POST['area'];
				$cargo=$_POST['cargo'];

				$this->load->model('tbl_empleado_crud_model'); 
				$nuevo = $this->tbl_empleado_crud_model->agregar_empleados($codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo);
				
				$this->index();
				}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$codigo_empleado=$_POST['codigo_empleado'];
				$nombre_completo=$_POST['nombre_completo'];
				$unidad=$_POST['unidad'];
				$usuario_de_red=$_POST['usuario_de_red'];
				$contrasena=$_POST['contrasena'];
				$num_extension=$_POST['num_extension'];
				$correo_electonico=$_POST['correo_electonico'];
				$area=$_POST['area'];
				$cargo=$_POST['cargo'];

				$this->load->model('tbl_empleado_crud_model'); 
				$this->load->view('sorry_view',$data);
			}				
			
		}
	}

	public function editar()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->model('tbl_empleado_crud_model');
			$data['editar_empleado']=$this->tbl_empleado_crud_model->editar_empleado($id_empleado);
			$this->load->view();
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
				$data['editar_empleado']=$this->tbl_empleado_crud_model->editar_empleado($id_empleado);
				$this->load->view();
				}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$this->load->model('tbl_empleado_crud_model');
				$this->load->view('sorry_view',$data);
			}				
			
		}
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
			$id_empleado=$_POST['id_empleado'];
			$codigo_empleado=$_POST['codigo_empleado'];
			$nombre_completo=$_POST['nombre_completo'];
			$unidad=$_POST['unidad'];
			$usuario_de_red=$_POST['usuario_de_red'];
			$contrasena=$_POST['contrasena'];
			$num_extension=$_POST['num_extension'];
			$correo_electonico=$_POST['correo_electonico'];
			$area=$_POST['area'];
			$cargo=$_POST['cargo'];

			$this->load->model('tbl_empleado_crud_model'); 
			$this->tbl_empleado_crud_model->actualizar_empleado($id_empleado,$codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo);
			redirect('empleados/index');
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
		 		$id_empleado=$_POST['id_empleado'];
				$codigo_empleado=$_POST['codigo_empleado'];
				$nombre_completo=$_POST['nombre_completo'];
				$unidad=$_POST['unidad'];
				$usuario_de_red=$_POST['usuario_de_red'];
				$contrasena=$_POST['contrasena'];
				$num_extension=$_POST['num_extension'];
				$correo_electonico=$_POST['correo_electonico'];
				$area=$_POST['area'];
				$cargo=$_POST['cargo'];

				$this->load->model('tbl_empleado_crud_model'); 
				$this->tbl_empleado_crud_model->actualizar_empleado($id_empleado,$codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo);
				redirect('empleados/index');
			}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$id_empleado=$_POST['id_empleado'];
				$codigo_empleado=$_POST['codigo_empleado'];
				$nombre_completo=$_POST['nombre_completo'];
				$unidad=$_POST['unidad'];
				$usuario_de_red=$_POST['usuario_de_red'];
				$contrasena=$_POST['contrasena'];
				$num_extension=$_POST['num_extension'];
				$correo_electonico=$_POST['correo_electonico'];
				$area=$_POST['area'];
				$cargo=$_POST['cargo'];

				$this->load->model('tbl_empleado_crud_model'); 
				$this->load->view('sorry_view',$data);
			}
		}	
	}

	public function eliminar()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->model('tbl_empleado_crud_model');
			$this->tbl_empleado_crud_model->eliminar_empleado($id_empleado);
			redirect('empleados/index');
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
				$this->tbl_empleado_crud_model->eliminar_empleado($id_empleado);
				redirect('empleados/index');
				}
				else{
					$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
					$data['username'] = USER;
					$data['rol'] = ROL;
					$data['get_all'] = $this->permisos_model->get_all();
					$this->load->model('tbl_empleado_crud_model');
					$this->load->view('sorry_view',$data);
				}

		}	
			
	}

	public function detalles($id_empleado)
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			
			$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);
			
			$this->load->view('header_view');
			//$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			//$this->load->view('menu_detalles_empleado_view',$data);
			$this->load->view('contenedor_super_detalles_empleado_view',$data);
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
		 		
		 		$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);
				
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				//$this->load->view('menu_detalles_empleado_view',$data);
				$this->load->view('contenedor_super_detalles_empleado_view',$data);
				$this->load->view('footer_view');
				}
				else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

				$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);
				
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}				
			
		}
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */