<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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

			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->view('header_view');  ///se manda llamar a la vista///
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('home_view');
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
				$this->load->view('header_view');  ///se manda llamar a la vista///
				$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('home_view');
				$this->load->view('footer_view');
			}else{

				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$this->load->view('header_view');  ///se manda llamar a la vista///
				$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}				
			
		}
	}

	public function seguridad()
	{	
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_view');
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
		 		$this->load->view('header_view');
				$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('contenedor_view');
				$this->load->view('footer_view');
			}else{

				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$this->load->view('header_view');
				$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}				
			
		}
	}

	public function bienes_informaticos()
	{	
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_bi_view');
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
		 		$this->load->view('header_view');
				$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('contenedor_bi_view');
				$this->load->view('footer_view');
			}else{

				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$this->load->view('header_view');
				$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}				
			
		}
		
	}

	public function reportes()
	{

	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */