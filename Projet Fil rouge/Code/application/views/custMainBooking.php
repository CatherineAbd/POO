<!-- variables from $data : -->
<!-- $tabBooking -->

<div class="container-fluid custMainBookingCont">
  <div class="custMainBookingTable">
  <table class="table table-dark table-hover col-10">
        <thead>
          <tr>
            <th class="col-1">Id</th>
            <th class="col-2">Marque</th>
            <th class="col-2">Modèle</th>
            <th class="col-1">Couleur</th>
            <th class="col-1">Date début</th>
            <th class="col-1">Date fin</th>
            <th class="col-2">Agence</th>
            <th class="col-2">Agence retour</th>
            <th class="col-1">Prix</th>
            <th class="col-1">Nb km</th>
            <th class="col-2">Type</th>
            <th class="col-1">Etat</th>
            <th class="col-1">Archivé</th>
            <th class="col-1"></th>
            <th class="col-1"></th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($tabBooking as $oneTabRow){ 
            setlocale(LC_TIME, ["fr"], ["fra"], ["fr_FR"], ["french"], ["fra.UTF8"]);
          ?>
          <tr>
            <td><?= $oneTabRow['id']?></td>
            <td><?= $oneTabRow['brand']?></td>
            <td><?= $oneTabRow['model']?></td>
            <td><?= $oneTabRow['color']?></td>
            <td><?= strftime("%d/%m/%Y", strtotime($oneTabRow['startDate']))?></td>
            <td><?= strftime("%d/%m/%Y", strtotime($oneTabRow['startEnd']))?></td>
            <td><?= $oneTabRow['nameAg'] ?></td>
            <td><?= $oneTabRow['nameAgRecov']?></td>
            <td><?= $oneTabRow['price']?></td>
            <td><?= $oneTabRow['nbKm']?></td>
            <td><?= $oneTabRow['typeBooking']?></td>
            <td><?= $oneTabRow['state']?></td>
            <td><?= $oneTabRow['archived'] == TRUE ? 'Oui' : 'Non'?></td>
            <td>
              <a href="<?= site_url('main/manageOneBooking/') . $oneTabRow['id'] ?>" class="superBtn"><i class="fas fa-pencil-alt"></i></a>
            </td>

            <td>
              <a href="<?= site_url('main/deleteOneBooking/') . $oneTabRow['id'] ?>" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');"class="superBtn"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php
          }
        ?>
        </tbody>
      </table>
      </div>
</div>