<?php
class Tbl_user_crud_model extends CI_Model
{
	var $id_user='';
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_users()
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->join('tbl_tipo_rol', 'tbl_tipo_rol.id_tipo=tbl_user.id_tipo');
		$res=$this->db->get();
		return $res->result(); 

	}

	public function cargar_lista()
	{
		
		$res=$this->db->get('tbl_user');
		return $res->result(); 

	}

	public function editar_users($id_user)
	{
		$this->db->select('*');
		$this->db->where('id_user',$id_user);
		$this->db->limit(1);
		$res=$this->db->get('tbl_user');
		return $res->result();
	}

	public function agregar_users($nombre, $id_tipo, $username, $password, $email, $tel, $id_status)
	{
		$data = array('nombre' => $nombre,
					  'id_tipo' => $id_tipo,
					  'username' => $username,
					  'password' => $password,
					  'email' => $email,
					  'tel' => $tel,
					  'id_status' => $id_status
		);
		
		$nuevo = $this->db->insert('tbl_user', $data);

		/*if ($nuevo->num_rows>0) {
			return TRUE;
		}else
		{
			return FALSE;
		}*/
	}

	public function actualizar_users($id_user,$nombre, $id_tipo, $username, $password, $email, $tel, $id_status)
	{
		$data=array('nombre' => $nombre,
					'id_tipo' => $id_tipo,
					'username' => $username,
					'password' => $password,
					'email' => $email,
					'tel' => $tel,
					'id_status' => $id_status
		);
		$this->db->where('id_user',$id_user);
		$this->db->update('tbl_user',$data);
		
	}

	public function obtener_rol($id_tipo)
	{
		
		$this->db->from('tbl_user');
		$this->db->join('tbl_tipo_rol', 'tbl_tipo_rol.id_tipo=tbl_user.id_tipo');
		$this->db->where('tbl_user.id_tipo',$id_tipo);
		$res=$this->db->get();
		return $res->result(); 
	}

	public function obtener_usuario($id_user)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->join('tbl_tipo_rol', 'tbl_tipo_rol.id_tipo=tbl_user.id_tipo');
		$this->db->where('tbl_user.id_user',$id_user);
		$res=$this->db->get();
		return $res->result(); 
	}

} 

?>