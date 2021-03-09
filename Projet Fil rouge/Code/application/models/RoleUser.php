<?php

class RoleUser extends CI_Model{
  public function __construct()
  {
    
  }

  public function getRoleUser2(){
    return $this->db->get('roleUser')->result_array();
  }

  public function getRoleUser($id = FALSE){
    if ($id === FALSE){
      $query = $this->db->get('roleUser');
      return $query->result_array();
    }
    else
    {
      $query = $this->db->get_where('roleUser', array('id' => $id));
      return $query->row_array();
    }
}

  public function manageRoleUser(){
    $data = array(
      'role' => $this->input->post('role')
    );

    if ($this->input->post('id') <> NULL){
      return $this->db->update('roleuser', $data, array('id' => $this->input->post('id')));
    }
    else
    {
      return $this->db->insert('roleuser', $data);
    }
  }
}