<?php
class Tbl_ram_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function lista( $id_ram )
	{
		if ( isset($id_ram) && empty($id_ram) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_ram');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_cpu
		$this->db->where('id_ram',$id_ram);
		$query = $this->db->get('tbl_ram');
		return $query->result_array(); 		
	}

	// Funcion para CPUs
	public function get_rams( $id_cpu )
	{
		if ( isset($id_cpu) && empty($id_cpu) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_ram');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_cpu
		$this->db->where('id_cpu',$id_cpu);
		$query = $this->db->get('tbl_ram');
		return $query->result_array(); 		
	}


	public function agrega( $memoria_ram = FALSE )
	{
		if ( isset($memoria_ram) && !empty($memoria_ram) ) {
			
			$query = $this->db->insert('tbl_ram', $memoria_ram);
			$nuevo = $this->db->insert_id();
			return $nuevo;
		}

		return NULL;		
	}

	public function actualiza( $memoria_ram = FALSE )
	{
		if ( isset($memoria_ram) && !empty($memoria_ram) ) {
			
			$this->db->where('id_ram',$memoria_ram['id_ram']);	
			$query = $this->db->update('tbl_ram', $memoria_ram);
			return true;
		}

		return NULL;		
	}

	public function elimina( $memoria_ram = FALSE )
	{
		if ( isset($memoria_ram) && !empty($memoria_ram) ) {
			
			$this->db->where('id_ram',$memoria_ram['id_ram']);	
			$query = $this->db->delete('tbl_ram');
			return true;
		}

		return NULL;		
	}



} 
?>