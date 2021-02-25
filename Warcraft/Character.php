<?php

class Character {
  private $_health;
  private $_rage;

  public function __construct(int $initHealth, int $initRage){
    $this->set_health($initHealth);
    $this->set_rage($initRage);
  }

  public function get_health(){
    return $this->_health;
  }

  public function set_health(int $newHealth){
    $this->_health = $newHealth;
  }

  public function get_rage(){
    return $this->_rage;
  }

  public function set_rage(int $newRage){
    $this->_health = $newRage;
  }
}

?>