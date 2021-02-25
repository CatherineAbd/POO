<?php
  require "Model/AccountBank.php";

  $arielsAccount = new AccountBank("Ariel", 10000, 2, "euros");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <p>
    Bonjour <?= $arielsAccount->get_holder() ?>, vous venez d'ouvrir un compte avec un taux d'intérêts de <?= $arielsAccount->get_interestRate() ?>
    et vous y avez déposé un montant de <?= number_format($arielsAccount->get_balance(), 2, ",", " ") . " " . $arielsAccount->get_currency() ?> .
  </p>
  <?php $ctCurrency = $arielsAccount->get_currency(); ?>

  <?php
    $newCredit = 1250;
    $arielsAccount->credit($newCredit);
  ?>

  <p>
    Votre compte a été crédité de : <?= $newCredit . " " . $ctCurrency ?>. Le nouveau solde est donc de <?= $arielsAccount->get_balance() . " " . $ctCurrency?> .
  </p>

  <?php
    $newDebit = 500;
    $arielsAccount->debit($newDebit);
  ?>

  <p>
    Votre compte a été débité de <?= $newDebit . " " . $ctCurrency ?>. Le nouveau solde est donc de <?= $arielsAccount->get_balance() . " " . $ctCurrency?> .
  </p>
</body>
</html>