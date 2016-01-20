<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carpetas extends CI_Controller {

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
  		$this->load->model('tbl_empleado_crud_model');
  		$this->load->model('tbl_carpetas_crud_model');
  		$this->load->model('tbl_roles_model');
  		/*
  		* Tabla de Roles:
  		* 1.- Super Administrador
  		* 2.- Administrador
  		* 3.- Capturista
  		*/
	}

	public function index()
	{ 
		
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

			$carpetas_geaco06=$_POST['carpetas_geaco06'];
			$carpeta_imagenes=$_POST['carpeta_imagenes'];
			$capacidad_correo=$_POST['capacidad_correo'];
			$otros_servicios=$_POST['otros_servicios'];
			$id_empleado=$_POST['id_empleado'];

			$this->load->model('tbl_carpetas_crud_model'); 
			$nuevo = $this->tbl_carpetas_crud_model->agregar_carpetas($carpetas_geaco06, $carpeta_imagenes, $capacidad_correo, $otros_servicios, $id_empleado);
			
			redirect(base_url('empleados/detalles').'/'.$id_empleado);

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

		 		$carpetas_geaco06=$_POST['carpetas_geaco06'];
				$carpeta_imagenes=$_POST['carpeta_imagenes'];
				$capacidad_correo=$_POST['capacidad_correo'];
				$otros_servicios=$_POST['otros_servicios'];
				$id_empleado=$_POST['id_empleado'];

				$this->load->model('tbl_carpetas_crud_model'); 
				$nuevo = $this->tbl_carpetas_crud_model->agregar_carpetas($carpetas_geaco06, $carpeta_imagenes, $capacidad_correo, $otros_servicios, $id_empleado);
				
				redirect(base_url('empleados/detalles').'/'.$id_empleado);

				}else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

				$carpetas_geaco06=$_POST['carpetas_geaco06'];
				$carpeta_imagenes=$_POST['carpeta_imagenes'];
				$capacidad_correo=$_POST['capacidad_correo'];
				$otros_servicios=$_POST['otros_servicios'];
				$id_empleado=$_POST['id_empleado'];

				$this->load->model('tbl_carpetas_crud_model'); 
				$this->load->view('sorry_view',$data);
			}
		}
		
	}

	public function existe_permiso($id_empleado)
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$this->load->model('tbl_carpetas_crud_model');

			$existe=$this->tbl_carpetas_crud_model->existe_carpetas($id_empleado);

			if ($existe==TRUE) {
				
				$this->load->model('tbl_carpetas_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_permiso_carpetas'] = $this->tbl_carpetas_crud_model->cargar_permiso_carpetas($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				//$this->load->view('menu_detalles_empleado_view',$data);
				//$this->load->view('contenedor_super_detalles_empleado_view',$data);
				$this->load->view('carpetas_empleado_view',$data);
				$this->load->view('footer_view');
			}
			else
			{
				$this->load->model('tbl_carpetas_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_permiso_carpetas'] = $this->tbl_carpetas_crud_model->cargar_permiso_carpetas($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				//$this->load->view('menu_detalles_empleado_view',$data);
				//$this->load->view('contenedor_super_detalles_empleado_view',$data);
				$this->load->view('sin_carpetas_empleado_view',$data);
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

		 			$this->load->model('tbl_carpetas_crud_model');

				$existe=$this->tbl_carpetas_crud_model->existe_carpetas($id_empleado);

				if ($existe==TRUE) {
					
					$this->load->model('tbl_carpetas_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_permiso_carpetas'] = $this->tbl_carpetas_crud_model->cargar_permiso_carpetas($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
					$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
					$this->load->view('header_view');
					//$this->load->view('cabecera_view');
					$this->load->view('menu_view',$data);
					//$this->load->view('menu_detalles_empleado_view',$data);
					//$this->load->view('contenedor_super_detalles_empleado_view',$data);
					$this->load->view('carpetas_empleado_view',$data);
					$this->load->view('footer_view');
				}
				else
				{
					$this->load->model('tbl_carpetas_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_permiso_carpetas'] = $this->tbl_carpetas_crud_model->cargar_permiso_carpetas($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
					$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
					$this->load->view('header_view');
					//$this->load->view('cabecera_view');
					$this->load->view('menu_view',$data);
					//$this->load->view('menu_detalles_empleado_view',$data);
					//$this->load->view('contenedor_super_detalles_empleado_view',$data);
					$this->load->view('sin_carpetas_empleado_view',$data);
					$this->load->view('footer_view');
				}

				}else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

							$this->load->model('tbl_carpetas_crud_model');

				$existe=$this->tbl_carpetas_crud_model->existe_carpetas($id_empleado);

				if ($existe==TRUE) {
					
					$this->load->model('tbl_carpetas_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_permiso_carpetas'] = $this->tbl_carpetas_crud_model->cargar_permiso_carpetas($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
					$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
					$this->load->view('header_view');
					//$this->load->view('cabecera_view');
					$this->load->view('menu_view',$data);
					//$this->load->view('menu_detalles_empleado_view',$data);
					//$this->load->view('contenedor_super_detalles_empleado_view',$data);
					//$this->load->view('carpetas_empleado_view',$data);
					$this->load->view('sorry_view',$data);
					$this->load->view('footer_view');
				}
				else
				{
					$this->load->model('tbl_carpetas_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_permiso_carpetas'] = $this->tbl_carpetas_crud_model->cargar_permiso_carpetas($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
					$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
					$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
					$this->load->view('header_view');
					//$this->load->view('cabecera_view');
					$this->load->view('menu_view',$data);
					//$this->load->view('menu_detalles_empleado_view',$data);
					//$this->load->view('contenedor_super_detalles_empleado_view',$data);
					//$this->load->view('sin_carpetas_empleado_view',$data);
					$this->load->view('sorry_view',$data);
					$this->load->view('footer_view');
				}
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
		
			$id=$_POST['id'];
			$id_empleado=$_POST['id_empleado'];
			$carpetas_geaco06=$_POST['carpetas_geaco06'];
			$carpeta_imagenes=$_POST['carpeta_imagenes'];
			$capacidad_correo=$_POST['capacidad_correo'];
			$otros_servicios=$_POST['otros_servicios'];

			$this->load->model('tbl_carpetas_crud_model'); 
			$this->tbl_carpetas_crud_model->actualizar_carpetas($id,$carpetas_geaco06, $carpeta_imagenes, $capacidad_correo, $otros_servicios);
			redirect(base_url('empleados/detalles').'/'.$id_empleado);
			/*$this->internet_empleado($id_empleado);*/
		}
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

		 		$id=$_POST['id'];
				$id_empleado=$_POST['id_empleado'];
				$carpetas_geaco06=$_POST['carpetas_geaco06'];
				$carpeta_imagenes=$_POST['carpeta_imagenes'];
				$capacidad_correo=$_POST['capacidad_correo'];
				$otros_servicios=$_POST['otros_servicios'];

				$this->load->model('tbl_carpetas_crud_model'); 
				$this->tbl_carpetas_crud_model->actualizar_carpetas($id,$carpetas_geaco06, $carpeta_imagenes, $capacidad_correo, $otros_servicios);
				redirect(base_url('empleados/detalles').'/'.$id_empleado);
				/*$this->internet_empleado($id_empleado);*/

				}else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

				$id=$_POST['id'];
				$id_empleado=$_POST['id_empleado'];
				$carpetas_geaco06=$_POST['carpetas_geaco06'];
				$carpeta_imagenes=$_POST['carpeta_imagenes'];
				$capacidad_correo=$_POST['capacidad_correo'];
				$otros_servicios=$_POST['otros_servicios'];

				$this->load->model('tbl_carpetas_crud_model'); 
				$this->load->view('sorry_view',$data);
			}

		}
	}

	public function carpetas_empleado($id_empleado)
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
		
			$this->load->model('tbl_carpetas_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_permiso_carpetas'] = $this->tbl_carpetas_crud_model->cargar_permiso_carpetas($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
			$this->load->view('header_view');
			//$this->load->view('cabecera_view');
			$this->load->view('menu_view',$data);
			//$this->load->view('menu_detalles_empleado_view',$data);
			//$this->load->view('contenedor_super_detalles_empleado_view',$data);
			$this->load->view('carpetas_empleado_view',$data);
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

		 		$this->load->model('tbl_carpetas_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_permiso_carpetas'] = $this->tbl_carpetas_crud_model->cargar_permiso_carpetas($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				//$this->load->view('menu_detalles_empleado_view',$data);
				//$this->load->view('contenedor_super_detalles_empleado_view',$data);
				$this->load->view('carpetas_empleado_view',$data);
				$this->load->view('footer_view');

				}else{
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();

				$this->load->model('tbl_carpetas_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_permiso_carpetas'] = $this->tbl_carpetas_crud_model->cargar_permiso_carpetas($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
				$this->load->view('header_view');
				//$this->load->view('cabecera_view');
				$this->load->view('menu_view',$data);
				//$this->load->view('menu_detalles_empleado_view',$data);
				//$this->load->view('contenedor_super_detalles_empleado_view',$data);
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');

			}
		}	
	}
}

/* End of file welcome.php */