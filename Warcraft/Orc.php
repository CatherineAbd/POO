<!-- Dans un nouveau fichier **Orc.php**, créer la classe **Orc héritant de Character** et ayant pour attribut **damage**.  
Cet attribut ne doit être accessible **pour personne !**

## Exercice 10

Créer les **méthodes** permettant d'accéder aux attributs de la classe **Orc** et permettant également de les définir.

## Exercice 11

Créer la **méthode magique construct** de la classe **Orc**.  
Cette méthode devra permettre le déclenchement de la **méthode construct de la classe mère (Character)**.  
Elle doit **retourner** une phrase contenant toutes les informations sur l'Orc nouvellement créé.

## Exercice 12

Créer une **méthode attack** dans la classe **Orc** permettant d'initialiser la valeur de **damage** avec un nombre aléatoire compris entre 600 et 800. -->

<?php

class Orc extends Character{
  private $_damage;

  public function __construct(int $initHealth, int $initRage){
    parent::__construct($initHealth, $initRage);
    echo "<p>L'orc a été créé avec une santé de " . parent::getHealth() . " et une rage de " . parent::getRage() . ".</p>";
  }

  public function getDamage(){
    return $this->_damage;
  }
  public function setDamage($newDamage){
    $this->_damage = $newDamage;
  }

  public function oAttack(){
    return random_int(600, 800);
  }

  public function oAttacked(int $newDamage){
    parent::setHealth(parent::getHealth() - $newDamage < 0 ? 0 : parent::getHealth() - $newDamage);
  }

}

?>