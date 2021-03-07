<em>&copy; 2021</em>
  <!-- <script src="<?= base_url('script.js') ?>"></script> -->
  <script>
    $(document).ready(function() {
      $('.btnDelete').click(function() {
        var id = $(this).attr("id");
          if (confirm("Etes-vous sûr de vouloir supprimer ce patient ?")) {
              // var path = "<?= base_url('index.php/patients_ctrl/deletepatient/') ?>" + id;
              var path = "patients_ctrl/deletepatient/" + id;
              console.log(path);
              window.alert(path);
              // window.location = path;
              window.location = "<?= base_url() ?>index.php/patients_ctrl/deletepatient/" + id;
              return false;
          }
      });
    });
  </script>
  </body>
</html>