<h2>Связать группу с дисциплиной</h2>

<form method="POST" style="max-width: 400px; display: flex; flex-direction: column; gap: 15px;">
    <label>Группа: <br>
        <select name="group_of_students_id" required style="width: 100%;">
            <?php foreach ($groups as $group): ?>
                <option value="<?= $group->id ?>"><?= $group->name ?></option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>Дисциплина: <br>
        <select name="discipline_id" required style="width: 100%;">
            <?php foreach ($disciplines as $discipline): ?>
                <option value="<?= $discipline->id ?>"><?= $discipline->name ?></option>
            <?php endforeach; ?>
        </select>
    </label>

    <button type="submit">Создать связь</button>
</form>
