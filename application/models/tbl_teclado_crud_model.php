<?php
class Tbl_teclado_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function lista( $id_teclado )
	{
		if ( isset($id_teclado) && empty($id_teclado) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_teclado');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_teclado
		$this->db->where('id_teclado',$id_teclado);
		$query = $this->db->get('tbl_teclado');
		return $query->result_array(); 		
	}

	// Funcion para Empleados
	public function get_teclados( $id_empleado )
	{
		if ( isset($id_empleado) && empty($id_empleado) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_teclado');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_empleado
		$this->db->where('id_empleado',$id_empleado);
		$query = $this->db->get('tbl_teclado');
		return $query->result_array(); 		
	}


	public function agrega( $teclado = FALSE )
	{
		if ( isset($teclado) && !empty($teclado) ) {
			
			$query = $this->db->insert('tbl_teclado', $teclado);
			$nuevo = $this->db->insert_id();
			return $nuevo;
		}

		return NULL;		
	}

	public function actualiza( $teclado = FALSE )
	{
		if ( isset($teclado) && !empty($teclado) ) {
			
			$this->db->where('id_teclado',$teclado['id_teclado']);	
			$query = $this->db->update('tbl_teclado', $teclado);
			return true;
		}

		return NULL;		
	}

	public function elimina( $teclado = FALSE )
	{
		if ( isset($teclado) && !empty($teclado) ) {
			
			$this->db->where('id_teclado',$teclado['id_teclado']);	
			$query = $this->db->delete('tbl_teclado');
			return true;
		}

		return NULL;		
	}

	public function buscar( $teclado = NULL)
	{
		if ( isset($teclado) && !empty($teclado) ) {
			
			$this->db->where('num_inventario',$teclado['num_inventario']);
			$query = $this->db->get('tbl_teclado');
			return $query->result();
		}	
	}



} 
?>