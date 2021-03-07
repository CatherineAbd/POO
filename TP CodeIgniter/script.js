$(document).ready(function() {
  $('.btnDelete').click(function() {
    var id = $(this).attr("id");
      if (confirm("Etes-vous sûr de vouloir supprimer ce patient ?")) {
          var path = "patients_ctrl/deletePatient/" + id;
          // var path = "<?= base_url('patients_ctrl/deletepatient/') ?>" + id;
          console.log(path);
          window.alert(path);
          window.location = "index.php/patients_ctrl/deletepatient/" + id;
        } else {
          return false;
      }
  });
});
