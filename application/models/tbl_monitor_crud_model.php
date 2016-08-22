<?php
class Tbl_monitor_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function lista( $id_monitor = NULL)
	{
		if ( isset($id_monitor) && empty($id_monitor) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_monitor');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_monitor
		$this->db->where('id_monitor',$id_monitor);
		$query = $this->db->get('tbl_monitor');
		return $query->result_array(); 		
	}

	// Funcion para Empleados
	public function get_monitores( $id_empleado )
	{
		if ( isset($id_empleado) && empty($id_empleado) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_monitor');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_empleado
		$this->db->where('id_empleado',$id_empleado);
		$query = $this->db->get('tbl_monitor');
		return $query->result_array(); 		
	}


	public function agrega( $monitor = FALSE )
	{
		if ( isset($monitor) && !empty($monitor) ) {
			
			$query = $this->db->insert('tbl_monitor', $monitor);
			$nuevo = $this->db->insert_id();
			return $nuevo;
		}

		return NULL;		
	}

	public function actualiza( $monitor = FALSE )
	{
		if ( isset($monitor) && !empty($monitor) ) {
			
			$this->db->where('id_monitor',$monitor['id_monitor']);	
			$query = $this->db->update('tbl_monitor', $monitor);
			return true;
		}

		return NULL;		
	}

	public function elimina( $monitor = FALSE )
	{
		if ( isset($monitor) && !empty($monitor) ) {
			
			$this->db->where('id_monitor',$monitor['id_monitor']);	
			$query = $this->db->delete('tbl_monitor');
			return true;
		}

		return NULL;		
	}

	public function buscar( $monitor = NULL)
	{
		if ( isset($monitor) && !empty($monitor) ) {
			
			$this->db->where('num_inventario',$monitor['num_inventario']);
			$query = $this->db->get('tbl_monitor');
			return $query->result();
		}

		
	}



} 
?>