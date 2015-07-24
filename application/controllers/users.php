<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
  		$this->load->model('tbl_user_crud_model');
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
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->model('tbl_user_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_users'] = $this->tbl_user_crud_model->cargar_users();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			$data['cargar_users_lista'] = $this->tbl_user_crud_model->cargar_lista();
			$this->load->model('tbl_roles_model');
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_users_view',$data);
			$this->load->view('footer_view');
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
				$this->load->model('tbl_user_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_users'] = $this->tbl_user_crud_model->cargar_users();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				$data['cargar_users_lista'] = $this->tbl_user_crud_model->cargar_lista();
				$this->load->model('tbl_roles_model');
				$this->load->view('header_view');
				$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('contenedor_users_view',$data);
				$this->load->view('footer_view');
			}else{
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
				$this->load->model('tbl_user_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
				$data['cargar_users'] = $this->tbl_user_crud_model->cargar_users();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				$data['cargar_users_lista'] = $this->tbl_user_crud_model->cargar_lista();
				$this->load->model('tbl_roles_model');
				$this->load->view('header_view');
				$this->load->view('cabecera_view');
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

			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$nombre=$_POST['nombre'];
			$id_tipo=$_POST['id_tipo'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$tel=$_POST['tel'];
			$id_status=$_POST['id_status'];

			$this->load->model('tbl_user_crud_model'); 
			$nuevo = $this->tbl_user_crud_model->agregar_users($nombre, $id_tipo, $username, $password, $email, $tel, $id_status);
			
			
			$this->index();
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$nombre=$_POST['nombre'];
				$id_tipo=$_POST['id_tipo'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$email=$_POST['email'];
				$tel=$_POST['tel'];
				$id_status=$_POST['id_status'];

				$this->load->model('tbl_user_crud_model'); 
				$nuevo = $this->tbl_user_crud_model->agregar_users($nombre, $id_tipo, $username, $password, $email, $tel, $id_status);
				
				
				$this->index();
				}else{
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$nombre=$_POST['nombre'];
				$id_tipo=$_POST['id_tipo'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$email=$_POST['email'];
				$tel=$_POST['tel'];
				$id_status=$_POST['id_status'];

				$this->load->model('tbl_user_crud_model'); 
				$this->load->view('sorry_view',$data);
			}
		}
	}


	public function editar($id_user)
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->model('tbl_user_crud_model');
			$data['editar_users']=$this->tbl_user_crud_model->editar_users($id_user);
			$this->load->view();
			}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$this->load->model('tbl_user_crud_model');
				$data['editar_users']=$this->tbl_user_crud_model->editar_users($id_user);
				$this->load->view();
				}
				else{
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$this->load->model('tbl_user_crud_model');
				$this->load->view('sorry_view',$data);
			}
		}
		
	}

	public function actualizar()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$id_user=$_POST['id_user'];
			$nombre=$_POST['nombre'];
			$id_tipo=$_POST['id_tipo'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$tel=$_POST['tel'];
			$id_status=$_POST['id_status'];

			$this->load->model('tbl_user_crud_model'); 
			$this->tbl_user_crud_model->actualizar_users($id_user,$nombre, $id_tipo, $username, $password, $email, $tel, $id_status);
			redirect('users/index');
			}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$id_user=$_POST['id_user'];
				$nombre=$_POST['nombre'];
				$id_tipo=$_POST['id_tipo'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$email=$_POST['email'];
				$tel=$_POST['tel'];
				$id_status=$_POST['id_status'];

				$this->load->model('tbl_user_crud_model'); 
				$this->tbl_user_crud_model->actualizar_users($id_user,$nombre, $id_tipo, $username, $password, $email, $tel, $id_status);
				redirect('users/index');
				}
				else{
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
				$id_user=$_POST['id_user'];
				$nombre=$_POST['nombre'];
				$id_tipo=$_POST['id_tipo'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$email=$_POST['email'];
				$tel=$_POST['tel'];
				$id_status=$_POST['id_status'];

				$this->load->model('tbl_user_crud_model'); 
				$this->load->view('sorry_view',$data);
			}
		}		
	}

	public function filtrar_por_rol()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();

			$id_tipo=$_POST['id_tipo']; ///Se recibe la variable id_tipo del formulario que filtra roles en la vista user_view

			$this->load->model('tbl_user_crud_model');
			$data['cargar_users']=$this->tbl_user_crud_model->obtener_rol($id_tipo);
			$data['cargar_users_lista'] = $this->tbl_user_crud_model->cargar_lista();
			$this->load->model('tbl_roles_model');
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_users_view',$data);
			$this->load->view('footer_view');
			}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

		 		$id_tipo=$_POST['id_tipo']; ///Se recibe la variable id_tipo del formulario que filtra roles en la vista user_view

				$this->load->model('tbl_user_crud_model');
				$data['cargar_users']=$this->tbl_user_crud_model->obtener_rol($id_tipo);
				$data['cargar_users_lista'] = $this->tbl_user_crud_model->cargar_lista();
				$this->load->model('tbl_roles_model');
				$this->load->view('header_view');
				$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('contenedor_users_view',$data);
				$this->load->view('footer_view');
				}
				else{
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$id_tipo=$_POST['id_tipo']; ///Se recibe la variable id_tipo del formulario que filtra roles en la vista user_view

				$this->load->model('tbl_user_crud_model');
				$data['cargar_users']=$this->tbl_user_crud_model->obtener_rol($id_tipo);
				$data['cargar_users_lista'] = $this->tbl_user_crud_model->cargar_lista();
				$this->load->model('tbl_roles_model');
				$this->load->view('header_view');
				$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}
		}	
	}

	public function filtrar_por_usuario()
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
			$id_user=$_POST['id_user']; ///Se recibe la variable id_tipo del formulario que filtra roles en la vista user_view
	 
			$this->load->model('tbl_user_crud_model');
			$data['cargar_users']=$this->tbl_user_crud_model->obtener_usuario($id_user);
			$data['cargar_users_lista'] = $this->tbl_user_crud_model->cargar_lista(); 
			$this->load->model('tbl_roles_model');
			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_users_view',$data);
			$this->load->view('footer_view');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */