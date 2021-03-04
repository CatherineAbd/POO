$(document).ready(function() {
  $('.btnDelete').click(function() {
    var id = $(this).attr("id");
      if (confirm("Etes-vous sûr de vouloir supprimer ce patient ?")) {
          var path = "<?= base_url('index.php/patients_ctrl/deletepatient/') ?>" + id;
          console.log(path);
          window.alert(path);
          window.location = path;
      } else {
          return false;
      }
  });
});
