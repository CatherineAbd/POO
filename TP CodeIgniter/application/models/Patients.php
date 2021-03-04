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

  public function getOnePatient($id = FALSE){
    if ($id <> FALSE){
      $query = $this->db->get_where('patients', array('id' => $id));
      return $query->row_array();
    }
    else
    {
      return "";
    }
  }

  public function updateOnePatient(){
    $data = array(
      'lastname' => $this->input->post('lastname'),
      'firstname' => $this->input->post('firstname'),
      'birthdate' => $this->input->post('birthdate'),
      'phone' => $this->input->post('phone'),
      'mail' => $this->input->post('mail')
    );

    return $this->db->update('patients', $data, array('id' => $this->input->post('id')));
  }

  public function deleteOnePatient($id){
    return $this->db->delete('patients', array('id' => $id));
  }

  public function manageOnePatient($id = NULL){
    $data = array(
      'lastname' => $this->input->post('lastname'),
      'firstname' => $this->input->post('firstname'),
      'birthdate' => $this->input->post('birthdate'),
      'phone' => $this->input->post('phone'),
      'mail' => $this->input->post('mail')
    );

    if ($this->input->post('id') <> NULL){
      return $this->db->update('patients', $data, array('id' => $this->input->post('id')));
    }
    else
    {
      return $this->db->insert('patients', $data);
    }
  }
}