<div class="container-fluid cnxCustCont">
  <div class="cnxCustForm">
  <?php
    echo form_open('main/cnxCust');
  ?>
      <label for="email">Email</label><input type="text" name="email" value="<?= set_value('email')?>"><br>
      <p><?php echo form_error('email'); ?></p>
      <label for="password">Mot de passe</label><input type="text" name="password"><br>
      <input type="submit" value="Connexion">
    </form>
    <div class="cnxCustBtnCreateProfil">
      <?php
        $path = "main/custManageProfil";
        if (isset($this->session->crBooking)) {
          $path = $path . "/" . $this->session->crBooking;
        }
      ?>
      <!-- <a href="<?= site_url('main/custManageProfil/' . $this->session->crBooking??'') ?> " title="Gestion profil"><i class="fas fa-2x fa-user-edit headerBtnCnx"></i></a> -->
      <a href="<?= site_url($path) ?> " title="Gestion profil"><i class="fas fa-2x fa-user-edit headerBtnCnx"></i></a>
    </div>
  </div>
</div>