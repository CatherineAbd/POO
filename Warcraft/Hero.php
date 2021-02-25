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

  public function __construct()
  {
    
  }

  public function get_weapon(){
    return $this->_weapon;
  }
  public function set_weapon(int $newWeapon){
    $this->_weapon = $newWeapon;
  }

  public function get_weaponDamage(){
    return $this->_weaponDamage;
  }
  public function set_weaponDamage(int $newWeaponDamage){
    $this->_weaponDamage = $newWeaponDamage;
  }

  public function get_shield(){
    return $this->_shield;
  }
  public function set_shield(int $newshield){
    $this->_shield = $newshield;
  }

  public function get_shieldValue(){
    return $this->_shieldValue;
  }
  public function set_shieldValue(int $newshieldValue){
    $this->_shieldValue = $newshieldValue;
  }
}
?>