<?php

class Patients extends CI_Model{
  
  public function __construct(){
    $this->load->database();
  }

  public function set_patient(){

    $data = array(
      'lastname' => $this->input->post('lastname'),
      'firstname' => $this->input->post('firstname'),
      'birthdate' => $this->input->post('birthdate'),
      'phone' => $this->input->post('phone'),
      'mail' => $this->input->post('mail')
    );

    return $this->db->insert('patients', $data);
  }

  public function getAllPatients(){

    $query = $this->db->get('patients');
    return $query->result_array();
  }
}