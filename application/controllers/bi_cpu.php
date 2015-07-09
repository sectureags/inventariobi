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
	}

	public function index()
	{ 
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
			$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_cpu'] = $this->tbl_cpu_crud_model->cargar_cpu();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_cpu_view',$data);
			$this->load->view('pie_view');
			$this->load->view('footer_view');
		}
	}

	public function crear()
	{

	}

	public function editar()
	{
		
	}

	public function actualizar()
	{
		
	}

	public function eliminar()
	{
		
	}

	public function detalles()
	{
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */