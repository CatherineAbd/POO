<div class="tableUser" id="tableUser">
    <table class="table table-dark table-hover col-10">
      <thead>
        <tr>
          <th class="col-2">Nom</th>
          <th class="col-2">Prénom</th>
          <th class="col-2">Agence</th>
          <th class="col-2">Rôle utilisateur</th>
          <th class="col-2">Mot de passe</th>
          <th class="col-1"></th>
          <th class="col-1"></th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($tabUser as $oneUser){ 
      ?>
        <tr>
          <td><?= $oneUser['lastname']?></td>
          <td><?= $oneUser['firstname']?></td>
          <td><?= $oneUser['name']?></td>
          <td><?= $oneUser['role'] ?></td>
          <td><?= $oneUser['password'] ?></td>
          <td>
            <a href="<?= site_url('main/manageOneUser/') . $oneUser['id'] ?>" class="superBtn" data-toggle="modal" data-target="#AdmModalManageUser"><i class="fas fa-pencil-alt"></i></a>
          </td>

          <th>
            <a href="<?= site_url('main/deleteOneUser/') . $oneUser['id'] ?>" class="superBtn" data-toggle="modal" data-target="#AdmModalManageUser"><i class="fas fa-trash-alt"></i></a>
          </th>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
    <a href="<?= site_url('main/manageOneUser') ?>" class="superBtn" data-toggle="modal" data-target="#AdmModalManageUser">+</a>
  </div>

  <div class="modal fade" id="AdmModalManageUser">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Gestion user</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> × </span>
              </button>
            </div>

            <div class="modal-body text-center">
              <?php
                require "manageUser.php";
              ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Fermer</button>
            </div>
          </div>
      </div>
    </div>
</div>

