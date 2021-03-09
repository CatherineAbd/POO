<div class="superAdmForm">
    <div class="inputRow">
      <div class="formId inputCol">
        <span class="iconField"><i class="far fa-user"></i></span>
        <input type="text" name="textId" readonly value="<?= $oneRow['id']??set_value('id') ?>">
      </div>
      <div class="formRole inputCol">
        <span class="iconField"><i class="fas fa-user-cog"></i></span>
        <input type="text" id="role" name="role" placeholder="rôle" value="<?= $oneRow['role']??set_value('role') ?>">
      </div>
    </div>

    <input type="hidden" name="id" value="<?= $oneRow['id']??set_value('id') ?>" />

    <input type="submit" name="submit" value="<?= $labelBtn ?>" />
  </div>
