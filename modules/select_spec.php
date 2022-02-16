<?php
    require_once '../includes/db.php';
    $specialities = $db->query('SELECT `id`, `name` FROM `speciality`');
?>
<select name="speciality" id="speciality" >
    <?php foreach ($specialities as $spec): ?>
    <option value="<?= $spec['id'] ?>"><?= $spec['name'] ?></option>
    <?php endforeach; ?>
</select>