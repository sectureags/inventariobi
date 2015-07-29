<?php
class Tbl_empleado_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_empleados()
	{
		$res=$this->db->get('tbl_empleados');
		return $res->result(); 

	}

	public function agregar_empleados($codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo)
	{
		$data=array('codigo_empleado' => $codigo_empleado,
					'nombre_completo' => $nombre_completo,
					'unidad' => $unidad,
					'usuario_de_red' => $usuario_de_red,
					'contrasena' => $contrasena,
					'area' => $area,
					'num_extension' => $num_extension, 
					'correo_electonico'=>$correo_electonico,
					'cargo' => $cargo);
		$nuevo = $this->db->insert('tbl_empleados', $data);

	}

	public function editar_empleado($id_empleado)
	{
		$this->db->select('*');
		$this->db->where('id_empleado',$id_empleado);
		$this->db->limit(1);
		$res=$this->db->get('tbl_empleados');
		return $res->result();
	}

	public function actualizar_empleado($id_empleado,$codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo)
	{
		$data=array('codigo_empleado' => $codigo_empleado,
					'nombre_completo' => $nombre_completo,
					'unidad' => $unidad,
					'usuario_de_red' => $usuario_de_red,
					'contrasena' => $contrasena,
					'area' => $area,
					'num_extension' => $num_extension, 
					'correo_electonico'=>$correo_electonico, 
					'cargo' => $cargo);
		$this->db->where('id_empleado',$id_empleado);
		$this->db->update('tbl_empleados',$data);
		
	}

	public function eliminar_empleado($id_empleado)
	{
		$data=array('id_empleado' => $id_empleado);
		$this->db->where('id_empleado',$id_empleado);
		$this->db->delete('tbl_empleados',$data); 
	}


	public function cargar_empleado_detalles($id_empleado)
	{
		$this->db->select('*');
		$this->db->where('id_empleado',$id_empleado);
		$this->db->limit(1);
		$res=$this->db->get('tbl_empleados');
		return $res->result(); 
	}
} 

?>