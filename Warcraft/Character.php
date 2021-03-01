<?php

class Character {
  private $_health;
  private $_rage;

  public function __construct(int $initHealth, int $initRage){
    $this->setHealth($initHealth);
    $this->setRage($initRage);
  }

  public function getHealth(){
    return $this->_health;
  }

  public function setHealth(int $newHealth){
    $this->_health = $newHealth;
  }

  public function getRage(){
    return $this->_rage;
  }

  public function setRage(int $newRage){
    $this->_rage = $newRage;
  }
}

?>