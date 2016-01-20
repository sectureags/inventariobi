<?php
class Tbl_procesador_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function lista( $id_procesador )
	{
		if ( isset($id_procesador) && empty($id_procesador) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_procesador');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_cpu
		$this->db->where('id_procesador',$id_procesador);
		$query = $this->db->get('tbl_procesador');
		return $query->result_array(); 		
	}

	// Funcion para CPUs
	public function get_procesadores( $id_cpu )
	{
		if ( isset($id_cpu) && empty($id_cpu) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_procesador');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_cpu
		$this->db->where('id_cpu',$id_cpu);
		$query = $this->db->get('tbl_procesador');
		return $query->result_array(); 		
	}


	public function agrega( $micro_procesador = FALSE )
	{
		if ( isset($micro_procesador) && !empty($micro_procesador) ) {
			
			$query = $this->db->insert('tbl_procesador', $micro_procesador);
			$nuevo = $this->db->insert_id();
			return $nuevo;
		}

		return NULL;		
	}

	public function actualiza( $micro_procesador = FALSE )
	{
		if ( isset($micro_procesador) && !empty($micro_procesador) ) {
			
			$this->db->where('id_procesador',$micro_procesador['id_procesador']);	
			$query = $this->db->update('tbl_procesador', $micro_procesador);
			return true;
		}

		return NULL;		
	}

	public function elimina( $micro_procesador = FALSE )
	{
		if ( isset($micro_procesador) && !empty($micro_procesador) ) {
			
			$this->db->where('id_procesador',$micro_procesador['id_procesador']);	
			$query = $this->db->delete('tbl_procesador');
			return true;
		}

		return NULL;		
	}



} 
?>