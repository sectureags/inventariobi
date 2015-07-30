<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permisos extends CI_Controller {
	/**
	 * 
	 *
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
		define('SUCCESS',$this->session->userdata('success'));
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
			# code...

			$tipo_rol = $this->input->post('id_tipo');
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->filtro_roles($tipo_rol);
			$this->load->view('header_view');
			//$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_permisos_view',$data);
			//$this->load->view('pie_view');
			$this->load->view('footer_view');
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$tipo_rol = $this->input->post('id_tipo');
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->filtro_roles($tipo_rol);
				$this->load->view('header_view');
				//$this->load->view('cabecera_view',$data);
				$this->load->view('menu_view');
				$this->load->view('contenedor_permisos_view',$data);
				//$this->load->view('pie_view');
				$this->load->view('footer_view');
			}else{

				$tipo_rol = $this->input->post('id_tipo');
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->filtro_roles($tipo_rol);
				$this->load->view('header_view');
				//$this->load->view('cabecera_view',$data);
				$this->load->view('menu_view');
				$this->load->view('sorry_view',$data);
				//$this->load->view('pie_view');
				$this->load->view('footer_view');
				
			}				
			
		}
	}

	public function activar($id = '')
	{
		if ( ! empty($id) ) {

				// Si tienes Rol de SuperAdministrador entras sin permisos
				if (ROL == SUPERROL) {
					# code...
					$data['get_all'] = $this->permisos_model->permitir($id);
					redirect( base_url(COMPONENTE.'/index') );
				}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
				else
				{
					$metodo = $this->uri->segment(2); // Metodo de la URL
					$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
					if ($tiene_permiso == TRUE) {
						// EL USUARIO SI TIENE ACCESO AL METODO
						$data['get_all'] = $this->permisos_model->permitir($id);
						redirect( base_url(COMPONENTE.'/index') );
					}
					else
					{
						$tipo_rol = $this->input->post('id_tipo');
						$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
						$data['username'] = USER;
						$data['rol'] = ROL;
						$data['get_all'] = $this->permisos_model->filtro_roles($tipo_rol);
						$this->load->view('header_view');
						$this->load->view('cabecera_view',$data);
						$this->load->view('menu_view');
						$this->load->view('sorry_view',$data);
						$this->load->view('pie_view');
						$this->load->view('footer_view');
					}
				}
		}else{

			$tipo_rol = $this->input->post('id_tipo');
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->filtro_roles($tipo_rol);
			$this->load->view('header_view');
			$this->load->view('cabecera_view',$data);
			$this->load->view('menu_view');
			$this->load->view('sorry_view',$data);
			$this->load->view('pie_view');
			$this->load->view('footer_view'); 
		}
		
		
	}

	public function desactivar($id = '')
	{
		if ( ! empty($id) ) {

				// Si tienes Rol de SuperAdministrador entras sin permisos
				if (ROL == SUPERROL) {
					# code...
					$data['get_all'] = $this->permisos_model->quitar($id);
					redirect( base_url(COMPONENTE.'/index') );
				}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
				else
				{
					$metodo = $this->uri->segment(2); // Metodo de la URL
					$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
					if ($tiene_permiso == TRUE) {
						$data['get_all'] = $this->permisos_model->quitar($id);
						redirect( base_url(COMPONENTE.'/index') );
					}
					else
					{
						$tipo_rol = $this->input->post('id_tipo');
						$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
						$data['username'] = USER;
						$data['rol'] = ROL;
						$data['get_all'] = $this->permisos_model->filtro_roles($tipo_rol);
						$this->load->view('header_view');
						$this->load->view('cabecera_view',$data);
						$this->load->view('menu_view');
						$this->load->view('sorry_view',$data);
						$this->load->view('pie_view');
						$this->load->view('footer_view');
					}
				}
		}else{

			$tipo_rol = $this->input->post('id_tipo');
			$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->filtro_roles($tipo_rol);
			$this->load->view('header_view');
			$this->load->view('cabecera_view',$data);
			$this->load->view('menu_view');
			$this->load->view('sorry_view',$data);
			$this->load->view('pie_view');
			$this->load->view('footer_view');
		}
		
	}

	public function create()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			$data['username'] = USER;
			$data['rol'] = ROL;
			$crearpermiso = array(
		          'rol' => $this->input->post('id_tipo'),
		          'componente' => $this->input->post('componente'),
		          'recurso' => $this->input->post('recurso'),
		          'permiso' => 1      
		    ); 
		    //Guarda el arreglo de datos en la base de datos
			$agregar = $this->permisos_model->insert_entry($crearpermiso);
			redirect(base_url('permisos/index'), 'refresh');

		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
				$metodo = $this->uri->segment(2); // Metodo de la URL
				$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
				if ($tiene_permiso == TRUE) {
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$crearpermiso = array(
			          'rol' => $this->input->post('id_tipo'),
			          'componente' => $this->input->post('componente'),
			          'recurso' => $this->input->post('recurso'),
			          'permiso' => 1      
			    ); 
			    //Guarda el arreglo de datos en la base de datos
				$agregar = $this->permisos_model->insert_entry($crearpermiso);
				redirect(base_url('permisos/index'), 'refresh');
			}
			else
			{
				$tipo_rol = $this->input->post('id_tipo');
				$data['cargar_roles'] = $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->filtro_roles($tipo_rol);
				$this->load->view('header_view');
				//$this->load->view('cabecera_view',$data);
				$this->load->view('menu_view');
				$this->load->view('sorry_view',$data);
				//$this->load->view('pie_view');
				$this->load->view('footer_view');
			}
		}			


	}


}

