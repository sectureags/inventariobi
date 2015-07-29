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
			//$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_cpu_view',$data);
			$this->load->view('footer_view');
		}
	}

	public function crear()
	{
		$num_inventario=$_POST['num_inventario'];
		$categoria=$_POST['categoria'];
		$marca=$_POST['marca'];
		$model=$_POST['model'];
		$hostname=$_POST['hostname'];
		$num_serie=$_POST['num_serie'];
		$tipo=$_POST['tipo'];
		$ubicacion=$_POST['ubicacion'];
		$status=$_POST['status'];
		$id_empleado=$_POST['id_empleado'];

		$this->load->model('tbl_cpu_crud_model');
		$this->load->model('tbl_status_cpu_model');
		$data['cargar_status']=$this->tbl_status_cpu_model->cargar_status();
		$nuevo = $this->tbl_cpu_crud_model->agregar_cpu($num_inventario,$categoria,$marca,$modelo,$hostname,$num_serie,$tipo,$ubicacion,$status,$id_empleado);
			
		$this->index();
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

	public function cpu_empleado($id_empleado)
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
			/*$id_empleado=$_POST['id_empleado'];*/

			$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_cpu_empleado'] = $this->tbl_cpu_crud_model->cargar_cpu_empleado($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
			$this->load->view('header_view');
			//$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('menu_detalles_empleado_view',$data);
			$this->load->view('contenedor_super_detalles_empleado_view',$data);
			$this->load->view('cpu_empleado_view',$data);
			/*$this->load->view('contenedor_cpu_empleados_view',$data);*/
			$this->load->view('footer_view');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */