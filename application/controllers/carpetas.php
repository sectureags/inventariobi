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
	}

	public function index()
	{ 
		
	}

	public function crear()
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
			$carpetas_geaco06=$_POST['carpetas_geaco06'];
			$carpeta_imagenes=$_POST['carpeta_imagenes'];
			$carpeta_excellentia=$_POST['carpeta_excellentia'];
			$capacidad_correo=$_POST['capacidad_correo'];
			$otros_servicios=$_POST['otros_servicios'];

			$this->load->model('tbl_carpetas_crud_model'); 
			$nuevo = $this->tbl_carpetas_crud_model->agregar_carpetas($carpetas_geaco06, $carpeta_imagenes, $carpeta_excellentia, $capacidad_correo, $otros_servicios);
			
			redirect(base_url('carpetas/carpetas_empleado').'/'.$id_empleado);
		}
	}

	public function existe_permiso($id_empleado)
	{
		$ci_session= $this->session->userdata('user_data');
		if (empty($ci_session)===FALSE) {
			redirect('welcome/logout');
		}

		$this->load->model('tbl_carpetas_crud_model');

		$existe=$this->tbl_carpetas_crud_model->existe_carpetas($id_empleado);

		if ($existe==TRUE) {
			
			$this->load->model('tbl_carpetas_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_permiso_carpetas'] = $this->tbl_carpetas_crud_model->cargar_permiso_carpetas($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
			$this->load->view('header_view');
			//$this->load->view('cabecera_view');
			$this->load->view('menu_view');
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
			$this->load->view('menu_view');
			//$this->load->view('menu_detalles_empleado_view',$data);
			//$this->load->view('contenedor_super_detalles_empleado_view',$data);
			$this->load->view('sin_carpetas_empleado_view',$data);
			$this->load->view('footer_view');
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
		$carpetas_geaco06=$_POST['carpetas_geaco06'];
		$carpeta_imagenes=$_POST['carpeta_imagenes'];
		$carpeta_excellentia=$_POST['carpeta_excellentia'];
		$capacidad_correo=$_POST['capacidad_correo'];
		$otros_servicios=$_POST['otros_servicios'];

		$this->load->model('tbl_carpetas_crud_model'); 
		$this->tbl_carpetas_crud_model->actualizar_carpetas($id,$carpetas_geaco06, $carpeta_imagenes, $carpeta_excellentia, $capacidad_correo, $otros_servicios);
		redirect(base_url('carpetas/carpetas_empleado').'/'.$id_empleado);
		/*$this->internet_empleado($id_empleado);*/
		}
	}

	public function carpetas_empleado($id_empleado)
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{

			$this->load->model('tbl_carpetas_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_permiso_carpetas'] = $this->tbl_carpetas_crud_model->cargar_permiso_carpetas($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_empleado_detalles'] = $this->tbl_empleado_crud_model->cargar_empleado_detalles($id_empleado);  
			$this->load->view('header_view');
			//$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			//$this->load->view('menu_detalles_empleado_view',$data);
			//$this->load->view('contenedor_super_detalles_empleado_view',$data);
			$this->load->view('carpetas_empleado_view',$data);
			$this->load->view('footer_view');
		}
	}
}

/* End of file welcome.php */