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
    $this->load->model("parkcar");
    $this->load->model("car");
    $this->load->model("modelcar");
    $this->load->model("brandcar");
    $this->load->model("booking");
    $this->load->model("color");
    $this->load->model("customer");
    $this->load->model("category");
    $this->load->model("statebooking");
    $this->session;
    
  }
  
  public function index(){
    $data["title"] = "ACCUEIL";

    // data for search form
    $data["tabAgency"] = $this->agency->getAgency();
    $data["tabCategory"] = $this->category->getCategory();
    
    $this->load->view("templates/headerHTML");
    $this->load->view("main", $data);
    $this->load->view("templates/footer");
    
  }
  
  public function searchCar(){
    $data["title"] = "VOITURES DISPONIBLES";
    
    // Save criteria for view creatingBooking
    // if (!isset($this->session->criteria)) {
      $this->session->startDate = $this->input->post("startDate");
      $this->session->endDate = $this->input->post("endDate");
      $this->session->id_agency = $this->input->post("id_agency");
      $this->session->id_category = $this->input->post("id_category");
      $this->session->nbPlaces = $this->input->post("nbplaces");
      $this->session->criteria = true;
    // }

    $this->form_validation->set_error_delimiters('<div class="errorFormInscription">', '</div>');

    $endDate = $this->input->post("endDate");
    $this->form_validation->set_rules("startDate", "Date de début", "required|callback_validate_DateSupDay[$endDate]", array("required" => "La date de début doit être renseignée"));
    $this->form_validation->set_rules("endDate", "Date de fin", "required|callback_validate_DateSupDay[$endDate]", array("required" => "La date de fin doit être renseignée"));

    if ($this->form_validation->run() === FALSE) {
      $data["tabCars"] = array();
    }
    else{
      $data["tabCars"] = $this->parkcar->getParkcarCriteria();
    }
    $data["tabAgency"] = $this->agency->getAgency();
    $data["tabCategory"] = $this->category->getCategory();
    // var_dump($this->input->post("startDate"));
    // var_dump(date("Y-m-d"));
    // var_dump($data["tabCars"]);
    $this->load->view("templates/headerSub", $data);
    if (isset($this->session->custEmail)){
        $this->load->view("templates/navSide");
      }
      $this->load->view("templates/headerHTML");
    $this->load->view("carFind", $data);
    $this->load->view("templates/footer");

}

