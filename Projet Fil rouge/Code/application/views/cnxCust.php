<div class="container-fluid cnxCustCont">
  <div class="cnxCustForm">
  <?php
    echo form_open('main/cnxCust');
  ?>
      <div class="row text-center">
        <label for="email">Email</label><input type="text" name="email" value="<?= set_value('email')?>"><br>
        <p><?php echo form_error('email'); ?></p>
      </div>
      <div class="row text-center">
        <label for="password">Mot de passe</label><input type="text" name="password"><br>
      </div>
      <div class="row mt-3">
        <input type="submit" value="Connexion">
      </div>
    </form>
    <div class="row cnxCustBtnCreateProfil mt-3 text-center">
      <?php
        $path = "main/custManageProfil";
        if (isset($this->session->crBooking)) {
          $path = $path . "/" . $this->session->crBooking;
        }
      ?>
      <!-- <a href="<?= site_url('main/custManageProfil/' . $this->session->crBooking??'') ?> " title="Gestion profil"><i class="fas fa-2x fa-user-edit headerBtnCnx"></i></a> -->
      <a href="<?= site_url($path) ?> " title="Gestion profil"><i class="fas fa-2x fa-user-edit cnxCustBtnCreateProfil"></i></a>
    </div>
  </div>
</div>