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

	public function num_inventario_todos(){
		$this->db->select('num_inventario');
		$res=$this->db->get('tbl_cpu');
		return $res->result();
	}

	public function cargar_cpu_empleado($id_empleado)
	{
		$this->db->from('tbl_cpu');
		$this->db->join('tbl_empleados', 'tbl_cpu.id_empleado=tbl_empleados.id_empleado');
		$this->db->where('tbl_cpu.id_empleado',$id_empleado);
		$this->db->join('status_cpus','tbl_cpu.status=status_cpus.id');
		$res=$this->db->get();
		return $res->result(); 
	}

	public function agregar_cpu($num_inventario,$marca,$modelo,$hostname,$num_serie,$tipo,$ubicacion,$categoria,$status,$id_empleado)
	{
		$data=array('num_inventario' => $num_inventario,
					'marca' => $marca,
					'modelo' => $modelo,
					'hostname' => $hostname,
					'num_serie' => $num_serie,
					'tipo' => $tipo, 
					'ubicacion'=>$ubicacion,
					'categoria' => $categoria, 
					'status' => $status,
					'id_empleado'=>$id_empleado);
		$nuevo = $this->db->insert('tbl_cpu', $data);
	}

	public function existe_cpu_empleado($id_empleado)
	{
		$this->db->select('*');
		$this->db->join('tbl_empleados', 'tbl_cpu.id_empleado=tbl_empleados.id_empleado');
		$this->db->where('tbl_cpu.id_empleado',$id_empleado);
		$this->db->limit(1);
		$res=$this->db->get('tbl_cpu');

		if ($res->num_rows>0) {
			return TRUE;
		}else
		{
			return FALSE;
		}
	}
	
	public function actualizar_cpu($id_cpu,$num_inventario,$marca,$modelo,$hostname,$num_serie,$tipo,$ubicacion,$categoria,$status,$id_empleado)
	{
		$data=array('num_inventario' => $num_inventario,
					'marca' => $marca,
					'modelo' => $modelo,
					'hostname' => $hostname,
					'num_serie' => $num_serie,
					'tipo' => $tipo, 
					'ubicacion'=>$ubicacion,
					'categoria' => $categoria, 
					'status' => $status,
					'id_empleado'=>$id_empleado);

		$id_cpu=$_POST['id_cpu'];
		$this->db->where('id_cpu',$id_cpu);
		$this->db->update('tbl_cpu',$data);
	}


	public function reasignar_cpu($id_cpu,$num_inventario,$marca,$hostname,$ubicacion,$status,$id_empleado)
	{
		$data=array(
					'num_inventario' => $num_inventario,
					'marca' => $marca,
					'hostname' => $hostname,
					'ubicacion'=>$ubicacion, 
					'status' => $status,
					'id_empleado'=>$id_empleado);

		$id_cpu=$_POST['id_cpu'];
		$this->db->where('id_cpu',$id_cpu);
		$this->db->update('tbl_cpu',$data);
	}


	public function cargar_cpu_detalles($id_cpu)
	{
		$this->db->select('*');
		$this->db->where('id_cpu',$id_cpu);
		$this->db->limit(1);
		$res=$this->db->get('tbl_cpu');
		return $res->result(); 
	}
} 
?>