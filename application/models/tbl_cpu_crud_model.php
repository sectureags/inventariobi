<?php
class Tbl_cpu_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function get_cpu( $id_cpu = FALSE)
	{
		if ( isset($id_cpu) && empty($id_cpu) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_cpu');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_cpu
		$this->db->where('id_cpu',$id_cpu);
		$query = $this->db->get('tbl_cpu');
		return $query->result_array(); 		
	}

	public function cargar_cpu()
	{
		$this->db->from('tbl_cpu');
		$this->db->join('tbl_empleados', 'tbl_cpu.id_empleado=tbl_empleados.id_empleado','inner');
		#$this->db->join('tbl_ipconfig', 'tbl_cpu.id_cpu=tbl_ipconfig.id_cpu','left');
		#$this->db->join('tbl_procesador', 'tbl_cpu.id_cpu=tbl_procesador.id_cpu','left');
		#$this->db->join('status_cpus','tbl_cpu.status=status_cpus.id_status_cpu','left');
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
		$this->db->join('status_cpus','tbl_cpu.status=status_cpus.id_status_cpu');
		$res=$this->db->get();
		return $res->result(); 
	}

	public function cargar_por_status($status)
	{
		
		$this->db->from('tbl_cpu');
		$this->db->join('tbl_empleados', 'tbl_cpu.id_empleado=tbl_empleados.id_empleado');
		$this->db->join('status_cpus','tbl_cpu.status=status_cpus.id_status_cpu');
		$this->db->where('tbl_cpu.status',$status);
		$res=$this->db->get();
		return $res->result(); 
	}

	public function agregar( $cpu = FALSE )
	{
		if ( isset($cpu) && !empty($cpu) ) {			
			$query = $this->db->insert('tbl_cpu', $cpu);
			$nuevo = $this->db->insert_id();
			return $nuevo;
		}

		return NULL;
	}


	public function agregarrapido( $cpu )
	{
				
			$query = $this->db->insert('tbl_cpu', $cpu);
			$nuevo = $this->db->insert_id();
			return $nuevo;
			
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
	
	public function actualizar_cpu($cpu = FALSE)
	{
		if ( isset($cpu) && !empty($cpu) ) {
			
			$this->db->where('id_cpu',$cpu['id_cpu']);	
			$query = $this->db->update('tbl_cpu', $cpu);
			return true;
		}

		return NULL;

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

	public function buscar_inventario($num_inventario)
	{
		$this->db->from('tbl_cpu');
		$this->db->join('tbl_empleados', 'tbl_cpu.id_empleado=tbl_empleados.id_empleado');
		$this->db->join('status_cpus','tbl_cpu.status=status_cpus.id_status_cpu');
		$this->db->where('tbl_cpu.num_inventario',$num_inventario);
		$res=$this->db->get();
		return $res->result(); 
	}
} 
?>