<<<<<<< HEAD
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleados extends CI_Controller {

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
			$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_empleados_view',$data);
			$this->load->view('pie_view');
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
			$codigo_empleado=$_POST['codigo_empleado'];
			$nombre_completo=$_POST['nombre_completo'];
			$unidad=$_POST['unidad'];
			$usuario_de_red=$_POST['usuario_de_red'];
			$contrasena=$_POST['contrasena'];
			$num_extension=$_POST['num_extension'];
			$correo_electonico=$_POST['correo_electonico'];
			$area=$_POST['area'];
			$cargo=$_POST['cargo'];

			$this->load->model('tbl_empleado_crud_model'); 
			$nuevo = $this->tbl_empleado_crud_model->agregar_empleados($codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo);
			
			$this->index();
		}

	}

	public function editar()
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
		$this->load->model('tbl_empleado_crud_model');
		$data['editar_empleado']=$this->tbl_user_crud_model->editar_empleado($id_empleado);
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
		$id_empleado=$_POST['id_empleado'];
		$codigo_empleado=$_POST['codigo_empleado'];
		$nombre_completo=$_POST['nombre_completo'];
		$unidad=$_POST['unidad'];
		$usuario_de_red=$_POST['usuario_de_red'];
		$contrasena=$_POST['contrasena'];
		$num_extension=$_POST['num_extension'];
		$correo_electonico=$_POST['correo_electonico'];
		$area=$_POST['area'];
		$cargo=$_POST['cargo'];

		$this->load->model('tbl_empleado_crud_model'); 
		$this->tbl_empleado_crud_model->actualizar_empleado($id_empleado,$codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo);
		redirect('empleados/');
	}
	}

	public function eliminar()
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
		$id_empleado=$_POST['id_empleado'];
		
		$this->load->model('tbl_empleado_crud_model'); 
		$this->tbl_empleado_crud_model->eliminar_empleado($id_empleado,$codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo);
		
		}
	}

	public function detalles()
	{
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('welcome/logout')); 
		}
		else
		{
			$id_empleado=$_POST['id_empleado'];

			$this->load->model('tbl_cpu_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_cpu_empleado'] = $this->tbl_cpu_crud_model->cargar_cpu_empleado($id_empleado);  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados(); 
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('detalles_empleado_view',$data);
			$this->load->view('pie_view');
			$this->load->view('footer_view');
	}
	}
}

/* End of file welcome.php */
=======
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleados extends CI_Controller {

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
		session_start();
	}

	public function index()
	{ 
			$this->load->model('tbl_empleado_crud_model'); //mando llamar al model 'tbl_user_crud_model' como un tipo include
			$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
			$this->load->view('header_view');
			$this->load->view('cabecera_view');
			$this->load->view('menu_view');
			$this->load->view('contenedor_empleados_view',$data);
			$this->load->view('pie_view');
			$this->load->view('footer_view');
	}

	public function crear()
	{
			$codigo_empleado=$_POST['codigo_empleado'];
			$nombre_completo=$_POST['nombre_completo'];
			$unidad=$_POST['unidad'];
			$usuario_de_red=$_POST['usuario_de_red'];
			$contrasena=$_POST['contrasena'];
			$num_extension=$_POST['num_extension'];
			$correo_electonico=$_POST['correo_electonico'];
			$area=$_POST['area'];
			$cargo=$_POST['cargo'];

			$this->load->model('tbl_empleado_crud_model'); 
			$nuevo = $this->tbl_empleado_crud_model->agregar_empleados($codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo);
			
			$this->index();

	}

	public function editar()
	{
		$this->load->model('tbl_empleado_crud_model');
		$data['editar_empleado']=$this->tbl_user_crud_model->editar_empleado($id_interno);
		$this->load->view();
	}

	public function actualizar()
	{
		$id_interno=$_POST['id_interno'];
		$codigo_empleado=$_POST['codigo_empleado'];
		$nombre_completo=$_POST['nombre_completo'];
		$unidad=$_POST['unidad'];
		$usuario_de_red=$_POST['usuario_de_red'];
		$contrasena=$_POST['contrasena'];
		$num_extension=$_POST['num_extension'];
		$correo_electonico=$_POST['correo_electonico'];
		$area=$_POST['area'];
		$cargo=$_POST['cargo'];

		$this->load->model('tbl_empleado_crud_model'); 
		$this->tbl_empleado_crud_model->actualizar_empleado($id_interno,$codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo);
		redirect('empleados/');
	}

	public function eliminar()
	{
		$id_interno=$_POST['id_interno'];
		$codigo_empleado=$_POST['codigo_empleado'];
		$nombre_completo=$_POST['nombre_completo'];
		$unidad=$_POST['unidad'];
		$usuario_de_red=$_POST['usuario_de_red'];
		$contrasena=$_POST['contrasena'];
		$num_extension=$_POST['num_extension'];
		$correo_electonico=$_POST['correo_electonico'];
		$area=$_POST['area'];
		$cargo=$_POST['cargo']; 

		$this->load->model('tbl_empleado_crud_model'); 
		$this->tbl_empleado_crud_model->eliminar_empleado($id_interno,$codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo);
		redirect('empleados/');
	}
}

/* End of file welcome.php */
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303
/* Location: ./application/controllers/welcome.php */