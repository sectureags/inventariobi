<?php
class Tbl_cpu_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_cpu()
	{
		$this->db->from('tbl_cpu');
		$this->db->join('tbl_empleados', 'tbl_cpu.id_empleado=tbl_empleados.id_empleado');
		$this->db->join('status_cpus','tbl_cpu.status=status_cpus.id');
		$res=$this->db->get();
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