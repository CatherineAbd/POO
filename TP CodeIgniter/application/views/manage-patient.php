<?= validation_errors() ?>
<?= form_open('patients_ctrl/managePatient') ?>

    <label for="firstname">Prénom</label>
    <input type="text" name="firstname" value="<?= $onePatient['firstname']??set_value('firstname') ?>" /><br />  
    <label for="lastname">Nom</label>
    <input type="text" name="lastname" value="<?= $onePatient['lastname']??set_value('lastname') ?>" /><br />
    <label for="birthdate">Date anniversaire</label>
    <input type="date" name="birthdate" value="<?= $onePatient['birthdate']??set_value('birthdate') ?>" /><br />
    <label for="phone">Téléphone</label>
    <input type="text" name="phone" value="<?= $onePatient['phone']??set_value('phone') ?>" /><br />
    <label for="mail">Mail</label>
    <input type="email" name="mail" value="<?= $onePatient['mail']??set_value('mail') ?>" /><br />
    
    <!-- hidden fied for update's key -->
    <input type="hidden" name="id" value="<?= $onePatient['id']??set_value('id') ?>" />

    <input type="submit" name="submit" value="Création / modification patient" />
    <!-- <input type="submit" name="submitUpdate" value="Modification patient" /> -->

</form>

<a href="<?= base_url() ?>">Revenir à la liste</a>