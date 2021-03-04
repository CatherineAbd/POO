<?php

class Patients_ctrl extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('patients');
    $this->load->helper('url');
    $this->load->helper('html');
    $this->load->library('form_validation');
  }
  
  public function showPatients(){
    $data['title'] = "Liste des patients";

    $data['patients'] = $this->patients->getAllPatients();
    $this->load->view('templates/header', $data);
    $this->load->view('liste-patients', $data);
    $this->load->view('templates/footer');
  }

  public function showOnePatient($lastname, $phone){
    $data['title'] = "Information du patient :";

    $data['onePatient'] = $this->patients->getOnePatient($lastname, $phone);

    $this->load->view('templates/header', $data);
    $this->load->view('profil-patient', $data);
    $this->load->view('templates/footer');
  }

  public function createPatient(){

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
  
  public function updatePatient(){
    $data['title'] = "Modification d'un patient";

    $this->form_validation->set_rules('firstname', 'Prénom', 'required', array('required'=> 'le prénom doit être saisi'));
    $this->form_validation->set_rules('birthdate', 'Date anniversaire', 'required', array('required'=> 'la date doit être saisie'));
    $this->form_validation->set_rules('mail', 'Mail', 'trim|required|valid_email', array('required' => 'l\'adresse mail est requise'));

    if ($this->form_validation->run() === FALSE){
      $this->load->view('templates/header', $data);
      $this->load->view('profil-patient');
      $this->load->view('templates/footer');
    }  
    else{
      $this->patients->updateOnePatient();
      $this->load->view('success');
    }  
  }  

  public function deletePatient($id){
    $this->patients->deleteOnePatient($id);
    redirect('patients_ctrl/showPatients');
  }

  public function managePatient($id = NULL){

    $data['title'] = "Gestion d'un patient";

    $data['onePatient'] = $this->patients->getOnePatient($id);

    $this->form_validation->set_rules('lastname', 'Nom', 'required', array('required'=> 'le nom doit être saisi'));
    $this->form_validation->set_rules('firstname', 'Prénom', 'required', array('required'=> 'le prénom doit être saisi'));
    $this->form_validation->set_rules('birthdate', 'Date anniversaire', 'required', array('required'=> 'la date doit être saisie'));
    $this->form_validation->set_rules('phone', 'Phone', 'required', array('required'=> 'le numéro de tél doit être saisi'));
    $this->form_validation->set_rules('mail', 'Mail', 'trim|required|valid_email', array('required' => 'l\'adresse mail est requise'));

    if ($this->form_validation->run() === FALSE){
      $this->load->view('templates/header', $data);
      $this->load->view('manage-patient', $data);
      $this->load->view('templates/footer');
    }
    else{

      $this->patients->manageOnePatient($id);
      $this->load->view('success');
    }
  }
}