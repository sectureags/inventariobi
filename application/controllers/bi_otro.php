<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bi_otro extends CI_Controller {

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
		// Si la sesion no tiene datos, redireccionarlo fuera del sistema
		$ci_session= $this->session->userdata('username');
		if (empty($ci_session)===TRUE) {
			redirect(base_url('entrar')); 
		}
		// Se Definen constantes para facilitar la programacion
		define("SUPERROL", 1); // "SuperAdministrador"
		define('ROL',$this->session->userdata('rol'));
	    define('COMPONENTE',$this->uri->segment(1));
	    define('USER',$this->session->userdata('username'));
	    define('TITULO',"OTROS");
	    //
	    $this->load->model('permisos_model');
  		$this->load->model('tbl_otro_crud_model');
  		$this->load->model('tbl_empleado_crud_model');
  		$this->load->model('tbl_roles_model');
  		/*
  		* Tabla de Roles:
  		* 1.- Super Administrador
  		* 2.- Administrador
  		* 3.- Capturista
  		*/
	}

	public function index($id_otro = false)
	{ 
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['title'] = TITULO;
			$data['get_all'] = $this->permisos_model->get_all();

			$data['fields'] = $this->db->list_fields('tbl_otro');
			
			$data['cargar_lista_otros'] = $this->tbl_otro_crud_model->lista($id_otro);
			
			$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();
			
			$this->load->view('header_view');
			$this->load->view('menu_view',$data);
			$this->load->view('otro_view',$data);
			$this->load->view('footer_view');
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();

		 		$data['fields'] = $this->db->list_fields('tbl_otro');

		 		$data['cargar_lista_otros'] = $this->tbl_otro_crud_model->lista();  //aqui ejecuto el metodo 'cargar_users' de la clase ''tbla_user_crud_model
				
				$data['cargar_empleados'] = $this->tbl_empleado_crud_model->cargar_empleados();

				$this->load->view('header_view');
				$this->load->view('menu_view',$data);
				$this->load->view('otro_view',$data);
				$this->load->view('footer_view');
			}else{
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
			
				$this->load->view('header_view');
				$this->load->view('menu_view',$data);
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}
		}
	}

	public function crear()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$data['title'] = TITULO;

			$otro = array(
				'ubicacion' => $this->input->post('ubicacion'),
				'tipo' => $this->input->post('tipo'),
				'marca' => $this->input->post('marca'),
				'modelo' => $this->input->post('modelo'),
				'num_serie' => $this->input->post('num_serie'),
				'num_inventario' => $this->input->post('num_inventario'),
				'id_empleado' => $this->input->post('id_empleado'),
				'status' => $this->input->post('status')
			);			

			$nuevo = $this->tbl_otro_crud_model->agrega($otro);

			if ( isset($nuevo) && is_int($nuevo) > 0 ) {
				redirect(base_url('otros'));
			}

				show_404();			
			
			//$this->index();
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$data['title'] = TITULO;	
				
				$otro = array(
					'ubicacion' => $this->input->post('ubicacion'),
					'tipo' => $this->input->post('tipo'),
					'marca' => $this->input->post('marca'),
					'modelo' => $this->input->post('modelo'),
					'num_serie' => $this->input->post('num_serie'),
					'num_inventario' => $this->input->post('num_inventario'),
					'id_empleado' => $this->input->post('id_empleado'),
					'status' => $this->input->post('status')
				);			

				$nuevo = $this->tbl_otro_crud_model->agrega($otro);

				if ( isset($nuevo) && is_int($nuevo) > 0 ) {
					
					redirect(base_url('otros'));

				}

				show_404();			

				}else{
				
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$data['title'] = TITULO;

		 		$this->load->view('header_view');
				$this->load->view('menu_view',$data);
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}
		}
	}

	public function actualizar()
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$data['title'] = TITULO;

			$otro = array(
				'id_otro' => $this->input->post('id_otro'),
				'ubicacion' => $this->input->post('ubicacion'),
				'tipo' => $this->input->post('tipo'),
				'marca' => $this->input->post('marca'),
				'modelo' => $this->input->post('modelo'),
				'num_serie' => $this->input->post('num_serie'),
				'num_inventario' => $this->input->post('num_inventario'),
				'id_empleado' => $this->input->post('id_empleado'),
				'status' => $this->input->post('status')
			);

			$modificado = $this->tbl_otro_crud_model->actualiza($otro);

			if ( isset($modificado) && is_bool($modificado) == TRUE ) {
				
				redirect(base_url('otros'));

			}

				show_404();			
			
			//$this->index();
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
				
				// EL USUARIO SI TIENE ACCESO AL METODO
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$data['title'] = TITULO;

				$otro = array(
					'id_otro' => $this->input->post('id_otro'),
					'ubicacion' => $this->input->post('ubicacion'),
					'tipo' => $this->input->post('tipo'),
					'marca' => $this->input->post('marca'),
					'modelo' => $this->input->post('modelo'),
					'num_serie' => $this->input->post('num_serie'),
					'num_inventario' => $this->input->post('num_inventario'),
					'id_empleado' => $this->input->post('id_empleado'),
					'status' => $this->input->post('status')
				);			

				$modificado = $this->tbl_otro_crud_model->actualiza($otro);

				if ( isset($modificado) && is_bool($modificado) == TRUE ) {
					
					redirect(base_url('otros'));

				}

					show_404();			

				}else{
				
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$data['title'] = TITULO;

		 		$this->load->view('header_view');
				$this->load->view('menu_view',$data);
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}
		}
	}

	public function eliminar($id_otro = false)
	{
		// Si tienes Rol de SuperAdministrador entras sin permisos
		if (ROL == SUPERROL) {

			$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
			$data['username'] = USER;
			$data['rol'] = ROL;
			$data['get_all'] = $this->permisos_model->get_all();
			$data['title'] = TITULO;

			$otro = array('id_otro' => $id_otro);

			$eliminado = $this->tbl_otro_crud_model->elimina($otro);

			if ( isset($eliminado) && is_bool($eliminado) == TRUE ) {
				
				redirect(base_url('otros'));

			}

				show_404();			
			
			//$this->index();
		}// Pero si no eres SuperAdministrador, te vamos a verificar tus permisos de acceso al Controler y Metodo
		else
		{
			$metodo = $this->uri->segment(2); // Metodo de la URL
			$tiene_permiso = $this->permisos_model->verify_metodo(ROL,COMPONENTE,$metodo);
			if ($tiene_permiso == TRUE) {
			// SI EL USUARIO TIENE ACCESO AL METODO
			
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
				$data['get_all'] = $this->permisos_model->get_all();
				$data['title'] = TITULO;

				$otro = array('id_otro' => $id_otro);

				$eliminado = $this->tbl_otro_crud_model->elimina($otro);

				if ( isset($eliminado) && is_bool($eliminado) == TRUE ) {
					
					redirect(base_url('otros'));

				}

					show_404();			

				}else{
				
				$data['cargar_roles']= $this->tbl_roles_model->cargar_roles();
				$data['username'] = USER;
				$data['rol'] = ROL;
		 		$data['get_all'] = $this->permisos_model->get_all();
		 		$data['title'] = TITULO;

		 		$this->load->view('header_view');
				$this->load->view('menu_view',$data);
				$this->load->view('sorry_view',$data);
				$this->load->view('footer_view');
			}
		}
	}

}
/* End of file bi_dd.php */
/* Location: ./application/controllers/bi_dd.php */