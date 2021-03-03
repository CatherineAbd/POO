<?php

class Patients_ctrl extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('patients');
    $this->load->helper('url');
  }
  
  public function createPatient(){
    
    $this->load->library('form_validation');

    $data['title'] = "Création d'un nouveau patient";

    $this->form_validation->set_rules('lastname', 'Nom', 'required', array('required'=> 'le nom doit être saisi'));
    $this->form_validation->set_rules('firstname', 'Prénom', 'required', array('required'=> 'le prénom doit être saisi'));
    $this->form_validation->set_rules('birthdate', 'Date anniversaire', 'required', array('required'=> 'la date doit être saisie'));
    $this->form_validation->set_rules('phone', 'Phone', 'required', array('required'=> 'le numéro de tél doit être saisi'));
    $this->form_validation->set_rules('mail', 'Mail', 'trim|required|valid_email', array('required' => 'l\'adresse mail est requise'));

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

    $data['patients'] = $this->patients->getAllPatients();
    $this->load->view('liste-patients', $data);
  }
}