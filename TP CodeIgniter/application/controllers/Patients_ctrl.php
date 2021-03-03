<?php

class Patients_ctrl extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }
  
  public function createPatient(){
    
    $this->load->model('patients');
    $this->load->library('form_validation');

    $data['title'] = "Création d'un nouveau patient";

    $this->form_validation->set_rules('lastname', 'Nom', 'required');
    $this->form_validation->set_rules('firstname', 'Prénom', 'required');
    $this->form_validation->set_rules('birthdate', 'Date anniversaire', 'required');
    $this->form_validation->set_rules('phone', 'Phone', 'required');
    $this->form_validation->set_rules('mail', 'Mail', 'required');

    if ($this->form_validation->run() === FALSE){
      $this->load->view('templates/header', $data);
      $this->load->view('ajout-patient');
      $this->load->view('templates/footer');
    }
    else{
      $this->patients->set_patient();
      $this->load->view('success');
    }
  }

  public function showPatients(){
    $data['title'] = "Liste des patients";

    
    $this->load->view('liste-patients', $data);
  }
}