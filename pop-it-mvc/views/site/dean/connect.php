<h3>Связать группу с дисциплиной</h3>
<form method="POST">
    <label>Группа:</label><br>
    <select name="group_of_students_id">
        <?php foreach ($groups as $group): ?>
            <option value="<?= $group->id ?>"><?= $group->name ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <label>Дисциплина:</label><br>
    <select name="discipline_id">
        <?php foreach ($disciplines as $discipline): ?>
            <option value="<?= $discipline->id ?>"><?= $discipline->name ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <button type="submit">Создать связь</button>
</form>
