<?php

class RoleUser extends CI_Model{
  public function __construct()
  {
    
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

  public function deleteRoleUser($id){
    if ($this->ctrlDeleteRoleUser($id)){
      $this->db->delete("roleuser", array("id" => $id));
      return true;
    }
      else
    {
      return false;
    }
  }

  // delete is possible if user is not the only one for an agency
  public function ctrlDeleteRoleUser($id){
    $query = "SELECT COUNT(*) total FROM roleuser r
    WHERE id IN (SELECT id_roleuser FROM user u where u.id_roleuser = r.id)
    AND id = " . $id;
    $result = $this->db->query($query)->row()->total;

    if ($result > 0){
      return false;
    }
    else
    {
      return true;
    }
  }

}