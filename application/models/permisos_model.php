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
    return false;
  }
  function insert_entry()
  {
    $data = array(
          'rol' => $_POST['rol'],
          'componente' => $_POST['componente'],
          'recurso' => $_POST['recurso'],
          'permiso' => 1      
    );      
      $this->db->insert('tbl_permisos', $data);
  }
  function delete($id)
  {
      $this->db->delete('tbl_permisos', array('id' => $id)); 
      
  }
  function verify_componente($rol,$componente){
    $this->db->where('rol',$rol);
    $this->db->where('componente',$componente);
    //$this->db->where('recurso','/index');
    $this->db->where('permiso',TRUE);
    $this->db->limit(1);
    $q = $this->db->get('tbl_permisos');
    if ( $q->num_rows > 0 ){
      return true; //$q->row();
    }
    return false;
  }
  function verify_recursos($rol,$componente,$recurso){
    $this->db->where('rol',$rol);
    $this->db->where('componente',$componente);
    $this->db->where('recurso',$recurso);
    $this->db->where('permiso',TRUE);
    $this->db->limit(1);
    $q = $this->db->get('tbl_permisos');
    if ( $q->num_rows > 0 ){
      return true;
    }
    return false;
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
    return false;
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
    return false;
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