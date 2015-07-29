<?php
class Tbl_status_cpu_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_status()
	{
		$res=$this->db->get('status_cpus');////cuando agrego get solo hago referencia al select
		return $res->result();
	}

} 

?>