<<<<<<< HEAD
<?php
class Tbl_user_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	function verify_user($username,$password)
	{
		//verifica que este registrado un usuario en la base de datos tomando como parametros username 
		//y password regresando una respuesta V or F

		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->limit(1);

		$res=$this->db->get('tbl_user');

		if ($res->num_rows>0) {
			return TRUE;
		}else
		{
			return FALSE;
		}
	}

	function verify_rol($username,$password)

	//Se obtiene el tipo de rol para identificar el mismo y dar los permisos de 
	//acceso aL sistema
	{
		$this->db->select('id_tipo');
		$this->db->where('username',$username);
		$this->db->where('password',$password); 

		$tipo_r=$this->db->get('tbl_user');
		if ($tipo_r->num_rows>0) 
		{
			return $tipo_r->row();
		}else
		{
			FALSE;
		}
	}   //Obtiene el tipo de rol          /////////////DARME DE ALTA EN TRELLO/////////////

} 
=======
<?php
class Tbl_user_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	function verify_user($username,$password)
	{
		//verifica que este registrado un usuario en la base de datos tomando como parametros username 
		//y password regresando una respuesta V or F

		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->limit(1);

		$res=$this->db->get('tbl_user');

		if ($res->num_rows>0) {
			return TRUE;
		}else
		{
			return FALSE;
		}
	}

	function verify_rol($username,$password)

	//Se obtiene el tipo de rol para identificar el mismo y dar los permisos de 
	//acceso aL sistema
	{
		$this->db->select('id_tipo');
		$this->db->where('username',$username);
		$this->db->where('password',$password); 

		$tipo_r=$this->db->get('tbl_user');
		if ($tipo_r->num_rows>0) 
		{
			return $tipo_r->row();
		}else
		{
			FALSE;
		}
	}   //Obtiene el tipo de rol          /////////////DARME DE ALTA EN TRELLO/////////////

} 
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303
?>