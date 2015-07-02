<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		if (isset($_SESSION['username'])==NULL)
		{ 	
			$this->load->view('login_view');
			
		}
		
			
			$this->load->model('tbl_user_model');

		$username=$this->input->post('username');
		$password=$this->input->post('password');

		$existe=$this->tbl_user_model->verify_user($username,$password);
		if ($existe==TRUE) {
			///llamar al metodo para el tipo de rol para saber a donde tendra permisos de navegacion////
			$reg_rol = $this->tbl_user_model->verify_rol($username,$password);//me guarda el areglo de verify_rol, llamo a la clase tbl_user_model y al metodo

			if ($reg_rol != FALSE) {
				
				///foreach entro al arreglo y valido///
				foreach ($reg_rol as $key => $value) {
					if ($key == 'id_tipo') {
						$id_tipo = $value;

					}

					////aqui poner algo para que no ocurra el error////
				}

				switch ($id_tipo) 
					{
					 	case '1'://Rol SuperAdministrador
					 		$_SESSION['username'] = $username;
					 		$_SESSION['rol'] = 'SuperAdministrador';
					 		redirect('home/');
					 	break;

					 	case '2'://Rol Administrador
					 		$_SESSION['username'] = $username;
					 		$_SESSION['rol'] = 'Administrador';
					 		redirect('home/');
					 	break;

					 	case '3'://Rol Capturista
					 		$_SESSION['username'] = $username;
					 		$_SESSION['rol'] = 'Capturista';
					 		redirect('home/');
					 	break;
					 	
					 	default:
					 	echo "El rol no existe. Solicitalo a tu Administrador";
					 		redirect('welcome/logout','refresh');
					 		
					 	break;
					 }


			}

			echo "No tienes un rol asignado. Solicitalo a tu Administrador";




			
		}else{

		echo "No existes en la Base de datos. Ve con tu administrador";
		
		}
		
		
		redirect(base_url('welcome/logout'));

	}

	public function logout()
	{
		//Valida que exista la variable $_session y que la variable no sea nula.
		//Posteriormente lo que haya en la variable lo pone nulo y destuye la session.
		if (isset($_SESSION['rol '])) 
		{
			unset(
				$_SESSION['rol'],
				$_SESSION['username']
				);
			session_destroy();
		}

		//if (isset($_SESSION['username'])) {
		//	$this->session->session_destroy();
		//}
		

		//$this->session->unset($_SESSION['username']);
		//$this->session->unset($_SESSION['rol']);
			
			$this->load->view('login_view');
			
		//$this->index();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */