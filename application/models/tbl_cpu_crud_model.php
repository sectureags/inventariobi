<?php
class Tbl_cpu_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_cpu()
	{
		$res=$this->db->get('tbl_cpu');
		return $res->result(); 
	}

	public function cargar_cpu_empleado($id_empleado)
	{
		$this->db->from('tbl_cpu');
		$this->db->join('tbl_empleados', 'tbl_cpu.id_empleado=tbl_empleados.id_empleado');
		$this->db->where('tbl_cpu.id_empleado',$id_empleado);
		$res=$this->db->get();
		return $res->result(); 
	}
} 
?>