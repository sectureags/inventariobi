<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permisos extends CI_Controller {

	/**
	 * 
	 *
	 */
	define('SUPERROL', '1'); // "SuperAdministrador"
    
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
		define('ROL',$this->session->userdata('rol'));
	    define('COMPONENTE',$this->uri->segment(1));
	    define('USER',strstr($this->session->userdata('username'),'@',true));
	    //
  		$this->load->model('permisos_model');


	}

	public function index()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL === SUPERROL) {
			# code...
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_permisos_view');
			$this->load->view('pie_view');
			$this->load->view('footer_view');
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$recurso = $this->uri->segment(2); // Metodo de la URL
			$resource = $this->permisos_model->verify_recursos(ROL,COMPONENTE,$recurso);

			if ($resource === TRUE) {

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

	public function crear()
	{
		
	}

}

