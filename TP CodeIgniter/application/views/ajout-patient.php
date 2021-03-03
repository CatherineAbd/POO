<!-- <h2><?= $title ?></h2> -->

<?= validation_errors() ?>
<?= form_open('patients_ctrl/createPatient') ?>

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

    <input type="submit" name="submit" value="Création patient" />

</form>