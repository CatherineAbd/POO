<div class="tableConfig" id="tableCity">
    <a href="<?= site_url('main/manageOneCity') ?>" class="superBtn"><i class="fas fa-plus-square"></i></a>
    <table class="table table-dark table-hover col-10">
      <thead>
        <tr>
          <th class="col-2">Id</th>
          <th class="col-2">Ville</th>
          <th class="col-1"></th>
          <th class="col-1"></th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($tabCity as $oneTabRow){ 
      ?>
        <tr>
          <td><?= $oneTabRow['id']?></td>
          <td><?= $oneTabRow['nameCity']?></td>
          <td>
            <a href="<?= site_url('main/manageOneCity/') . $oneTabRow['id'] ?>" class="superBtn"><i class="fas fa-pencil-alt"></i></a>
          </td>

          <th>
            <a href="<?= site_url('main/deleteOneCity/') . $oneTabRow['id'] ?>" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');"class="superBtn"><i class="fas fa-trash-alt"></i></a>
          </th>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
</div>
