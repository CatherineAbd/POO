<?php
class Hero extends Character {
  
// * L'attribut **weapon** permettra de définir le nom de l'arme équipée,  
// * **weaponDamage** indiquera les dégâts basiques de l'arme,  
// * **shield** définira le nom du bouclier équipée,
// * **shieldValue** idiquera la nombre de dégâts que le bouclier encaisse à la place du héros.  

  private $_weapon;
  private $_weaponDamage;
  private $_shield;
  private $_shieldValue;

  public function __construct(int $initHealth, int $initRage, string $initWeapon, int $initWeaponDamage, string $initShield, int $initShieldValue)
  {
    parent::__construct($initHealth, $initRage);
    $this->setWeapon($initWeapon);
    $this->setWeaponDamage($initWeaponDamage);
    $this->setShield($initShield);
    $this->setShieldValue($initShieldValue);

    echo "<p>Le nouveau héros a été créé avec une santé de " . parent::getHealth() . " et une rage de " . parent::getRage() . ".</p>";
    echo "<p>Son arme est un/une ". $this->getWeapon() . " qui inflige des dégâts de " . $this->getWeaponDamage() . " et son bouclier " . $this->getShield() . " encaisse " . $this->getShieldValue() . " dégâts. </p>";
  }

  public function getWeapon(){
    return $this->_weapon;
  }
  public function setWeapon(string $newWeapon){
    $this->_weapon = $newWeapon;
  }

  public function getWeaponDamage(){
    return $this->_weaponDamage;
  }
  public function setWeaponDamage(int $newWeaponDamage){
    $this->_weaponDamage = $newWeaponDamage;
  }

  public function getShield(){
    return $this->_shield;
  }
  public function setShield(string $newshield){
    $this->_shield = $newshield;
  }

  public function getShieldValue(){
    return $this->_shieldValue;
  }
  public function setShieldValue(int $newshieldValue){
    $this->_shieldValue = $newshieldValue;
  }

  // Créer une **méthode attacked** dans la classe **Hero** permettant au Héros de prendre des dégâts **en considérant la valeur du bouclier**.
  public function hAttacked(int $newDamage){
    parent::setHealth(parent::getHealth() - $newDamage < 0 ? 0 : parent::getHealth() - $newDamage);
    $this->increaseRage();
  }

  //   Pour chaque coup reçu, il faudra faire gagner de la rage à notre Héros.  
  // Créer une méthode permettant d'augmenter la valeur de **rage** de 30.
  public function increaseRage(){
    $this->setRage($this->getRage() + 30);
  }

  public function hAttack (){
    return $this->getRage() + rand(200, 400);
  }
}
?>