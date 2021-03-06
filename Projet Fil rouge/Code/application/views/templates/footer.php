    <div class="row globalFooter">
      <p class="col-5"><em>&copy; 2021</em></p>
      <?php
        if (!isset($this->session->userLastname) && !isset($this->session->custEmail)){
      ?>
          <div class="col-6 footLegalMentions">
          <a href="#" class="footLegalMentionsLink" data-toggle="modal" data-target="#LegalMentionsModal">
            Mentions légales  
          </a>

      <?php
        }
        else
        {
      ?>
          <div class="col-5 footLegalMentions">
          <a href="#" class="footLegalMentionsLink" data-toggle="modal" data-target="#LegalMentionsModal">
            Mentions légales  
          </a>
      <?php
        }
      ?>
      </div>
      <?php
        if (!isset($this->session->userLastname) && !isset($this->session->custEmail)){
      ?>
          <div class="col-1 footAdm">
      <?php
        }
        else
        {
      ?>
          <div class="col-2 footAdm">
      <?php
        }
      ?>
        <!-- <button type="button" class="btn footerSubText" data-toggle="modal" data-target="#footerCnxAdmModal">
          <i class="fas fa-2x fa-cog footerBtnAdm"></i>
        </button> -->
        <!-- <div class="footBtnAdmUnCnx"> -->
        <?php
        if (!isset($this->session->userLastname) && !isset($this->session->custEmail)){
        ?>
          <!-- </div> -->
          <a href="#" class="btn" data-toggle="modal" data-target="#footerCnxAdmModal">
            <i class="fas fa-2x fa-cog footerBtnAdm"></i>
          </a>
        <?php
        }
        elseif (!isset($this->session->custEmail))
        {
        ?>
          <a href="<?= site_url('main/unCnx') ?>" class="btn"><i class="fas fa-2x fa-times footerBtnAdm"></i></a>
          <!-- </div> -->
          <!-- <div class="footBtnAdmCnx"> -->
            <a href="<?= site_url('main/cnxAdm') ?>" class="btn"><i class="fas fa-2x fa-cog footerBtnAdm"></i></a>
          <!-- </div> -->
        <?php
        }
        ?>
      </div>
    </div>

    <!-- Connection administration modal -->
    <div class="modal fade" id="footerCnxAdmModal">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Connexion administeurs</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> × </span>
              </button>
            </div>

            <div class="modal-body text-center">
              <div class="cnxAdmCont">
                <?php
                  echo form_open('main/adm');
                ?>
                  <label for="lastname">Nom</label><input type="text" name="lastname"><br>
                  <label for="password">Mot de passe</label><input type="text" name="password"><br>
                  <input type="submit" value="Connexion">
                </form>
              </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Fermer</button>
            </div>
          </div>
      </div>
    </div>

    <!-- Connection customer modal -->
    <div class="modal fade" id="HeaderCnxModal">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Connexion client</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> × </span>
              </button>
            </div>

            <div class="modal-body text-center">
              <div class="cnxAdmCont">
                <?php
                  echo form_open('main/cnxCust');
                ?>
                  <label for="email">Email</label><input type="email" name="email"><br>
                  <label for="password">Mot de passe</label><input type="text" name="password"><br>
                  <input type="submit" value="Connexion">
                </form>
              </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Fermer</button>
            </div>
          </div>
      </div>
    </div>

    <?php
      $this->load->view("/templates/footer_legal.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
  
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
  </body>
</html>