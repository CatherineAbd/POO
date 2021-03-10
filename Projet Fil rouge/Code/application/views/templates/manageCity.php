<div class="superAdmForm">
    <div class="inputRow">
      <div class="formId inputCol">
        <span class="iconField"><i class="fas fa-user"></i></span>
        <input type="text" name="textId" readonly value="<?= $oneRow['id']??set_value('id') ?>">
      </div>
      <div class="formCity inputCol">
        <span class="iconField"><i class="fas fa-city"></i></span>
        <input type="text" id="city" name="city" placeholder="Ville" value="<?= $oneRow['nameCity']??set_value('city') ?>">
        <p><?php echo form_error('city'); ?></p>
      </div>
    </div>

    <input type="hidden" name="id" value="<?= $oneRow['id']??set_value('id') ?>" />

    <input type="submit" name="submit" value="<?= $labelBtn ?>" />
  </div>
