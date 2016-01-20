<?php
class Tbl_ipconfig_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function lista( $id_ipconfig )
	{
		if ( isset($id_ipconfig) && empty($id_ipconfig) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_ipconfig');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_cpu
		$this->db->where('id_ipconfig',$id_ipconfig);
		$query = $this->db->get('tbl_ipconfig');
		return $query->result_array(); 		
	}

	// Funcion para CPUs
	public function get_ipconfigs( $id_cpu )
	{
		if ( isset($id_cpu) && empty($id_cpu) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_ipconfig');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_cpu
		$this->db->where('id_cpu',$id_cpu);
		$query = $this->db->get('tbl_ipconfig');
		return $query->result_array(); 		
	}


	public function agrega( $ip_config = FALSE )
	{
		if ( isset($ip_config) && !empty($ip_config) ) {
			
			$query = $this->db->insert('tbl_ipconfig', $ip_config);
			$nuevo = $this->db->insert_id();
			return $nuevo;
		}

		return NULL;		
	}

	public function actualiza( $ip_config = FALSE )
	{
		if ( isset($ip_config) && !empty($ip_config) ) {
			
			$this->db->where('id_ipconfig',$ip_config['id_ipconfig']);	
			$query = $this->db->update('tbl_ipconfig', $ip_config);
			return true;
		}

		return NULL;		
	}

	public function elimina( $ip_config = FALSE )
	{
		if ( isset($ip_config) && !empty($ip_config) ) {
			
			$this->db->where('id_ipconfig',$ip_config['id_ipconfig']);	
			$query = $this->db->delete('tbl_ipconfig');
			return true;
		}

		return NULL;		
	}



} 
?>