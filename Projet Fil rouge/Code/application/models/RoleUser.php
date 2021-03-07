<?php

class RoleUser extends CI_Model{
  public function __construct()
  {
    
  }

  public function getRoleUser(){
    return $this->db->get('roleUser')->result_array();
  }
}