<?php
class Tbl_telefono_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function lista( $id_telefono )
	{
		if ( isset($id_telefono) && empty($id_telefono) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_telefono');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_telefono
		$this->db->where('id_telefono',$id_telefono);
		$query = $this->db->get('tbl_telefono');
		return $query->result_array(); 		
	}

	// Funcion para Empleados
	public function get_telefonos( $id_empleado )
	{
		if ( isset($id_empleado) && empty($id_empleado) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_telefono');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_empleado
		$this->db->where('id_empleado',$id_empleado);
		$query = $this->db->get('tbl_telefono');
		return $query->result_array(); 		
	}


	public function agrega( $telefono = FALSE )
	{
		if ( isset($telefono) && !empty($telefono) ) {
			
			$query = $this->db->insert('tbl_telefono', $telefono);
			$nuevo = $this->db->insert_id();
			return $nuevo;
		}

		return NULL;		
	}

	public function actualiza( $telefono = FALSE )
	{
		if ( isset($telefono) && !empty($telefono) ) {
			
			$this->db->where('id_telefono',$telefono['id_telefono']);	
			$query = $this->db->update('tbl_telefono', $telefono);
			return true;
		}

		return NULL;		
	}

	public function elimina( $telefono = FALSE )
	{
		if ( isset($telefono) && !empty($telefono) ) {
			
			$this->db->where('id_telefono',$telefono['id_telefono']);	
			$query = $this->db->delete('tbl_telefono');
			return true;
		}

		return NULL;		
	}



} 
?>