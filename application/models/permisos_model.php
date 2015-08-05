<?php
class Permisos_model extends CI_Model {
 var $rol = '';
 var $componente = '';
 var $recurso = '';
 var $permiso ='';
  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
        
  }

  public function get_all(){
    
    $this->db->order_by('rol','asc');
    $this->db->order_by('permiso','desc');
    $this->db->order_by('componente','asc');
    $this->db->order_by('recurso','asc');

    $q = $this->db->get('tbl_permisos');

    if ( $q->num_rows > 0 ){

      return $q->result();
    }
    return FALSE;

  }

public function filtro_roles($tipo_rol){
    
    $this->db->where('rol',$tipo_rol);

    $this->db->order_by('componente','asc');
    $this->db->order_by('recurso','asc');

    $q = $this->db->get('tbl_permisos');

    if ( $q->num_rows > 0 ){

      return $q->result();
    }
    return FALSE;

  }



  function insert_entry($crearpermiso)
  {
    if ( ( ! empty($crearpermiso) ) AND is_array($crearpermiso) ) {
      
      $this->db->insert('tbl_permisos', $crearpermiso);

      $id = $this->db->insert_id();

      if ( ! empty($id) ) {

        return TRUE;
      }
      else
      {
        return TRUE;
      }     
    }
    return FALSE;
  }

  function delete($id)
  {
      $this->db->delete('tbl_permisos', array('id' => $id)); 
      
  }
  function verify_metodo($rol,$componente,$metodo){
    $this->db->where('rol',$rol);
    $this->db->where('componente',$componente);
    $this->db->where('recurso',$metodo);
    $this->db->where('permiso',TRUE);
    $this->db->limit(1);
    $q = $this->db->get('tbl_permisos');
    if ( $q->num_rows > 0 ){
      return TRUE;
    }
    return FALSE;
  }
  function verify_recursos($rol,$componente){
    $this->db->where('rol',$rol);
    $this->db->where('componente',$componente);
    //$this->db->where('recurso',$recurso);
    //$this->db->where('permiso',TRUE);
    $this->db->limit(1);
    $q = $this->db->get('tbl_permisos');
    if ( $q->num_rows > 0 ){
      return TRUE;
    }
    return FALSE;
  }
  public function componentes($rol){
    $this->db->select('*');
    $this->db->where('rol',$rol);
    $this->db->where('recurso','/index');
    $this->db->where('permiso',TRUE);
    $q = $this->db->get('tbl_permisos');
    if ( $q->num_rows > 0 ){
      return $q->result();
    }
    return FALSE;
  }
  public function recursos($rol){
    $this->db->select('*');
    $this->db->where('rol',$rol);
    //$this->db->where('componente',$componente);
    $this->db->where('permiso',TRUE);
    $q = $this->db->get('tbl_permisos');
    if ( $q->num_rows > 0 ){
      return $q->result();
    }
    return FALSE;
  }
  function permitir($id)
  {
      $data['id']     = $id;
      $data['permiso'] = TRUE;
      $this->db->update('tbl_permisos', $data, array('id' => $id));
  }
  function quitar($id)
  {
      $data['id']     = $id;
      $data['permiso'] = FALSE;
      $this->db->update('tbl_permisos', $data, array('id' => $id));
  }
	
}
?>