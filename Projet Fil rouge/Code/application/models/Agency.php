<?php

class Agency extends CI_Model{
  public function __construct(){

  }

  public function getAgency(){
    return $this->db->get("agency")->result_array();
  }
}