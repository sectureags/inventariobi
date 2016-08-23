<?php
class Tbl_mouse_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function lista( $id_mouse )
	{
		if ( isset($id_mouse) && empty($id_mouse) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_mouse');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_mouse
		$this->db->where('id_mouse',$id_mouse);
		$query = $this->db->get('tbl_mouse');
		return $query->result_array(); 		
	}

	// Funcion para Empleados
	public function get_mouses( $id_empleado )
	{
		if ( isset($id_empleado) && empty($id_empleado) ) {
			// Si isset es FALSE entonces solicitamos TODOS los registros
			$query = $this->db->get('tbl_mouse');
			return $query->result();
		}
		// Si isset es VERDADERO entonces solicitamos UN registro por el id_empleado
		$this->db->where('id_empleado',$id_empleado);
		$query = $this->db->get('tbl_mouse');
		return $query->result_array(); 		
	}


	public function agrega( $mouse = FALSE )
	{
		if ( isset($mouse) && !empty($mouse) ) {
			
			$query = $this->db->insert('tbl_mouse', $mouse);
			$nuevo = $this->db->insert_id();
			return $nuevo;
		}

		return NULL;		
	}

	public function actualiza( $mouse = FALSE )
	{
		if ( isset($mouse) && !empty($mouse) ) {
			
			$this->db->where('id_mouse',$mouse['id_mouse']);	
			$query = $this->db->update('tbl_mouse', $mouse);
			return true;
		}

		return NULL;		
	}

	public function elimina( $mouse = FALSE )
	{
		if ( isset($mouse) && !empty($mouse) ) {
			
			$this->db->where('id_mouse',$mouse['id_mouse']);	
			$query = $this->db->delete('tbl_mouse');
			return true;
		}

		return NULL;		
	}

	public function buscar( $mouse = NULL)
	{
		if ( isset($mouse) && !empty($mouse) ) {
			
			$this->db->where('num_inventario',$mouse['num_inventario']);
			$query = $this->db->get('tbl_mouse');
			return $query->result();
		}
	}




} 
?>