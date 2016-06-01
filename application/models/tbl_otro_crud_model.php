<?php
class Tbl_otro_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function lista( $id_otro )
	{
		if ( isset($id_otro) && empty($id_otro) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_otro');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_otro
		$this->db->where('id_otro',$id_otro);
		$query = $this->db->get('tbl_otro');
		return $query->result_array(); 		
	}

	// Funcion para Empleados
	public function get_otros( $id_empleado )
	{
		if ( isset($id_empleado) && empty($id_empleado) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_otro');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_empleado
		$this->db->where('id_empleado',$id_empleado);
		$query = $this->db->get('tbl_otro');
		return $query->result_array(); 		
	}


	public function agrega( $otro = FALSE )
	{
		if ( isset($otro) && !empty($otro) ) {
			
			$query = $this->db->insert('tbl_otro', $otro);
			$nuevo = $this->db->insert_id();
			return $nuevo;
		}

		return NULL;		
	}


	public function actualiza( $otro = FALSE )
	{
		if ( isset($otro) && !empty($otro) ) {
			
			$this->db->where('id_otro',$otro['id_otro']);	
			$query = $this->db->update('tbl_otro', $otro);
			return true;
		}

		return NULL;		
	}

	public function elimina( $otro = FALSE )
	{
		if ( isset($otro) && !empty($otro) ) {
			
			$this->db->where('id_otro',$otro['id_otro']);	
			$query = $this->db->delete('tbl_otro');
			return true;
		}

		return NULL;		
	}



} 
?>