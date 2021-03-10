<div class="tableConfig" id="tableRoleUser">
    <table class="table table-dark table-hover col-10">
      <thead>
        <tr>
          <th class="col-2">Id</th>
          <th class="col-2">Rôle</th>
          <th class="col-1"></th>
          <th class="col-1"></th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($tabRoleUser as $oneRoleUser){ 
      ?>
        <tr>
          <td><?= $oneRoleUser['id']?></td>
          <td><?= $oneRoleUser['role']?></td>
          <td>
            <a href="<?= site_url('main/manageOneRoleUser/') . $oneRoleUser['id'] ?>" class="superBtn"><i class="fas fa-pencil-alt"></i></a>
          </td>

          <th>
            <a href="<?= site_url('main/deleteOneRoleUser/') . $oneRoleUser['id'] ?>" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');" class="superBtn"><i class="fas fa-trash-alt"></i></a>
          </th>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
    <a href="<?= site_url('main/manageOneRoleUser') ?>" class="superBtn">+</a>
</div>
