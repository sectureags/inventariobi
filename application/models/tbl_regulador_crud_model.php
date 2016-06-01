<?php
class Tbl_regulador_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function lista( $id_regulador )
	{
		if ( isset($id_regulador) && empty($id_regulador) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_regulador');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_regulador
		$this->db->where('id_regulador',$id_regulador);
		$query = $this->db->get('tbl_regulador');
		return $query->result_array(); 		
	}

	// Funcion para Empleados
	public function get_reguladores( $id_empleado )
	{
		if ( isset($id_empleado) && empty($id_empleado) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_regulador');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_empleado
		$this->db->where('id_empleado',$id_empleado);
		$query = $this->db->get('tbl_regulador');
		return $query->result_array(); 		
	}


	public function agrega( $regulador = FALSE )
	{
		if ( isset($regulador) && !empty($regulador) ) {
			
			$query = $this->db->insert('tbl_regulador', $regulador);
			$nuevo = $this->db->insert_id();
			return $nuevo;
		}

		return NULL;		
	}

	public function actualiza( $regulador = FALSE )
	{
		if ( isset($regulador) && !empty($regulador) ) {
			
			$this->db->where('id_regulador',$regulador['id_regulador']);	
			$query = $this->db->update('tbl_regulador', $regulador);
			return true;
		}

		return NULL;		
	}

	public function elimina( $regulador = FALSE )
	{
		if ( isset($regulador) && !empty($regulador) ) {
			
			$this->db->where('id_regulador',$regulador['id_regulador']);	
			$query = $this->db->delete('tbl_regulador');
			return true;
		}

		return NULL;		
	}



} 
?>