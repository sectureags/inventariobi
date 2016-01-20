<?php
class Tbl_dd_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function lista( $id_dd )
	{
		if ( isset($id_dd) && empty($id_dd) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_dd');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_cpu
		$this->db->where('id_dd',$id_dd);
		$query = $this->db->get('tbl_dd');
		return $query->result_array(); 		
	}

	// Funcion para CPUs
	public function get_dds( $id_cpu )
	{
		if ( isset($id_cpu) && empty($id_cpu) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_dd');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_cpu
		$this->db->where('id_cpu',$id_cpu);
		$query = $this->db->get('tbl_dd');
		return $query->result_array(); 		
	}


	public function agrega( $disco_duro = FALSE )
	{
		if ( isset($disco_duro) && !empty($disco_duro) ) {
			
			$query = $this->db->insert('tbl_dd', $disco_duro);
			$nuevo = $this->db->insert_id();
			return $nuevo;
		}

		return NULL;		
	}

	public function actualiza( $disco_duro = FALSE )
	{
		if ( isset($disco_duro) && !empty($disco_duro) ) {
			
			$this->db->where('id_dd',$disco_duro['id_dd']);	
			$query = $this->db->update('tbl_dd', $disco_duro);
			return true;
		}

		return NULL;		
	}

	public function elimina( $disco_duro = FALSE )
	{
		if ( isset($disco_duro) && !empty($disco_duro) ) {
			
			$this->db->where('id_dd',$disco_duro['id_dd']);	
			$query = $this->db->delete('tbl_dd');
			return true;
		}

		return NULL;		
	}



} 
?>