<<<<<<< HEAD
<?php
class Tbl_empleado_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_empleados()
	{
		$res=$this->db->get('tbl_empleados');
		return $res->result(); 

	}

	public function agregar_empleados($codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo)
	{
		$data=array('codigo_empleado' => $codigo_empleado,'nombre_completo' => $nombre_completo,'unidad' => $unidad,'usuario_de_red' => $usuario_de_red,'contrasena' => $contrasena,'area' => $area,'num_extension' => $num_extension, 'correo_electonico'=>$correo_electonico, 'cargo' => $cargo);
		$nuevo = $this->db->insert('tbl_empleados', $data);

	}

	public function editar_empleado($id_empleado)
	{
		$this->db->select('*');
		$this->db->where('id_empleado',$id_empleado);
		$this->db->limit(1);
		$res=$this->db->get('tbl_empleados');
		return $res->result();
	}

	public function actualizar_empleado($id_empleado,$codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo)
	{
		$data=array('codigo_empleado' => $codigo_empleado,'nombre_completo' => $nombre_completo,'unidad' => $unidad,'usuario_de_red' => $usuario_de_red,'contrasena' => $contrasena,'area' => $area,'num_extension' => $num_extension, 'correo_electonico'=>$correo_electonico, 'cargo' => $cargo);
		$this->db->where('id_empleado',$id_empleado);
		$this->db->update('tbl_empleados',$data);
		
	}

	public function eliminar_empleado($id_empleado,$codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo)
	{
		$data=array('id_empleado' => $id_empleado, 'codigo_empleado' => $codigo_empleado,'nombre_completo' => $nombre_completo,'unidad' => $unidad,'usuario_de_red' => $usuario_de_red,'contrasena' => $contrasena,'area' => $area, 'num_extension' => $num_extension, 'correo_electonico'=>$correo_electonico, 'cargo' => $cargo );
		$this->db->where('id_empleado',$id_empleado);
		$this->db->delete('tbl_empleados',$data); 
	}
} 
=======
<?php
class Tbl_empleado_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_empleados()
	{
		$res=$this->db->get('tbl_empleados');
		return $res->result(); 

	}

	public function agregar_empleados($codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo)
	{
		$data=array('codigo_empleado' => $codigo_empleado,'nombre_completo' => $nombre_completo,'unidad' => $unidad,'usuario_de_red' => $usuario_de_red,'contrasena' => $contrasena,'area' => $area,'num_extension' => $num_extension, 'correo_electonico'=>$correo_electonico, 'cargo' => $cargo);
		$nuevo = $this->db->insert('tbl_empleados', $data);

	}

	public function editar_empleado($id_interno)
	{
		$this->db->select('*');
		$this->db->where('id_interno',$id_interno);
		$this->db->limit(1);
		$res=$this->db->get('tbl_empleados');
		return $res->result();
	}

	public function actualizar_empleado($id_interno,$codigo_empleado, $nombre_completo, $unidad, $usuario_de_red, $contrasena, $num_extension, $correo_electonico, $area, $cargo)
	{
		$data=array('codigo_empleado' => $codigo_empleado,'nombre_completo' => $nombre_completo,'unidad' => $unidad,'usuario_de_red' => $usuario_de_red,'contrasena' => $contrasena,'area' => $area,'num_extension' => $num_extension, 'correo_electonico'=>$correo_electonico, 'cargo' => $cargo);
		$this->db->where('id_interno',$id_interno);
		$this->db->update('tbl_empleados',$data);
		
	}

	public function eliminar_empleado($id_interno)
	{
		$data=array('id_interno' => $id_interno, 'codigo_empleado' => $codigo_empleado,'nombre_completo' => $nombre_completo,'unidad' => $unidad,'usuario_de_red' => $usuario_de_red,'contrasena' => $contrasena,'area' => $area, 'num_extension' => $num_extension, 'correo_electonico'=>$correo_electonico, 'cargo' => $cargo );

		$this->db->where('id_interno',$id_interno);
		$this->db->delete('tbl_empleados',$data); 
	}
} 
>>>>>>> 73757135c572fb6053f983703bddf50a44f67303
?>