<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Internet extends CI_Controller {

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
		
	}

	public function crear()
	{

	}

	public function exixte()
	{
		$ci_session= $this->session->userdata('user_data');
		if (empty($ci_session)===FALSE) {
			redirect('welcome/logout');
		}

		$this->load->model('tbl_internet_crud_model');

		$existe=$this->tbl_internet_crud_model->existe_internet();
		if ($existe==TRUE) {
			
			$this->internet_empleado();
	
		}else{

		echo "No existes en la Base de datos. Ve con tu administrador";
		//redirect('welcome/logout');
		}
	}

	public function editar()
	{

	}

	public function actualizar()
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
		$id=$_POST['id'];
		$id_empleado=$_POST['id_empleado'];
		$internet=$_POST['internet'];
		$messenger=$_POST['messenger'];
		$redes_sociales=$_POST['redes_sociales'];
		$ftp=$_POST['ftp'];
		$sigue=$_POST['sigue'];
		$permiso_usuario_local=$_POST['permiso_usuario_local'];

		$this->load->model('tbl_internet_crud_model'); 
		$this->tbl_internet_crud_model->actualizar_internet($id,$internet, $messenger, $redes_sociales, $ftp,$sigue, $permiso_usuario_local);
		redirect(base_url('internet/internet_empleado').'/'.$id_empleado);
		/*$this->internet_empleado($id_empleado);*/
		}
	}

	public function internet_empleado($id_empleado)
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{

			$this->load->model('tbl_internet_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_permiso_internet'] = $this->tbl_internet_crud_model->cargar_permiso_internet($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('menu_detalles_empleado_view',$data);
			$this->load->view('contenedor_super_detalles_empleado_view',$data);
			$this->load->view('internet_empleado_view',$data);
			$this->load->view('footer_view');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */