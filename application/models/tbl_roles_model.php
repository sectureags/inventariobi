<?php
class Tbl_roles_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_roles($id_tipo = 1)
	{
		if ( isset($id_tipo) && $id_tipo == 1 ) {
			$this->db->where('id_tipo !=',$id_tipo);
			$res=$this->db->get('tbl_tipo_rol');////cuando agrego get solo hago referencia al select
			return $res->result();
		}
		
	}

} 

?>