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
	    define('COMPONENTE',$this->uri->segment(1));
	    define('USER',$this->session->userdata('username'));
	    //
  		$this->load->model('permisos_model');
	}

	public function index()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			# code...
			$data['get_all'] = $this->permisos_model->get_all();
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_permisos_view',$data);
			$this->load->view('pie_view');
			$this->load->view('footer_view');
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$recurso = $this->uri->segment(2); // Metodo de la URL
			$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);
			if ($resource === TRUE) {
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
				$this->load->view('header_view');
				$this->load->view('cabecera_view');
				$this->load->view('menu_view');
				$this->load->view('contenedor_permisos_view',$data);
				$this->load->view('pie_view');
				$this->load->view('footer_view');					
			}
			else
			{
				echo "<p><a href='#' onclick='history.back();'>REGRESAR</a></p>";
				die("No tiene permisos para leer este recurso. Solicite ayuda con el administrador del Sistema."); 
			}
		}
	}

	public function activar()
	{
		
	}

	public function desactivar()
	{
		
	}

	public function eliminar()
	{
		
	}

	public function editar()
	{
		
	}

	public function create()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {
			
			$agregar = $this->permisos_model->insert_entry();
			//Guarda el registro en la base de datos
			echo "<strong>CREANDO PERMISO...</strong>!";
			redirect(base_url('permisos/index'), 'refresh');

		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$recurso = $this->uri->segment(2); // Metodo de la URL
			$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

			if ($resource === TRUE) {

		 		$agregar = $this->permisos_model->insert_entry();
				//Guarda el registro en la base de datos
				echo "<strong>CREANDO PERMISO...</strong>!";
				redirect(base_url('permisos/index'), 'refresh');
			}
			else
			{
				echo "<p><a href='#' onclick='history.back();'>REGRESAR</a></p>";
				die("No tiene permisos para leer este recurso. Solicite ayuda con el administrador del Sistema."); 
			}
		}			


	}


}

