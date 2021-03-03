<h2><?= $title ?></h2>

<?= validation_errors() ?>
<?= form_open('news_ctrl/create') ?>

<label for="title">Title</label>
    <input type="text" name="title" /><br />

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>