public function validate_DateSupDay($inputDate, $endDate){
  if (strtotime($inputDate) < strtotime(date("Y-m-d"))) {
    $this->form_validation->set_message('validate_DateSupDay', 'La date doit être supérieure ou égale à la date du jour');
    var_dump("false");
    return false;
  }
  else
  {
    if (strtotime($inputDate) - strtotime($endDate) > 0){
      $this->form_validation->set_message('validate_DateSupDay', 'La date de début doit être inférieure à la date de fin');
      return false;
      }
    else
    {
      return true;
    }
  }
}

  public function unCnx(){
    session_destroy();
    redirect("main/index");
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
      redirect(site_url("main"));
    }
    else
    {
      // creation of session or recovering of session's variables
      if (!$session){
        $this->session->userLastname = $data["user"]["lastname"];
        $this->session->userRole = $data["user"]["role"];
        $this->session->idAgency = $data["user"]["id_agency"];
      }
      else
      {
        $data["user"]["lastname"] = $this->session->userLastname;
        $data["user"]["role"] = $this->session->userRole;
        $data["user"]["id_agency"] = $this->session->idAgency;
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
        $data["tabParkcar"] = $this->parkcar->getParkcarId(FALSE, $this->session->idAgency);
        $data["tabBooking"] = $this->booking->getBookingId(FALSE, $this->session->idAgency);
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

  //-------------------------------- MANAGE PARKCAR

  public function manageOneParkcar($id = NULL){
    $data["title"] = "Gestion parc des voitures";
    $data["idAgency"] = $this->session->idAgency;
    $data["tabBooking"] = $this->booking->getBooking();
    // $data["tabModel"] = $this->modelcar->getModelcar();
    // $data["tabBrand"] = $this->brandcar->getBrandcar();
    $data["tabCar"] = $this->car->getCar();
    $data["tabColor"] = $this->color->getColor();
    $data["oneRow"] = $this->parkcar->getParkcarId($id, $this->session->idAgency);
    $data["table"] = "parkcar";

    $this->form_validation->set_error_delimiters('<div class="errorFormInscription">', '</div>');

    $this->form_validation->set_rules("nbkm", "nombre de km", "required", array("required" => "Le nombre de km doit être saisi"));

    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/headerHTML");
      $this->load->view("templates/headerSub", $data);
      $this->load->view("employAdmManage", $data);
    }
    else
    {
      $this->parkcar->manageParkcar($id);
      $data["title"] = "Gestion d'une voiture du parc";
      $data["user"]["lastname"] = $this->session->userLastname;
      $data["user"]["role"] = $this->session->userRole;
      $data["user"]["idAgency"] = $this->session->idAgency;
      redirect("main/adm");
    }
  }  

  public function deleteOneParkcar($id){
    if (!$this->parkcar->deleteParkcar($id)) {
      $msgError = "Vous ne pouvez pas supprimer cette voiture du parc";
      $this->adm($msgError);
    }
    else
    {
      $this->adm();
    }
  }
  
//-------------------------------- MANAGE BOOKING
  
  public function manageOneBooking($id = NULL){
    // if no connection redirect on the profil's creation
    if (!isset($this->session->userLastname) && !isset($this->session->custEmail)){
      redirect("main/custManageProfil/TRUE");
    }
    
    $data["title"] = "Gestion d'une réservation";
    $data["idAgency"] = $this->session->idAgency;
    $data["tabBooking"] = $this->booking->getBooking();
    // $data["tabModel"] = $this->modelcar->getModelcar();
    // $data["tabBrand"] = $this->brandcar->getBrandcar();
    // $data["tabCar"] = $this->car->getCar();
    $data["tabStateBooking"] = $this->statebooking->getStateBooking();
    $data["oneRow"] = $this->booking->getBookingId($id, $this->session->idAgency);
    $data["table"] = "booking";

    $this->form_validation->set_error_delimiters('<div class="errorFormInscription">', '</div>');

    $this->form_validation->set_rules("nbKm", "nombre de km", "required", array("required" => "Le nombre de km doit être saisi"));

    if ($this->form_validation->run() === FALSE ) {
      if (isset($this->session->userLastname)){
        $this->load->view("templates/headerHTML");
        $this->load->view("templates/headerSub", $data);
        $this->load->view("employAdmManage", $data);
      }
      else
      {
        $this->load->view("templates/headerHTML");
        $this->load->view("templates/headerSub", $data);
        // retour au formulaire de création de la réservation
        // $this->load->view("employAdmManage", $data);
      }
    }
    else
    {
      $this->booking->manageBooking($id);
      // if cnx adm ag
      if (isset($this->session->userLastname)){
        redirect("main/adm");
      }
      // cnx cust
      else
      {
        $data['tabBooking'] = $this->booking->getBookingCust($this->session->custEmail);

        $this->load->view("templates/headerHTML");
        $this->load->view("templates/headerSub", $data);
        $this->load->view("templates/navSide");
        $this->load->view("custMainBooking", $data);
        $this->load->view("templates/footer");
      }
    }
  }  

  public function deleteOneBooking($id){
    if (!$this->parkcar->deleteBooking($id)) {
      $msgError = "Vous ne pouvez pas supprimer cette réservation";
      $this->adm($msgError);
    }
    else
    {
      $this->adm();
    }
  }
  //------------------------------------------------------------------------
// ------------------------- CUSTOMER'S PART -----------------------------
//------------------------------------------------------------------------

  public function cnxCust(){
    $data["title"] = "Connexion client";
    $this->form_validation->set_error_delimiters('<div class="errorFormInscription">', '</div>');

    $this->form_validation->set_rules("email", "Email", "required|valid_email", array("required" => "L'email doit être saisi", "valid_email" => "L'email doit avoir un format valide"));

    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/headerHTML");
      $this->load->view("templates/headerSub", $data);
      $this->load->view("cnxCust", $data);
      $this->load->view("templates/footer");
    }
    else
    {
      $data["cust"] = $this->customer->getCustomer($this->input->post("email"), $this->input->post("password"));
    
      if (isset($data["cust"])){
        $this->session->custEmail = $data["cust"]["email"];
        $this->session->custLastname = $data["cust"]["lastname"];
        $this->session->custFirstname = $data["cust"]["firstname"];
        $this->session->custId = $data["cust"]["id"];

        
        if ($this->session->crBooking){
          redirect("main/createBooking/" . $this->session->idCarBook . "/" . $this->session->idAgCarBook);
        }
        else{
          redirect("main/searchCar");
        }
      }
      // connection failed
      else
      {
        $this->load->view("templates/headerHTML");
        $this->load->view("templates/headerSub", $data);
        $this->load->view("cnxCust", $data);
        }
    }
  }
  
  public function custMainBooking(){
    $data['title'] = "Gestion des réservations";
    $data['tabBooking'] = $this->booking->getBookingCust($this->session->custEmail);

    $this->load->view("templates/headerHTML");
    $this->load->view("templates/headerSub", $data);
    $this->load->view("templates/navSide");
    $this->load->view("custMainBooking", $data);
    $this->load->view("templates/footer");
  }

  public function custManageProfil($crBooking = FALSE){
    $data["title"] = "Gestion de profil client";
    $data["tabCity"] = $this->city->getCity();
    $data["crBooking"] = $crBooking;

    // recovering of customer's information
    if (isset($this->session->custEmail)){
      $data['oneRow'] = $this->customer->getCustomerEmail($this->session->custEmail);
    }
      $this->load->view("templates/headerHTML");
      $this->load->view("templates/headerSub", $data);
      $this->load->view("templates/navSide");
      $this->load->view("custProfil", $data);
      $this->load->view("templates/footer");
  }

  public function manageOneCustomer($crBooking, $id = NULL){
    $data["title"] = "Gestion profil client";
    $data["tabCity"] = $this->city->getCity();
    $data["oneRow"] = $this->customer->getCustomerId($id);
    $data["crBooking"] = $crBooking;
    // $data["table"] = "customer";

    $this->form_validation->set_error_delimiters('<div class="errorFormInscription">', '</div>');

    $this->form_validation->set_rules("lastname", "Nom", "required", array("required" => "Le nom doit être saisi"));
    $this->form_validation->set_rules("firstname", "Prénom", "required", array("required" => "Le prénom doit être saisi"));
    $this->form_validation->set_rules("password1", "Password", "required", array("required" => "Le mot de passe doit être saisi"));
    $this->form_validation->set_rules("password2", "Password", "required|matches[password1]", array("required" => "Le mot de passe doit être saisi", "matches" => "Les 2 mots de passe doivent êtres identiques"));
    $this->form_validation->set_rules("email", "Email", "required|valid_email|is_unique[customer.email]", array("required" => "L'email doit être saisi", "is_unique" => "L'email existe déjà, veuillez en saisir un autre"));

    if ($this->form_validation->run() === FALSE) {
      $this->load->view("templates/headerHTML");
      $this->load->view("templates/headerSub", $data);
      $this->load->view("custProfil", $data);
      $this->load->view("templates/footer");
    }
    else
    {
      $this->customer->manageCustomer($id);
      // if it's a creation we need to recover the customer's id
      if ($id == NULL){
        $cust = $this->customer->getCustomerEmail($this->session->custEmail);
        $this->session->custId = $cust["id"];
      }
      // the profile was created for the booking's creation
      if ($crBooking) {
        // $path = "main/createBookin(". $this->session->idCarBook . "," . $this->session->idAgCarBook. ")";
        redirect("main/createBooking/". $this->session->idCarBook . "/" . $this->session->idAgCarBook);
      }
      else
      {
        redirect("main/searchCar");
      }
    }
  }

  public function createBooking($id, $id_agency){
    if ($this->session->custEmail){
      $data["title"] = "Création de la réservation";
      if ($this->session->crBooking){
        $id = $this->session->idCarBook;
        $id_agency = $this->session->idAgCarBook;
      }
      $data["oneRow"] = $this->parkcar->getParkcarId($id, $id_agency);
      $this->load->view("templates/headerHTML");
      $this->load->view("templates/headerSub", $data);
      $this->load->view("createBooking", $data);
      $this->load->view("templates/footer");
    }
    else
    {
      $this->session->crBooking = TRUE;
      $this->session->idCarBook = $id;
      $this->session->idAgCarBook = $id_agency;

      redirect("main/cnxCust");
    }
  }
  
}