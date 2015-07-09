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
<<<<<<< HEAD
		$this->load->library('session');
		$this->load->library('encrypt');
=======
		session_start();
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303
	}

	public function index()
	{
<<<<<<< HEAD
		$ci_session= $this->session->userdata('user_data');
		if (empty($ci_session)===FALSE) {
			redirect('welcome/logout');
		}
			
		$this->load->model('tbl_user_model');
=======
		if (isset($_SESSION['username'])==NULL)
		{ 	
			$this->load->view('login_view');
			
		}
		
			
			$this->load->model('tbl_user_model');
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303

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
<<<<<<< HEAD
							$newdata= array(
								'username' => $username, 
								'rol' => $id_tipo,
								'id_status' => 1,
								'logged_in'=> TRUE);
							$this->session->set_userdata($newdata);
							$this->input->set_cookie($newdata);
=======
					 		$_SESSION['username'] = $username;
					 		$_SESSION['rol'] = 'SuperAdministrador';
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303
					 		redirect('home/');
					 	break;

					 	case '2'://Rol Administrador
<<<<<<< HEAD
					 		$newdata= array(
								'username' => $username, 
								'rol' => $id_tipo,
								'id_status' => 1,
								'logged_in'=> TRUE);
							$this->session->set_userdata($newdata);
							$this->input->set_cookie($newdata);
=======
					 		$_SESSION['username'] = $username;
					 		$_SESSION['rol'] = 'Administrador';
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303
					 		redirect('home/');
					 	break;

					 	case '3'://Rol Capturista
<<<<<<< HEAD
					 		$newdata= array(
								'username' => $username, 
								'rol' => $id_tipo,
								'id_status' => 1,
								'logged_in'=> TRUE);
							$this->session->set_userdata($newdata);
							$this->input->set_cookie($newdata);
=======
					 		$_SESSION['username'] = $username;
					 		$_SESSION['rol'] = 'Capturista';
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303
					 		redirect('home/');
					 	break;
					 	
					 	default:
					 	echo "El rol no existe. Solicitalo a tu Administrador";
<<<<<<< HEAD
					 		//redirect('welcome/logout');
=======
					 		redirect('welcome/logout','refresh');
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303
					 		
					 	break;
					 }


			}

			echo "No tienes un rol asignado. Solicitalo a tu Administrador";
<<<<<<< HEAD
	
		}else{

		echo "No existes en la Base de datos. Ve con tu administrador";
		//redirect('welcome/logout');
		}
		
		
		
=======




			
		}else{

		echo "No existes en la Base de datos. Ve con tu administrador";
		
		}
		
		
		redirect(base_url('welcome/logout'));
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303

	}

	public function logout()
	{
<<<<<<< HEAD
		$ci_session= $this->session->userdata('user_data');
		if (empty($ci_session)===TRUE) {
			$newdata= array(
				'username' => '', 
				'rol' => '',
				'id_status' => '',
				'logged_in'=> FALSE);
			$this->session->unset_userdata($newdata);
			$this->session->sess_destroy();
		}
			//redirect('welcome/');
			$this->load->view('login_view');
			
=======
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
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */