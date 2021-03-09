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
  
  public function manageOneUser($id = NULL){
    $data["title"] = "Gestion user";
    $data["tabAgency"] = $this->agency->getAgency();
    $data["tabRoleUser"] = $this->roleuser->getRoleUser();
    $data["oneRow"] = $this->user->getUserId($id);
    $data["table"] = "user";

    $this->form_validation->set_rules("lastname", "Nom", "required", "Le nom doit être saisi");
    $this->form_validation->set_rules("firstname", "Prénom", "required", "Le prénom doit être saisi");
    $this->form_validation->set_rules("password1", "Password", "required", "Le mot de passe doit être saisi");

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
  
  public function manageOneRoleUser($id = NULL){
    $data["title"] = "Gestion roleUser";
    $data["oneRow"] = $this->roleuser->getRoleUser($id);
    $data["table"] = "roleUser";
    
    $this->form_validation->set_rules("role", "Rôle", "required", "Le rôle doit être saisi");
    
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

  public function unCnx(){
    session_destroy();
    redirect("main/index");
  }
}