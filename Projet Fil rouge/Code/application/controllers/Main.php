<?php

class Main extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper("html");
    $this->load->helper("url");
    $this->load->helper("form");
    $this->load->library("form_validation");
    $this->load->library("session");
    
    $this->load->database();
    $this->load->model("user");
    $this->load->model("roleuser");
    $this->load->model("agency");
    $this->load->model("city");
    $this->session;
    
  }
  
  public function index(){
    $data["title"] = "ACCUEIL";
    $this->load->view("templates/headerHTML");
    $this->load->view("main");
    $this->load->view("templates/footer");
  }
  
  public function cnxAdm(){
    if (isset($this->session->userLastname)) {
      redirect(site_url("main/adm"));
    }
    else
    {
      $data["title"] = "CONNEXION ADMINISTRATION";
      $this->load->view("templates/headerHTML");
      $this->load->view("templates/headerSub", $data);
      $this->load->view("cnxAdm");
      $this->load->view("templates/footer");
    }
  }
  
  public function adm($msgError = FALSE){
    $data["title"] = "ADMINISTRATION";
    $data["tabAgency"] = $this->agency->getAgency();
    $data["tabRoleUser"] = $this->roleuser->getRoleUser();
    $data["tabCity"] = $this->city->getCity();
    // error on delete
    if ($msgError <> FALSE){
      $data["msgError"] = $msgError;
    }

    // test if the session exists
    $session = isset($this->session->userLastname);
    
    // cnx control
    if (!$session) {
      $data["user"] = $this->user->getUser($this->input->post("lastname"), $this->input->post("password"));
    }
    if (!isset($data["user"]) && !$session){
      redirect(site_url("main/cnxAdm"));
    }
    else
    {
      // creation of session or recovering of session's variables
      if (!$session){
        $this->session->userLastname = $data["user"]["lastname"];
        $this->session->userRole = $data["user"]["role"];
      }
      else
      {
        $data["user"]["lastname"] = $this->session->userLastname;
        $data["user"]["role"] = $this->session->userRole;
      }
      if ($data["user"]["role"] == "superviseur")
      {
        $data["tabUser"] = $this->user->getUser();
        $this->load->view("templates/headerHTML");
        $this->load->view("templates/headerSub", $data);
        $this->load->view("superAdmMain", $data);
      }
      else
      {
        $this->load->view("templates/headerHTML");
        $this->load->view("templates/headerSub", $data);
        $this->load->view("employAdmMain", $data);
      }
    }
    $this->load->view("templates/footer");
  }
  
  //-------------------------------- MANAGE USER
  public function manageOneUser($id = NULL){
    $data["title"] = "Gestion user";
    $data["tabAgency"] = $this->agency->getAgency();
    $data["tabRoleUser"] = $this->roleuser->getRoleUser();
    $data["oneRow"] = $this->user->getUserId($id);
    $data["table"] = "user";

    $this->form_validation->set_error_delimiters('<div class="errorFormInscription">', '</div>');

    $this->form_validation->set_rules("lastname", "Nom", "required", array("required" => "Le nom doit être saisi"));
    $this->form_validation->set_rules("firstname", "Prénom", "required", array("required" => "Le prénom doit être saisi"));
    $this->form_validation->set_rules("password1", "Password", "required", array("required" => "Le mot de passe doit être saisi"));
    $this->form_validation->set_rules("password2", "Password", "required|matches['password1']", array("required" => "Le mot de passe doit être saisi", "matches" => "Les 2 mots de passe doivent êtres identiques"));

    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/headerHTML");
      $this->load->view("templates/headerSub", $data);
      $this->load->view("superAdmManage", $data);
    }
    else
    {
      $this->user->manageUser($id);
      $data["title"] = "ADMINISTRATION";
      $data["user"]["lastname"] = $this->session->userLastname;
      $data["user"]["role"] = $this->session->userRole;
      redirect("main/adm");
    }
  }  

  public function deleteOneUser($id){
    if (!$this->user->deleteUser($id)) {
      $msgError = "Vous ne pouvez pas supprimer cet utilisateur";
      $this->adm($msgError);
    }
    else
    {
      $this->adm();
    }
  }
  
  //-------------------------------- MANAGE ROLE USER

  public function manageOneRoleUser($id = NULL){
    $data["title"] = "Gestion roleUser";
    $data["oneRow"] = $this->roleuser->getRoleUser($id);
    $data["table"] = "roleUser";
    
    $this->form_validation->set_error_delimiters('<div class="errorFormInscription">', '</div>');
    
    $this->form_validation->set_rules("role", "Rôle", "required|is_unique[roleUser.role]", array("required" => "Le rôle doit être saisi", "is_unique"=> "Le rôle existe déjà"));
    
    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/headerHTML");
      $this->load->view("templates/headerSub", $data);
      $this->load->view("superAdmManage", $data);
    }  
    else
    {
      $this->roleuser->manageRoleUser();
      $data["title"] = "ADMINISTRATION";
      $data["user"]["lastname"] = $this->session->userLastname;
      $data["user"]["role"] = $this->session->userRole;
      redirect("main/adm");
    }  
  }  
  
  public function deleteOneRoleUser($id){
    $this->db->delete("roleUser", array("id" => $id));
    redirect("main/adm");
  }

  //-------------------------------- MANAGE CITY

  public function manageOneCity($id = NULL){
    $data["title"] = "Gestion city";
    $data["oneRow"] = $this->city->getCityId($id);
    $data["table"] = "city";

    $this->form_validation->set_error_delimiters('<div class="errorFormInscription">', '</div>');
    
    $this->form_validation->set_rules("city", "Nom de la ville", "required|is_unique[city.nameCity]", array("required" => "La ville doit être saisie", "is_unique"=> "La ville existe déjà"));
    // $this->form_validation->set_rules("city", "Nom de la ville", "required", array("required" => "La ville doit être saisie"));
    
    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/headerHTML");
      $this->load->view("templates/headerSub", $data);
      $this->load->view("superAdmManage", $data);
    }  
    else
    {
      $this->city->manageCity();
      $data["title"] = "ADMINISTRATION";
      $data["user"]["lastname"] = $this->session->userLastname;
      $data["user"]["role"] = $this->session->userRole;
      redirect("main/adm");
    }  
  }  
  
  public function deleteOneCity($id){
    if (!$this->city->deleteCity($id)) {
      $msgError = "Vous ne pouvez pas supprimer cette ville";
      $this->adm($msgError);
    }
    else
    {
      $this->adm();
    }
  }
  
  //-------------------------------- MANAGE AGENCY

  public function manageOneAgency($id = NULL){
    $data["title"] = "Gestion agency";
    $data["oneRow"] = $this->agency->getAgencyId($id);
    $data["tabCity"] = $this->city->getCity();
    $data["table"] = "agency";

    $this->form_validation->set_error_delimiters('<div class="errorFormInscription">', '</div>');
    
    $this->form_validation->set_rules("name", "Nom de l'agence", "required|is_unique[agency.name]", array("required" => "Le nom d'agence doit être saisi", "is_unique"=> "Le nom d'agence existe déjà"));
    // $this->form_validation->set_rules("agency", "Nom de la ville", "required", array("required" => "La ville doit être saisie"));
    
    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/headerHTML");
      $this->load->view("templates/headerSub", $data);
      $this->load->view("superAdmManage", $data);
    }  
    else
    {
      $this->agency->manageAgency();
      $data["title"] = "ADMINISTRATION";
      $data["user"]["lastname"] = $this->session->userLastname;
      $data["user"]["role"] = $this->session->userRole;
      redirect("main/adm");
    }  
  }  
  
  public function deleteOneAgency($id){
    if (!$this->agency->deleteAgency($id)) {
      $msgError = "Vous ne pouvez pas supprimer cette agence";
      $this->adm($msgError);
    }
    else
    {
      $this->adm();
    }
  }

  public function unCnx(){
    session_destroy();
    redirect("main/index");
  }
}