<!-- ## Exercice 13

Créer un fichier **index.php** sur lequel devront être appelés les fichiers **Character.php**, **Hero.php** et **Orc.php**.  
Sur ce fichier, créer 2 objets :

* **hero**, faisant appel à la classe Hero, celui-ci doit avoir 2000 points de vie, 0 points de rage, 600 points d'armure, 100 points de dégâts pour l'arme, les noms de l'arme et de l'armure vous revient,
* **orc**, faisant appel à la classe Orc, celui-ci doit avoir 500 points de vie et 0 points de rage. -->

<!-- Faites attaquer l'Orc **1 fois.**  
Pour chaque attaque de l'Orc, une phrase contenant toutes les informations de l'assaut doit être affichée (dégâts de l'Orc, dégâts absorbés par le bouclier, dégâts non absorbés, rage actuelle du Héros et santé restante du Héros).

Faites attaquer le Hero **1 fois**, idem que pour l'Orc, affichez les infos de la même manière :).

## BONUS

Faites vous plaisir : Let's fight ! Faire une boucle pour qu'ils combattent enfin :D. -->

<?php
  require "Character.php";
  require "Hero.php";
  require "Orc.php";
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/style.css">
    
    <title>Warcraft alpha</title>
  </head>
  <body>

    <header>
      <h1>Warcraft Alpha</h1>
    </header>

    <div class="contPrinc">

      <div class="contForm">
        <form action="" method="post">
          <div class="inputRow">
            <div class="fieldsetColHero">
              <fieldset>
                <legend>Le Héros</legend>
                <div class="inputCol">
                  <label for="heroHealth">Entrez la valeur de la santé initiale : </label><input type="text" id="heroHealth" name="heroHealth" class="inputTxt" min="1000" max="3000" placeholder="un nombre entre 1000 et 3000" required>
                </div>
                  <div class="inputCol">
                  <label for="heroRage">Le héros est-il calme ou plutôt excité ? </label><input type="text" id="heroRage" name="heroRage" class="inputTxt" min="0" max="100" placeholder="un nombre entre 0 et 100" required>
                </div>
                <div class="inputCol">
                  <label for="heroWeapon" class="heroWeapon">Choisissez l'arme</label>
                  <select name="heroWeapon" id="heroWeapon" required>
                    <option value="sword">Epée (dégâts 100)</option>
                    <option value="axe">Hache (dégâts 150)</option>
                    <option value="crossbow">Arbalète (dégâts 80)</option>
                  </select>
                </div>
                <div class="inputCol">
                  <label for="heroShield" class="heroShield">Choisissez la défense</label>
                  <select name="heroShield" id="heroShield" required>
                    <option value="shield">Bouclier simple (protection 100)</option>
                    <option value="reinforced shield">Bouclier renforcé (protection 150)</option>
                    <option value="">Armure cuir (protection 90)</option>
                    <option value="">Armure acier (protection 130)</option>
                  </select>
                </div>
              </fieldset>
            </div>
            <div class="fieldsetCol">
              <button type="submit" name="btnSubmit" class="btn">H</button>
            </div>
            <div class="fieldsetColOrc">
            <fieldset>
              <legend>L'orc</legend>
                <div class="inputCol">
                  <label for="orcHealth">Entrez la valeur de la santé initiale : </label><input type="text" id="orcHealth" name="orcHealth" min="1000" max="3000" placeholder="un nombre entre 1000 et 3000" required>
                </div>
                <div class="inputCol">
                  <label for="orcRage">S'agit-il d'un orc hargneux ou tout doux ? </label><input type="text" id="orcRage" name="orcRage" min="0" max="100" placeholder="un nombre entre 0 et 100" required>
                </div>
            </fieldset>
            </div>
          </div>
        </form>
      </div>

      <hr>

      <div class="contBattle">
      <?php
        if (isset($_POST["btnSubmit"])){
          switch ($_POST["heroWeapon"]){
            case "sword" : $damage = 100;
              break;
            case "axe" : $damage = 150;
              break;
            case "crossbow" : $damage = 80;
              break;
            default : 120;
          }
          switch ($_POST["heroShield"]){
            case "shield" : $protect = 100;
              break;
            case "reinforced shield" : $protect = 150;
              break;
            case "armor" : $protect = 90;
              break;
            case "reinforced armor" : $protect = 130;
              break;
            default : 120;
          }
          $myHero = new Hero($_POST["heroHealth"], $_POST["heroRage"], $_POST["heroWeapon"], $damage, $_POST["heroShield"], $protect);
          $myOrc = new Orc($_POST["orcHealth"], $_POST["orcRage"]);

          $turnAttack = "Orc";

          while ($myHero->getHealth() > 0 && $myOrc->getHealth() > 0){

            if ($turnAttack == "Orc") {
              $oneAttack = $myOrc->oAttack();
              $myHealthBefore = $myHero->getHealth();
              $myHero->hAttacked($oneAttack); ?>

              <p><strong>Attaque de l'orc</strong></p>
              <p>L'orc lance une attaque avec <?= $oneAttack ?> points de dégâts.</p>
              <p>Le héros a <?= $myHealthBefore - $oneAttack < 0 ? $myHealthBefore : $oneAttack ?> dégâts absorbés, <?= $myHealthBefore - $oneAttack < 0 ? $oneAttack - $myHealthBefore : 0 ?> non absorbés, une rage à <?= $myHero->getRage() ?> et une santé à <?= $myHero->getHealth()?>.</p>
            <?php 
              $turnAttack = "Hero";
            } else {
              $oneAttack = $myHero->hAttack();
              $oHealthBefore = $myOrc->getHealth();
              $myOrc->oAttacked($oneAttack);
              ?>
          
              <p><strong>Riposte du héros</strong></p>
              <p>Le héros riposte avec une attaque de <?= $oneAttack ?> points de dégâts.</p>
              <p>L'orc a désormais <?= $oHealthBefore - $oneAttack < 0 ? $oHealthBefore : $oneAttack ?> dégâts absorbés, <?= $oHealthBefore - $oneAttack < 0 ? $oneAttack - $oHealthBefore : 0 ?> non absorbés, et une santé à <?= $myOrc->getHealth()?>.</p>
              <?php 
              $turnAttack = "Orc";
            }

            if ($myHero->getHealth() == 0){
                echo "<p> le héros est mort ! </p>";
            } else if ($myOrc->getHealth() == 0) {
                echo "<p> l'orc est mort ! </p>" ;
            }
          } 
        }?>
      </div> <!-- contBattle -->
    </div> <!-- contPrinc -->

  </body>
</html>