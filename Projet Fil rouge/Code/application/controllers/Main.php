<?php

class Main extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper("html");
    $this->load->helper("url");
    $this->load->helper("form");
    $this->load->library("form_validation");
    $this->load->database();
    $this->load->model("user");
    $this->load->model("roleuser");
    $this->load->model("agency");
  }

  public function index(){
    $data["title"] = "ACCUEIL";
    $this->load->view("templates/headerHTML", $data);
    $this->load->view("main");
    $this->load->view("templates/footer");
  }

  public function cnxAdm(){
    $data["title"] = "CONNEXION ADMINISTRATION";
    $this->load->view("templates/headerSub");
    $this->load->view("templates/headerHTML", $data);
    $this->load->view("cnxAdm");
    $this->load->view("templates/footer");
  }

  public function adm(){
    $data["title"] = "ADMINISTRATION";
    // cnx control
    $data["user"] = $this->user->getUser($this->input->post("lastname"), $this->input->post("password"));
    if (!isset($data["user"])){
      var_dump("cnx incorrecte");
      echo "Le nom et/ou le mot de passe sont/est incorrect(s)";
    }
    else
    {
      var_dump("cnx");
      if ($data["user"]["role"] == "superviseur")
      {
        $data['tabUser'] = $this->user->getUser();
        $data['tabAgency'] = $this->agency->getAgency();
        $data['tabRoleUser'] = $this->roleuser->getRoleUser();
        $this->load->view("templates/headerSub");
        $this->load->view("templates/headerHTML", $data);
        $this->load->view("superAdm", $data);
      }
      else
      {
        $this->load->view("templates/headerSub");
        $this->load->view("templates/headerHTML", $data);
        $this->load->view("employAdm", $data);
      }
    }
    $this->load->view("templates/footer");
  }

}