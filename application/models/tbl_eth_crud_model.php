<?php
class Tbl_eth_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function get_ipconfig( $id_cpu = FALSE )
	{
		if ( $id_cpu == FALSE ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_eth');
			return $query->result_array();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_cpu
		$this->db->where('id_cpu',$id_cpu);
		//$this->db->limit(1);
		$query = $this->db->get('tbl_eth');
		return $query->result_array(); 		
	}

	public function cargar_permiso_carpetas($id_empleado)
	{
		$this->db->from('tbl_eth');
		$this->db->join('tbl_empleados', 'tbl_eth.id_empleado=tbl_empleados.id_empleado');
		$this->db->where('tbl_eth.id_empleado',$id_empleado);
		$res=$this->db->get();
		return $res->result(); 
	}

	public function agregar_carpetas($carpetas_geaco06, $carpeta_imagenes,  $capacidad_correo, $otros_servicios, $id_empleado)
	{
		$data=array('carpetas_geaco06' => $carpetas_geaco06,
					'carpeta_imagenes' => $carpeta_imagenes,
					'capacidad_correo' => $capacidad_correo,
					'otros_servicios'=> $otros_servicios,
					'id_empleado'=>$id_empleado
			);
		$this->db->join('tbl_empleados', 'tbl_permiso_internet.id_empleado=tbl_empleados.id_empleado');
		$this->db->where('tbl_eth.id_empleado',$id_empleado);
		$nuevo = $this->db->insert('tbl_eth', $data);

	}


	public function actualizar_carpetas($id,$carpetas_geaco06, $carpeta_imagenes, $capacidad_correo, $otros_servicios)
	{
		$data=array('carpetas_geaco06' => $carpetas_geaco06,'carpeta_imagenes' => $carpeta_imagenes,'capacidad_correo' => $capacidad_correo,'otros_servicios'=> $otros_servicios);
		$this->db->where('id',$id);
		$this->db->update('tbl_eth',$data);
		
	}

	public function existe_carpetas($id_empleado)
	{
		$this->db->select('*');
		$this->db->join('tbl_empleados', 'tbl_eth.id_empleado=tbl_empleados.id_empleado');
		$this->db->where('tbl_eth.id_empleado',$id_empleado);
		$this->db->limit(1);
		$res=$this->db->get('tbl_eth');

		if ($res->num_rows>0) {
			return TRUE;
		}else
		{
			return FALSE;
		}
	}
} 
?>