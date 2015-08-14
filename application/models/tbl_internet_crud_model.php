<?php
class Tbl_internet_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_internet()
	{
		$res=$this->db->get('tbl_permiso_internet');
		return $res->result(); 
	}

	public function cargar_permiso_internet($id_empleado)
	{
		$this->db->from('tbl_permiso_internet');
		$this->db->join('tbl_empleados', 'tbl_permiso_internet.id_empleado=tbl_empleados.id_empleado');
		$this->db->where('tbl_permiso_internet.id_empleado',$id_empleado);
		$res=$this->db->get();
		return $res->result(); 
	}

	public function agregar_internet($internet, $messenger, $redes_sociales, $ftp, $sigue, $permiso_usuario_local,$tipo_cuenta_ws,$id_empleado)
	{
		$data=array('internet' => $internet,
					'messenger' => $messenger,
					'redes_sociales' => $redes_sociales,
					'ftp' => $ftp,'sigue'=>$sigue,
					'permiso_usuario_local' => $permiso_usuario_local,
					'tipo_cuenta_ws'=>$tipo_cuenta_ws,
					'id_empleado'=>$id_empleado
		);
		
		$nuevo = $this->db->insert('tbl_permiso_internet', $data);

	}

	public function actualizar_internet($id,$internet, $messenger, $redes_sociales, $ftp, $sigue, $permiso_usuario_local, $tipo_cuenta_ws)
	{
		$data=array('internet' => $internet,
					'messenger' => $messenger,
					'redes_sociales' => $redes_sociales,
					'ftp' => $ftp,
					'sigue'=>$sigue,
					'permiso_usuario_local' => $permiso_usuario_local,
					'tipo_cuenta_ws'=> $tipo_cuenta_ws
		);
		$this->db->where('id',$id);
		$this->db->update('tbl_permiso_internet',$data);
		
	}


	public function existe_internet($id_empleado)
	{
		$this->db->select('*');
		$this->db->join('tbl_empleados', 'tbl_permiso_internet.id_empleado=tbl_empleados.id_empleado');
		$this->db->where('tbl_permiso_internet.id_empleado',$id_empleado);
		$this->db->limit(1);
		$res=$this->db->get('tbl_permiso_internet');

		if ($res->num_rows>0) {
			return TRUE;
		}else
		{
			return FALSE;
		}
	}
} 
?>