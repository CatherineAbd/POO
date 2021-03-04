<p>Nom : <?= $onePatient['lastname'] ?> </p>
<p>Prénom : <?= $onePatient['firstname'] ?> </p>
<p>Date naissance : <?= $onePatient['birthdate'] ?> </p>
<p>Téléphone : <?= $onePatient['phone'] ?> </p>
<p>Mail : <?= $onePatient['mail'] ?> </p>

<?= validation_errors() ?>
<?= form_open('patients_ctrl/updatePatient') ?>

<label for="firstname">Prénom</label>
    <input type="text" name="firstname" value="<?= set_value('firstname') ?>" /><br />  
    <label for="lastname">Nom</label>
    <input type="text" name="lastname" value="<?= set_value('lastname') ?>" /><br />
    <label for="birthdate">Date anniversaire</label>
    <input type="date" name="birthdate" value="<?= set_value('birthdate') ?>" /><br />
    <label for="phone">Téléphone</label>
    <input type="text" name="phone" value="<?= set_value('phone') ?>" /><br />
    <label for="mail">Mail</label>
    <input type="email" name="mail" value="<?= set_value('mail') ?>" /><br />
    <input type="hidden" name="id" value="<?= $onePatient['id'] ?>">

    <input type="submit" name="submit" value="Modification d'un patient" />

</form>


<a href="<?= base_url() ?>">Revenir à la liste</a>