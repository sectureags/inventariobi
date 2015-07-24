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
	}
	public function index()
	{ 
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
			$this->load->model('tbl_user_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_users'] = $this->tbl_user_crud_model->cargar_users();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
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

	public function crear()
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
			$nombre=$_POST['nombre'];
			$id_tipo=$_POST['id_tipo'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$tel=$_POST['tel'];
			$id_status=$_POST['id_status'];

			$this->load->model('tbl_user_crud_model'); 
			$nuevo = $this->tbl_user_crud_model->agregar_users($nombre, $id_tipo, $username, $password, $email, $tel, $id_status);
			
			/*if ($nuevo==TRUE) {
				$this->users->index();
			}
			else {
				
				echo "DATOS NO INSERTADOS";
			}*/

			$this->index();
		}
	}


	public function editar($id_user)
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
			$this->load->model('tbl_user_crud_model');
			$data['editar_users']=$this->tbl_user_crud_model->editar_users($id_user);
			$this->load->view();
		}
	}

	public function actualizar()
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
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
	}

	public function filtrar_por_rol()
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
			$id_tipo=$_POST['id_tipo']; ///Se recibe la variable id_tipo del formulario que filtra roles en la vista user_view

			$this->load->model('tbl_user_crud_model');
			$data['cargar_users']=$this->tbl_user_crud_model->obtener_rol($id_tipo);
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