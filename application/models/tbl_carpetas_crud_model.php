<?php
class Tbl_carpetas_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_carpetas()
	{
		$res=$this->db->get('tbl_permiso_carpetas');
		return $res->result(); 
	}

	public function cargar_permiso_carpetas($id_empleado)
	{
		$this->db->from('tbl_permiso_carpetas');
		$this->db->join('tbl_empleados', 'tbl_permiso_carpetas.id_empleado=tbl_empleados.id_empleado');
		$this->db->where('tbl_permiso_carpetas.id_empleado',$id_empleado);
		$res=$this->db->get();
		return $res->result(); 
	}

	public function agregar_carpetas($carpetas_geaco06, $carpeta_imagenes, $carpeta_excellentia, $capacidad_correo, $otros_servicios)
	{
		$data=array('carpetas_geaco06' => $carpetas_geaco06,'carpeta_imagenes' => $carpeta_imagenes,'carpeta_excellentia' => $carpeta_excellentia,'capacidad_correo' => $capacidad_correo,'otros_servicios'=> $otros_servicios);
		$this->db->join('tbl_empleados', 'tbl_permiso_internet.id_empleado=tbl_empleados.id_empleado');
		$this->db->where('tbl_permiso_carpetas.id_empleado',$id_empleado);
		$nuevo = $this->db->insert('tbl_permiso_carpetas', $data);

	}

	public function actualizar_carpetas($id,$carpetas_geaco06, $carpeta_imagenes, $carpeta_excellentia, $capacidad_correo, $otros_servicios)
	{
		$data=array('carpetas_geaco06' => $carpetas_geaco06,'carpeta_imagenes' => $carpeta_imagenes,'carpeta_excellentia' => $carpeta_excellentia,'capacidad_correo' => $capacidad_correo,'otros_servicios'=> $otros_servicios);
		$this->db->where('id',$id);
		$this->db->update('tbl_permiso_carpetas',$data);
		
	}

	/*public function eliminar_internet($id)
	{
		$data=array('id' => $id);
		$this->db->where('id_empleado',$id_empleado);
		$this->db->delete('tbl_permiso_internet',$data); 
	}*/

	public function existe_carpetas($id_empleado)
	{
		$this->db->select('*');
		$this->db->join('tbl_empleados', 'tbl_permiso_carpetas.id_empleado=tbl_empleados.id_empleado');
		$this->db->where('tbl_permiso_carpetas.id_empleado',$id_empleado);
		$this->db->limit(1);
		$res=$this->db->get('tbl_permiso_carpetas');

		if ($res->num_rows>0) {
			return TRUE;
		}else
		{
			return FALSE;
		}
	}
} 
?>